<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_libro;");
$libros = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Libros</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Codigo</th>
					<th>Titulo</th>
					<th>ID Autor</th>
					<th>Editorial</th>
					<th>Año</th>
					<th>Genero</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($libros as $libro){ ?>
				<tr>
					<td><?php echo $libro->id ?></td>
					<td><?php echo $libro->codigo ?></td>
					<td><?php echo $libro->titulo ?></td>
					<td><?php echo $libro->id_autor ?></td>
					<td><?php echo $libro->editorial ?></td>
					<td><?php echo $libro->anio ?></td>
					<td><?php echo $libro->genero ?></td>
					<td><?php echo $libro->precio ?></td>
					<td><?php echo $libro->stock ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $libro->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $libro->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>