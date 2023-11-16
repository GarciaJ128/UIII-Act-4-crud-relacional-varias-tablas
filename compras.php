<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT tbl_compra.total, tbl_compra.fecha, tbl_compra.id, GROUP_CONCAT( tbl_libro.codigo, '..', tbl_libro.titulo, '..', tbl_libros_vendidos.cantidad SEPARATOR '__') AS Libros FROM tbl_compra INNER JOIN tbl_libros_vendidos ON tbl_libros_vendidos.id_compra = tbl_compra.id INNER JOIN tbl_libro ON tbl_libro.id = tbl_libros_vendidos.id_libro GROUP BY tbl_compra.id ORDER BY tbl_compra.id;");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Compras</h1>
		<div>
			<a class="btn btn-success" href="./comprar.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Libros vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($compras as $compra){ ?>
				<tr>
					<td><?php echo $compra->id ?></td>
					<td><?php echo $compra->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Título</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $compra->Libros) as $librosConcatenados){ 
								$libro = explode("..", $librosConcatenados)
								?>
								<tr>
									<td><?php echo $libro[0] ?></td>
									<td><?php echo $libro[1] ?></td>
									<td><?php echo $libro[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $compra->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $compra->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarCompra.php?id=" . $compra->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>