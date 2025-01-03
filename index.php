<?php

<<<<<<< HEAD
=======
//Pantalla principal para mostrar el listado de productos


>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$idCategoria = $_GET['cat'] ?? '';
<<<<<<< HEAD
$idSubcategoria = $_GET['subcategoria'] ?? '';  // Subcategoria seleccionada
$idSubsubcategoria = $_GET['subsubcategoria'] ?? '';  // Sub-subcategoria seleccionada

=======
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
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

<<<<<<< HEAD
//Consulta para filtrar productos
=======
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
$sql = "SELECT id, slug, nombre, precio FROM productos WHERE activo=1";

if (!empty($buscar)) {
    $sql .= " AND (nombre LIKE ? OR descripcion LIKE ?)";
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
}

<<<<<<< HEAD
=======
if (!empty($idCategoria)) {
    $sql .= " AND id_categoria = ?";
    $params[] = $idCategoria;
}

>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
if (!empty($order)) {
    $sql .= " ORDER BY $order";
}

<<<<<<< HEAD
if (!empty($idCategoria)) {
    // Obtener todas las subcategorías de la categoría seleccionada
    $subcategorias = getSubcategorias($con, $idCategoria);

    // Si tenemos subcategorías, agregamos al filtro
    if (!empty($subcategorias)) {
        $sql .= " AND id_categoria IN (" . implode(',', $subcategorias) . ")";
    }
}

// Si se ha seleccionado una subcategoría
if (!empty($idSubsubcategoria)) {
    // Filtrar solo por la sub-subcategoría específica (id_categoria)
    $sql .= " AND id_categoria = :subsubcategoria";
    $params[':subsubcategoria'] = $idSubsubcategoria;  // Asignar el id de la sub-subcategoría seleccionada
} elseif (!empty($idSubcategoria)) {
    // Si se seleccionó solo una subcategoría, puedes obtener las sub-subcategorías de esta
    $subsubcategorias = getSubcategorias($con, $idSubcategoria);  // Asegúrate de que esta función obtenga sub-subcategorías correctamente

    if (!empty($subsubcategorias)) {
        // Si tiene sub-subcategorías, filtra por esas
        $sql .= " AND id_categoria IN (" . implode(',', $subsubcategorias) . ")";
    } else {
        // Si NO tiene sub-subcategorías, solo filtra por la subcategoría
        $sql .= " AND id_categoria = :subcategoria";
        $params[':subcategoria'] = $idSubcategoria;  // Asignar el id de la subcategoría seleccionada
    }
} elseif (!empty($idCategoria)) {
    // Si solo se seleccionó una categoría, filtra por esa categoría
    $subcategorias = getSubcategorias($con, $idCategoria);  // Asegúrate de que esta función obtenga subcategorías correctamente
    if (!empty($subcategorias)) {
        // Filtra por las subcategorías correspondientes
        $sql .= " AND id_categoria IN (" . implode(',', $subcategorias) . ")";
    }
}
=======
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
$query = $con->prepare($sql);
$query->execute($params);
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRegistros = count($resultado);

<<<<<<< HEAD
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

// Obtener subsubcategorías
foreach ($categorias as $categoria) {
    if ($categoria['id_padre'] !== NULL) {
        $parentId = $categoria['id_padre']; // Padre de la subcategoría
        $subsubcategoriaSql = $con->prepare("SELECT id, nombre FROM categorias WHERE id_padre = ? AND activo = 1");
        $subsubcategoriaSql->execute([$categoria['id']]);
        $subsubcategorias = $subsubcategoriaSql->fetchAll(PDO::FETCH_ASSOC);

        // Añadir subsubcategorías a su correspondiente subcategoría
        foreach ($categoriasArray as $key => &$parentCategoria) {
            foreach ($parentCategoria['subcategorias'] as &$subcategoria) {
                if ($subcategoria['id'] == $categoria['id']) {
                    $subcategoria['subsubcategorias'] = $subsubcategorias;
                }
            }
        }
    }
}

function getSubcategorias($con, $idCategoria)
{
    // Inicializar el arreglo para almacenar las subcategorías
    $subcategorias = [];

    // Consultar las subcategorías de la categoría proporcionada
    $sql = "SELECT id FROM categorias WHERE id_padre = ? AND activo = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute([$idCategoria]);
    $subcategorias = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Recursivamente obtener subcategorías de cada subcategoría
    foreach ($subcategorias as $subcategoria) {
        // Obtener las sub-subcategorías de esta subcategoría
        $subsubcategorias = getSubcategorias($con, $subcategoria);
        // Agregar las sub-subcategorías al arreglo
        $subcategorias = array_merge($subcategorias, $subsubcategorias);
    }

    return $subcategorias;
}

function getAllSubcategorias($con)
{
    $subcategorias = [];
    $sql = "SELECT id FROM categorias WHERE activo = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $subcategorias = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return $subcategorias;
}
?>

=======
$categoriaSql = $con->prepare("SELECT id, nombre FROM categorias WHERE activo=1");
$categoriaSql->execute();
$categorias = $categoriaSql->fetchAll(PDO::FETCH_ASSOC);

?>
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
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
<<<<<<< HEAD
=======

