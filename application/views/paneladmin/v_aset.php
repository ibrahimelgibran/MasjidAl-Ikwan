<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?php echo $judul ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo $judul ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->

		<div class="card mb-5">
			<div class="card-header">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
					<i class="fas fa-plus-circle"></i> Tambah Data
				</button>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="datazakat" class="table table-bordered table-striped text-center">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Jenis Pengadaan</th>
							<th>Tanggal Pembelian</th>
							<th>Harga</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
					<tfoot>
						<tr>
							<th colspan="4" style="text-align:right">Total : </th>
							<th  colspan="3" style="text-align:left"></th>
						</tr>
					</tfoot>

				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->


</div>

<!-- /.card-body -->

<!-- /.card-footer -->

<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->
