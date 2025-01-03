<?php
require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$idCategoria = $_GET['cat'] ?? '';
$orden = $_GET['orden'] ?? '';
$buscar = $_GET['q'] ?? '';

$orders = [
    'asc' => 'nombre ASC',
    'desc' => 'nombre DESC',
    'precio_alto' => 'precio DESC',
    'precio_bajo' => 'precio ASC',
];

$order = $orders[$orden] ?? '';
$params = [];

$sql = "SELECT id, slug, nombre, precio FROM productos WHERE activo=1";

if (!empty($buscar)) {
    $sql .= " AND (nombre LIKE ? OR descripcion LIKE ?)";
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
}

if (!empty($idCategoria)) {
    // Obtener todas las subcategorías recursivamente
    $subcategorias = getSubcategorias($con, $idCategoria);

    // Añadir la categoría principal, subcategorías, sub-subcategorías y sub-sub-subcategorías al arreglo de categorías
    array_unshift($subcategorias, $idCategoria);  // Incluir la categoría principal

    $sql .= " AND id_categoria IN (" . implode(',', $subcategorias) . ")";
}

if (!empty($order)) {
    $sql .= " ORDER BY $order";
}

$query = $con->prepare($sql);
$query->execute($params);
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRegistros = count($resultado);

$categoriaSql = $con->prepare("SELECT id, nombre, id_padre FROM categorias WHERE activo=1");
$categoriaSql->execute();
$categorias = $categoriaSql->fetchAll(PDO::FETCH_ASSOC);

$categoriasArray = [];
foreach ($categorias as $categoria) {
    if ($categoria['id_padre'] === NULL) {
        // Es una categoría principal
        $categoriasArray[$categoria['id']] = [
            'nombre' => $categoria['nombre'],
            'subcategorias' => []
        ];
    } else {
        // Es una subcategoría, la agregamos a su categoría principal
        if (isset($categoriasArray[$categoria['id_padre']])) {
            $categoriasArray[$categoria['id_padre']]['subcategorias'][] = [
                'nombre' => $categoria['nombre'],
                'id' => $categoria['id'],
                'subsubcategorias' => [] // Creamos el array para subsubcategorías
            ];
        }
    }
}

// Obtener sub-subcategorías
foreach ($categorias as $categoria) {
    if ($categoria['id_padre'] !== NULL) {
        $parentId = $categoria['id_padre']; // Padre de la subcategoría
        $subsubcategoriaSql = $con->prepare("SELECT id, nombre FROM categorias WHERE id_padre = ? AND activo = 1");
        $subsubcategoriaSql->execute([$categoria['id']]);
        $subsubcategorias = $subsubcategoriaSql->fetchAll(PDO::FETCH_ASSOC);

        // Añadir sub-subcategorías a su correspondiente subcategoría
        foreach ($categoriasArray as $key => &$parentCategoria) {
            foreach ($parentCategoria['subcategorias'] as &$subcategoria) {
                if ($subcategoria['id'] == $categoria['id']) {
                    $subcategoria['subsubcategorias'] = $subsubcategorias;

                    // Ahora obtener las sub-sub-subcategorías
                    foreach ($subsubcategorias as $subsubcategoria) {
                        $subsubsubcategoriaSql = $con->prepare("SELECT id, nombre FROM categorias WHERE id_padre = ? AND activo = 1");
                        $subsubsubcategoriaSql->execute([$subsubcategoria['id']]);
                        $subsubsubcategorias = $subsubsubcategoriaSql->fetchAll(PDO::FETCH_ASSOC);

                        // Añadir las sub-sub-subcategorías
                        foreach ($subsubcategorias as &$subsubcategoria) {
                            $subsubcategoria['subsubsubcategorias'] = $subsubsubcategorias;
                        }
                    }
                }
            }
        }
    }
}

function getSubcategorias($con, $idCategoria)
{
    // Función recursiva para obtener todas las subcategorías de una categoría
    $subcategorias = [];
    $sql = "SELECT id FROM categorias WHERE id_padre = ? AND activo = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute([$idCategoria]);
    $subcategorias = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Recursivamente obtener subcategorías de cada subcategoría
    foreach ($subcategorias as $subcategoria) {
        $subcategorias = array_merge($subcategorias, getSubcategorias($con, $subcategoria));
    }

    return $subcategorias;
}

