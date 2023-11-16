<?php
# Salir si alguno de los datos no está presente
if (!isset($_POST["codigo"]) || !isset($_POST["titulo"]) || !isset($_POST["id_autor"]) || !isset($_POST["editorial"]) || !isset($_POST["anio"]) || !isset($_POST["genero"]) || !isset($_POST["precio"]) || !isset($_POST["stock"])) {
    exit();
}

# Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$titulo = $_POST["titulo"];
$id_autor = $_POST["id_autor"];
$editorial = $_POST["editorial"];
$anio = $_POST["anio"];
$genero = $_POST["genero"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];

# Verificar si el código ya existe en la base de datos
$sentencia_verificacion = $base_de_datos->prepare("SELECT COUNT(*) as total FROM tbl_libro WHERE codigo = ?;");
$sentencia_verificacion->execute([$codigo]);
$resultado_verificacion = $sentencia_verificacion->fetch(PDO::FETCH_ASSOC);

if ($resultado_verificacion['total'] > 0) {
    echo "Error: El código ya existe. Por favor, elige otro.";
} else {
    # Si el código no existe, proceder con la inserción
    $sentencia = $base_de_datos->prepare("INSERT INTO tbl_libro(codigo, titulo, id_autor, editorial, anio, genero, precio, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$codigo, $titulo, $id_autor, $editorial, $anio, $genero, $precio, $stock]);

    if ($resultado === TRUE) {
        header("Location: ./listar.php");
        exit;
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista.";
    }
}
?>
<?php include_once "pie.php" ?>
