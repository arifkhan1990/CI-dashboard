
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data Tables</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Data Tables</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Hover Data Table</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>ID</th>
									<th>User Name</th>
									<th>User Email</th>
									<th>User Phone</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach ($user_info as $data) { ?>
								<tr>
									<td> <?php echo $data->user_id; ?> </td>
									<td> <?php echo $data->user_name; ?> </td>
									<td> <?php echo $data->user_email; ?></td>
									<td> <?php echo $data->user_phone; ?> </td>
									<td><a href="<?php echo base_url(). 'edit-user-info/' .$data->user_id;?>"> <i class="fa fa-edit"></i></a> | <a href=""><i class="fa fa-trash" style="color: red"></i></a></td>

								</tr>
							<?php } ?>
								</tbody>
								<tfoot>
								<tr>
									<th>Rendering engine</th>
									<th>Browser</th>
									<th>Platform(s)</th>
									<th>Engine version</th>
									<th>CSS grade</th>
								</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>

					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>