?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catalogo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <style>
        .subcategorias,
        .subsubcategorias,
        .subsubsubcategorias {
            display: none;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    <?php include 'header.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container p-3">
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Categorías
                        </div>

                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">TODO</a>
                            <?php foreach ($categoriasArray as $categoriaId => $categoria) { ?>
                                <?php if (isset($categoria['nombre'])) { ?>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action <?php echo ($categoriaId == $idCategoria) ? 'active' : ''; ?>" data-id="<?php echo $categoriaId; ?>" onclick="toggleSubcategorias(<?php echo $categoriaId; ?>)">
                                        <?php echo $categoria['nombre']; ?>
                                    </a>

                                    <!-- Mostrar las subcategorías si existen -->
                                    <?php if (!empty($categoria['subcategorias'])) { ?>
                                        <div class="list-group ms-3 subcategorias" id="subcategoria-<?php echo $categoriaId; ?>" style="display: none;">
                                            <?php foreach ($categoria['subcategorias'] as $subcategoria) { ?>
                                                <a href="javascript:void(0)" class="list-group-item list-group-item-action <?php echo ($subcategoria['id'] == $idCategoria) ? 'active' : ''; ?>" onclick="toggleSubcategorias(<?php echo $subcategoria['id']; ?>)">
                                                    <?php echo $subcategoria['nombre']; ?>
                                                </a>

                                                <!-- Mostrar las sub-subcategorías si existen -->
                                                <?php if (!empty($subcategoria['subsubcategorias'])) { ?>
                                                    entro al if
                                                    <div class="list-group ms-3 subsubcategorias" id="subsubcategoria-<?php echo $subcategoria['id']; ?>" style="display: none;">
                                                        <?php foreach ($subcategoria['subsubcategorias'] as $subsubcategoria) { ?>
                                                            <a href="javascript:void(0)" class="list-group-item list-group-item-action <?php echo ($subsubcategoria['id'] == $idCategoria) ? 'active' : ''; ?>" onclick="toggleSubcategorias(<?php echo $subsubcategoria['id']; ?>)">
                                                                <?php echo $subsubcategoria['nombre']; ?>
                                                            </a>

                                                            <!-- Mostrar las sub-sub-subcategorías si existen -->
                                                            <?php if (!empty($subsubcategoria['subsubsubcategorias'])) { ?>
                                                                <div class="list-group ms-3 subsubsubcategorias" id="subsubsubcategoria-<?php echo $subsubcategoria['id']; ?>" style="display: none;">
                                                                    <?php foreach ($subsubcategoria['subsubsubcategorias'] as $subsubsubcategoria) { ?>
                                                                        <a href="javascript:void(0)" class="list-group-item list-group-item-action <?php echo ($subsubsubcategoria['id'] == $idCategoria) ? 'active' : ''; ?>" onclick="toggleSubcategorias(<?php echo $subsubsubcategoria['id']; ?>)">
                                                                            <?php echo $subsubsubcategoria['nombre']; ?>
                                                                        </a>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>


                    </div>
                </div>

                <div class="col-12 col-md-9 col-lg-9">
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                        <strong class="d-block py-2"><?php echo $totalRegistros; ?> Artículos encontrados </strong>
                        <div class="ms-auto">
                            <form method="get" action="index.php" autocomplete="off">
                                <div class="input-group pe-3">
                                    <input type="text" name="q" class="form-control" placeholder="Buscar..." aria-describedby="icon-buscar">
                                    <button class="btn btn-outline-info" type="submit" id="icon-buscar">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="ms-auto">
                            <form action="index.php" id="ordenForm" method="get" onchange="submitForm()">
                                <input type="hidden" id="cat" name="cat" value="<?php echo $idCategoria; ?>">
                                <label for="cbx-orden" class="form-label">Ordena por</label>
                                <select class="form-select d-inline-block w-auto pt-1 form-select-sm" name="orden" id="orden">
                                    <option value="precio_alto" <?php echo ($orden === 'precio_alto') ? 'selected' : ''; ?>>Pecios más altos</option>
                                    <option value="precio_bajo" <?php echo ($orden === 'precio_bajo') ? 'selected' : ''; ?>>Pecios más bajos</option>
                                    <option value="asc" <?php echo ($orden === 'asc') ? 'selected' : ''; ?>>Nombre A-Z</option>
                                    <option value="desc" <?php echo ($orden === 'desc') ? 'selected' : ''; ?>>Nombre Z-A</option>
                                </select>
                            </form>
                        </div>
                    </header>

                    <div class="row">
                        <?php foreach ($resultado as $row) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                <div class="card w-100 my-2 shadow-2-strong">

                                    <?php
                                    $id = $row['id'];
                                    $imagen = "images/productos/$id/principal.jpg";

                                    if (!file_exists($imagen)) {
                                        $imagen = "images/no-photo.jpg";
                                    }
                                    ?>
                                    <a href="details/<?php echo $row['slug']; ?>">
                                        <img src="<?php echo $imagen; ?>" class="img-thumbnail" style="max-height: 300px">
                                    </a>

                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-row">
                                            <h5 class="mb-1 me-1"><?php echo MONEDA . ' ' . number_format($row['precio'], 2, '.', ','); ?></h5>
                                        </div>
                                        <p class="card-text"><?php echo $row['nombre']; ?></p>
                                    </div>

                                    <div class="card-footer bg-transparent">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="btn btn-success" onClick="addProducto(<?php echo $row['id']; ?>)">Agregar</a>
                                            <div class="btn-group">
                                                <a href="details/<?php echo $row['slug']; ?>" class="btn btn-primary">Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/all.min.js"></script>


    <script>
        function addProducto(id) {
            var url = 'clases/carrito.php';
            var formData = new FormData();
            formData.append('id', id);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero;
                    } else {
                        alert("Lo sentimos.. En este momento, no hay suficientes existencias")
                    }
                })
        }

        function submitForm() {
            document.getElementById("ordenForm").submit();
        }

        function toggleSubcategorias(idCategoria) {
            // Obtenemos el contenedor de subcategorías correspondiente
            var subcategorias = document.getElementById("subcategoria-" + idCategoria);

            // Alternamos la visibilidad de las subcategorías
            if (subcategorias.style.display === "none" || subcategorias.style.display === "") {
                subcategorias.style.display = "block"; // Muestra las subcategorías
            } else {
                subcategorias.style.display = "none"; // Oculta las subcategorías
            }

            // Aseguramos que las sub-subcategorías también puedan ser mostradas u ocultadas
            var subsubcategorias = document.querySelectorAll("#subsubcategoria-" + idCategoria);


            if (subsubcategorias.style.display === "none" || subsubcategorias.style.display === "") {
                subsubcategorias.style.display = "block"; // Muestra las subcategorías
            } else {
                subsubcategorias.style.display = "none"; // Oculta las subcategorías
            }
        }
    </script>
</body>

</html>



<!--Codigo dde selects-->