>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
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
<<<<<<< HEAD
                            Filtrar por Categoría
                        </div>
                        <div class="card-body">

                            <!-- Filtro de categoría -->
                            <form method="get" action="index.php">
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <select class="form-select" id="categoria" name="cat" onchange="actualizarSubcategorias()">
                                        <option value="">Selecciona una categoría</option>
                                        <?php foreach ($categoriasArray as $categoriaId => $categoria) { ?>
                                            <option value="<?php echo $categoriaId; ?>" <?php echo ($categoriaId === $idCategoria) ? 'selected' : ''; ?>>
                                                <?php echo $categoria['nombre']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3" id="subcategoria-container">
                                    <label for="subcategoria" class="form-label">Subcategoría</label>
                                    <select class="form-select" id="subcategoria" name="subcategoria" onchange="actualizarSubsubcategorias()">
                                        <option value="">Selecciona una subcategoría</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="subsubcategoria-container">
                                    <label for="subsubcategoria" class="form-label">Sub-subcategoría</label>
                                    <select class="form-select" id="subsubcategoria" name="subsubcategoria">
                                        <option value="">Selecciona una sub-subcategoría</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Filtrar</button>
                                <a href="index.php" class="btn btn-primary">Quitar filtro</a>
                            </form>
=======
                            Categorías
                        </div>

                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">TODO</a>
                            <?php foreach ($categorias as $categoria) { ?>
                                <a href="index.php?cat=<?php echo $categoria['id']; ?>" class="list-group-item list-group-item-action <?php echo ($categoria['id'] == $idCategoria) ? 'active' : ''; ?>">
                                    <?php echo $categoria['nombre']; ?>
                                </a>
                            <?php } ?>
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
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
        <div class="social-buttons">
            <a href="https://www.facebook.com/RepGueos" title="Facebook" class="facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://x.com/RepGueosLtda" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/representaciones.gueos/" title="Instagram" class="instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@gueos-RG" title="youtube" class="youtube"><i class="fab fa-youtube"></i></a>
            <a href="https://www.linkedin.com/company/representacionesgueosltda" title="LinkedIn" class="linkedin"><i class="fab fa-linkedin-in"></i></a>

        </div>

        <a href="https://wa.me/573165814009?text=Hola%2C%20tengo%20una%20consulta" title="Contáctanos por WhatsApp" class="whatsapp-link">
            <div class="sm-shake bottom-center sm-fixed sm-button  sm-button-text sm-rounded">
                <i class="fab fa-whatsapp"></i> <!-- Icono de WhatsApp -->
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span style="color: white;">Contáctanos por WhatsApp</span>
            </div>
        </a>

    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
    <script src="<?php echo SITE_URL; ?>js/all.min.js"></script>

=======
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
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
<<<<<<< HEAD

        function actualizarSubcategorias() {
            var categoriaId = document.getElementById('categoria').value;
            var subcategoriaSelect = document.getElementById('subcategoria');
            var subsubcategoriaSelect = document.getElementById('subsubcategoria');
            var subcategoriaContainer = document.getElementById('subcategoria-container');
            var subsubcategoriaContainer = document.getElementById('subsubcategoria-container');

            // Limpiar opciones anteriores
            subcategoriaSelect.innerHTML = '<option value="">Selecciona una subcategoría</option>';
            subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una sub-subcategoría</option>';

            // Si se seleccionó una categoría
            if (categoriaId) {
                // Aquí puedes hacer una solicitud AJAX al servidor para obtener las subcategorías de la categoría seleccionada
                var subcategorias = <?php echo json_encode($categoriasArray); ?>;
                var selectedCategoria = subcategorias[categoriaId]?.subcategorias || [];

                // Agregar subcategorías al select
                selectedCategoria.forEach(function(subcategoria) {
                    var option = document.createElement('option');
                    option.value = subcategoria.id;
                    option.text = subcategoria.nombre;
                    subcategoriaSelect.appendChild(option);
                });

                // Mostrar contenedor de subcategoría
                subcategoriaContainer.style.display = 'block';
            } else {
                subcategoriaContainer.style.display = 'none';
                subsubcategoriaContainer.style.display = 'none';
            }
        }

        function actualizarSubsubcategorias() {
            var subcategoriaId = document.getElementById('subcategoria').value;
            var subsubcategoriaSelect = document.getElementById('subsubcategoria');

            // Limpiar opciones anteriores
            subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una sub-subcategoría</option>';

            // Si se seleccionó una subcategoría
            if (subcategoriaId) {
                var subcategorias = <?php echo json_encode($categoriasArray); ?>;
                var subcategoria = Object.values(subcategorias)
                    .flatMap(c => c.subcategorias)
                    .find(sub => sub.id == subcategoriaId);

                var subsubcategorias = subcategoria ? subcategoria.subsubcategorias : [];

                // Agregar sub-subcategorías al select
                subsubcategorias.forEach(function(subsubcategoria) {
                    var option = document.createElement('option');
                    option.value = subsubcategoria.id;
                    option.text = subsubcategoria.nombre;
                    subsubcategoriaSelect.appendChild(option);
                });

                // Mostrar contenedor de sub-subcategoría
                subsubcategoriaContainer.style.display = 'block';
            } else {
                subsubcategoriaContainer.style.display = 'none';
            }
        }
    </script>

=======
    </script>
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
</body>

</html>