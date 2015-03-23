<div class="wrapper wrapper-runner-1">


	<div class="container-fluid fondo-semitransparente">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1>Bienvenidos a Info Tótem</h1>
			</div>
			<div class="col-sm-12 text-center">
				<p>
					En el siguiente sistema podrán revisar la información de los competidores de cada sede
				</p>
			</div>
		</div>
		<div class="row espaciado-a">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="form-group">
				<label for="selectSede" class="col-sm-4 control-label">Seleccionar sede:</label>
					<div class="col-sm-8">
						<select class="form-control" id="selectSede" name="selectSede">
							<?php foreach ($sedes as $sede): ?>
								<option value="<?php echo $sede["id"]; ?>"><?php echo $sede["nombre"]; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="row espaciado-a">
			<div class="col-sm-4 col-sm-offset-4 borde-cafe">
				<strong>Sede: </strong><span id="sede-nom"></span> <br />
				<strong>Horario de entrenamiento: </strong><span id="sede-hor"></span><br />
				<strong>Dirección: </strong><span id="sede-dir"></span><br />
				<strong>Fecha de fundación: </strong><span id="sede-fec"></span><br />
			</div>
		</div>
	</div>

	<div class="container tablas-datos">
		<div class="row espaciado-a fondo-semitransparente">
			<div class="col-sm-12">
				<h2>Femenino</h2>
			</div>
			<div class="col-sm-12 barras-tablas">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Cédula</th>
							<th>Apellidos</th>
							<th>Nombres</th>
							<th>Estado Civil</th>
							<th>Fecha de Nacimiento</th>
							<th>Nacionalidad</th>
							<th>E-mail</th>
							<th>Dirección</th>
							<th>Celular</th>
							<th>Otros teléfonos</th>
							<th>Nombre de contacto de Emergencia</th>
							<th>Teléfono de contacto de Emergencia</th>
							<th>Tipo de Sangre</th>
							<th>Talla de Camiseta</th>
							<th>Alias/Nick</th>
							<th>Fecha de ingreso</th>
						</tr>
					</thead>
					<tbody id="tbodyf">
					</tbody>
				</table>
			</div>
		</div>

		<div class="row espaciado-a fondo-semitransparente">
			<div class="col-sm-12">
				<h2>Masculino</h2>
			</div>
			<div class="col-sm-12 barras-tablas">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Cédula</th>
							<th>Apellidos</th>
							<th>Nombres</th>
							<th>Estado Civil</th>
							<th>Fecha de Nacimiento</th>
							<th>Nacionalidad</th>
							<th>E-mail</th>
							<th>Dirección</th>
							<th>Celular</th>
							<th>Otros teléfonos</th>
							<th>Nombre de contacto de Emergencia</th>
							<th>Teléfono de contacto de Emergencia</th>
							<th>Tipo de Sangre</th>
							<th>Talla de Camiseta</th>
							<th>Alias/Nick</th>
							<th>Fecha de ingreso</th>
						</tr>
					</thead>
					<tbody id="tbodym">
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

