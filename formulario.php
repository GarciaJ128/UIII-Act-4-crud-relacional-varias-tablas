<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo libro</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el Código de barras">

		<label for="titulo">Titulo:</label>
		<input class="form-control" name="titulo" required type="text" id="titulo" placeholder="Titulo">

		<label for="titulo">ID del Autor:</label>
		<input class="form-control" name="id_autor" required type="number" id="id_autor" placeholder="ID del Autor">

		<label for="editorial">Editorial:</label>
		<input class="form-control" name="editorial" required type="text" id="editorial" placeholder="Nombre de la editorial">

		<label for="anio">Año:</label>
		<input class="form-control" name="anio" required type="number" id="anio" placeholder="Año de publicacion">

		<label for="genero">Genero:</label>
		<input class="form-control" name="genero" required type="text" id="genero" placeholder="Genero al que pertenece">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="text" id="precio" placeholder="Precio">

		<label for="stock">Stock:</label>
		<input class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">
		
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>