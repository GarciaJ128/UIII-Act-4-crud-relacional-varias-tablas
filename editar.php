<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_libro WHERE id = ?;");
$sentencia->execute([$id]);
$libro = $sentencia->fetch(PDO::FETCH_OBJ);
if($libro === FALSE){
	echo "¡No existe algún libro con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar libro con el ID <?php echo $libro->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $libro->id; ?>">
	
			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $libro->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

			<label for="titulo">Título:</label>
			<input value="<?php echo $libro->titulo ?>" class="form-control" name="titulo" required type="text" id="titulo" placeholder="Título">

			<label for="id_autor">ID del Autor:</label>
			<input value="<?php echo $libro->id_autor ?>" class="form-control" name="id_autor" required type="number" id="id_autor" placeholder="ID del Autor">

			<label for="editorial">Editorial:</label>
			<input value="<?php echo $libro->editorial ?>" class="form-control" name="editorial" required type="text" id="editorial" placeholder="Nombre de la editorial">

			<label for="anio">Año:</label>
			<input value="<?php echo $libro->anio ?>" class="form-control" name="anio" required type="number" id="anio" placeholder="Año de publicacion">

			<label for="genero">Genero:</label>
			<input value="<?php echo $libro->genero ?>" class="form-control" name="genero" required type="text" id="genero" placeholder="Genero al que pertenece">

			<label for="precio">Precio:</label>
			<input value="<?php echo $libro->precio ?>" class="form-control" name="precio" required type="text" id="precio" placeholder="Precio">

			<label for="stock">Stock:</label>
			<input value="<?php echo $libro->stock ?>" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
