<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desplegar Opciones</title>
    <script>
        // Función para actualizar las opciones según la selección
        function actualizarOpciones() {
            var categoria = document.getElementById("categoria").value;
            var subcategoria = document.getElementById("subcategoria");
            var subsubcategoria = document.getElementById("subsubcategoria");

            // Limpiar las opciones previas
            subcategoria.innerHTML = '';
            subsubcategoria.innerHTML = '';

            // Llenar las opciones según la categoría seleccionada
            if (categoria == 'frutas') {
                subcategoria.innerHTML = '<option value="manzana">Manzana</option><option value="banana">Banana</option>';
            } else if (categoria == 'verduras') {
                subcategoria.innerHTML = '<option value="zanahoria">Zanahoria</option><option value="tomate">Tomate</option>';
            }
        }

        function actualizarSubsubcategoria() {
            var subcategoria = document.getElementById("subcategoria").value;
            var subsubcategoria = document.getElementById("subsubcategoria");

            // Limpiar las opciones previas
            subsubcategoria.innerHTML = '';

            // Llenar las opciones de subsubcategoría según la subcategoría seleccionada
            if (subcategoria == 'manzana') {
                subsubcategoria.innerHTML = '<option value="roja">Roja</option><option value="verde">Verde</option>';
            } else if (subcategoria == 'banana') {
                subsubcategoria.innerHTML = '<option value="madura">Madura</option><option value="verde">Verde</option>';
            }
        }
    </script>
</head>

<body>
    <h2>Selecciona una opción jerárquica</h2>

    <!-- Menú de categorías -->
    <label for="categoria">Categoría:</label>
    <select id="categoria" onchange="actualizarOpciones()">
        <option value="">Seleccione una categoría</option>
        <option value="frutas">Frutas</option>
        <option value="verduras">Verduras</option>
    </select>

    <br><br>

    <!-- Menú de subcategorías -->
    <label for="subcategoria">Subcategoría:</label>
    <select id="subcategoria" onchange="actualizarSubsubcategoria()">
        <option value="">Seleccione una subcategoría</option>
    </select>

    <br><br>

    <!-- Menú de subsubcategorías -->
    <label for="subsubcategoria">Subsubcategoría:</label>
    <select id="subsubcategoria">
        <option value="">Seleccione una subsubcategoría</option>
    </select>

</body>

</html>