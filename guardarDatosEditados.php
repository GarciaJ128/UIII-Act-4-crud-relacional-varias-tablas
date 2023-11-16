<?php

# Salir si alguno de los datos no está presente
if (
    !isset($_POST["codigo"]) ||
    !isset($_POST["titulo"]) ||
    !isset($_POST["id_autor"]) ||
    !isset($_POST["editorial"]) ||
    !isset($_POST["anio"]) ||
    !isset($_POST["genero"]) ||
    !isset($_POST["precio"]) ||
    !isset($_POST["stock"]) ||
    !isset($_POST["id"])
) exit();

# Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$titulo = $_POST["titulo"];
$id_autor = $_POST["id_autor"];
$editorial = $_POST["editorial"];
$anio = $_POST["anio"];
$genero = $_POST["genero"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];

# Verificar si el nuevo código ya existe en la base de datos
$sentencia_verificacion = $base_de_datos->prepare("SELECT COUNT(*) as total FROM tbl_libro WHERE codigo = ? AND id != ?;");
$sentencia_verificacion->execute([$codigo, $id]);
$resultado_verificacion = $sentencia_verificacion->fetch(PDO::FETCH_ASSOC);

if ($resultado_verificacion['total'] > 0) {
    # El código ya existe para otro libro, enviar un mensaje de error
    echo "Error: El nuevo código ya existe para otro libro. Por favor, elige otro.";
} else {
    # Si el código no existe, proceder con la actualización
    $sentencia = $base_de_datos->prepare("UPDATE tbl_libro SET codigo = ?, titulo = ?, id_autor = ?, editorial = ?, anio = ?, genero = ?,  precio = ?, stock = ? WHERE id = ?;");
    $resultado = $sentencia->execute([$codigo, $titulo, $id_autor, $editorial, $anio, $genero, $precio, $stock, $id]);

    if ($resultado === TRUE) {
        header("Location: ./listar.php");
        exit;
    } else {
        echo "Algo salió mal. Por favor, verifica que la tabla exista y el ID del libro.";
    }
}
?>
<?php include_once "pie.php" ?>
