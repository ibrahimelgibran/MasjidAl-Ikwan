<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>


<div class="modal fade" id="modal-add" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Qurban</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form id="inputform">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Tahun Hijriyah</label>
										<input type="text" name="tahun" id="tahun" class="form-control select2">
									</div>
									<div class="form-group">
										<label>Jenis Hewan</label>
										<select id="jenis" name="jenis" class="form-control select2">
											<option value="">Pilih Jenis</option>
											<option value="kambing">kambing</option>
											<option value="sapi">sapi</option>
										</select>
									</div>
									<div class="form-group">
										<label>Shohibul Qurban</label>
										<input type="text" name="muzakki" id="muzakki" class="form-control select2">
									</div>

									<!-- /.form-group -->

								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Tanggal diterima</label>
										<input type="date" name="tanggal" id="tanggal" class="form-control select2">
									</div>
									<div class="form-group">
										<label>Jumlah</label>
										<div class="row">
											<div class="col-md-5">
												<input type="number" name="jumlah" id="jumlah"
													class="form-control select2">
											</div>
											<div class="col-md-1 text-center">
												<h3>/</h3>
											</div>
											<div class="col-md-5">
												<input type="number" name="per" id="per" class="form-control select2">
											</div>
										</div>

									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" name="keterangan" id="keterangan"
											class="form-control select2">
									</div>
									<!-- /.form-group -->

								</div>
								<!-- /.col -->

								<!-- /.col -->
							</div>
							<!-- /.row -->


							<!-- /.row -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer">

						</div>
					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Qurban</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form id="editform">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Tahun Hijriyah</label>
										<input type="text" name="etahun" id="etahun" class="form-control select2">
									</div>
									<div class="form-group">
										<label>Jenis Hewan</label>
										<select id="ejenis" name="ejenis" class="form-control select2">
											<option value="">Pilih Jenis</option>
											<option value="kambing">kambing</option>
											<option value="sapi">sapi</option>
										</select>
									</div>
									<div class="form-group">
										<label>Shohibul Qurban</label>
										<input type="text" name="emuzakki" id="emuzakki" class="form-control select2">
									</div>

									<!-- /.form-group -->

								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Tanggal diterima</label>
										<input type="date" name="etanggal" id="etanggal" class="form-control select2">
									</div>
									<div class="form-group">
										<label>Jumlah</label>
										<div class="row">
											<div class="col-md-5">
												<input type="number" name="ejumlah" id="ejumlah"
													class="form-control select2">
											</div>
											<div class="col-md-1 text-center">
												<h3>/</h3>
											</div>
											<div class="col-md-5">
												<input type="number" name="eper" id="eper" class="form-control select2">
											</div>
										</div>

									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" name="eketerangan" id="eketerangan"
											class="form-control select2">
										<input type="hidden" name="kodedit" id="kodedit" class="form-control select2">
									</div>
									<!-- /.form-group -->

								</div>
								<!-- /.col -->

								<!-- /.col -->
							</div>


							<!-- /.row -->
						</div>
						<!-- /.card-body -->

					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary" id="ebtn-simpan">Simpan</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Hapus Qurban</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

			</div>
			<form>
				<div class="modal-body">

					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda Yakin akan <strong> Menghapus </strong>Data Qurban ini?</p>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--END MODAL HAPUS-->
<!-- /.modal -->


<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/toastr/toastr.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>


<script>
	$(document).ready(function () {
		
		$('#jenis').change(function () {
			if ($(this).val() === 'sapi') {
				$('#per').prop("disabled", false);
			} else {
				$('#per').prop("disabled", true);
				$('#per').removeClass('is-invalid');
				$('#per').val('');
			}
		});
		$('#ejenis').change(function () {
			if ($(this).val() === 'sapi') {
				$('#eper').prop("disabled", false);
			} else {
				$('#eper').prop("disabled", true);
				$('#eper').removeClass('is-invalid');
				$('#eper').val('');
			}
		});
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		tampildata();

		function tampildata() {
			$('#datazakat').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,

				"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
				"buttons": ["csv", "excel", "pdf", "print"],
				"ajax": {
					url: "<?php echo base_url()?>k_qurban/getdata",
					type: 'GET'
				},
			});
		}

		totalpemasukan();


		function totalpemasukan() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_qurban/getdata",
				dataType: "JSON",

				success: function (data) {
					$('#totaluang').html(data.totalkambing)
					$('#totaluangtahun').html(data.totalkambingtahun)
					$('#totalberas').html(data.totalsapi)
					$('#totalberastahun').html(data.totalsapitahun)
				}
			});
			return false;

		}

		// simpan data

		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);

				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_qurban/simpan",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: true,
					success: function (response) {

						if (response == "success") {
							$('[name="tahun"]').val("");
							$('[name="tanggal"]').val("");
							$('[name="jenis"]').val("");
							$('[name="muzakki"]').val("");
							$('[name="jumlah"]').val("");
							$('[name="per"]').val("");
							$('[name="keterangan"]').val("");
							$('#per').prop("disabled", false);
							$('#per').removeClass('is-invalid');

							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datazakat').DataTable().ajax.reload();
							totalpemasukan();



						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}

						console.log(response)
					},

					error: function (response) {
						Swal.fire({
							type: 'error',
							title: 'OOPS!!',
							text: 'Server Error!'
						});
					}
				});
			}
		});
		$('#inputform').validate({
			rules: {

				tahun: {
					required: true,
					minlength: 4,
					maxlength: 4

				},
				jenis: {
					required: true,

				},
				tanggal: {
					required: true,

				},
				jumlah: {
					required: true,

				},
				per: {
					required: function () {
						return $("#jenis").val() === "sapi";
					},

				},
				muzakki: {
					required: true,

				},
				keterangan: {
					required: true,

				},

			},
			messages: {


			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});


		//saveedit
		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_qurban/simpanedit",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: true,

					success: function (response) {

						if (response == "success") {
							$('[name="etahun"]').val("");
							$('[name="etanggal"]').val("");
							$('[name="ejenis"]').val("");
							$('[name="emuzakki"]').val("");
							$('[name="ejumlah"]').val("");
							$('[name="eper"]').val("");
							$('#eper').prop("disabled", false);
							$('#eper').removeClass('is-invalid');
							$('[name="eketerangan"]').val("");
							$('[name="kodedit"]').val("");
							$('#modal-edit').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datazakat').DataTable().ajax.reload();
							totalpemasukan();



						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}

						console.log(response)
					},

					error: function (response) {
						Swal.fire({
							type: 'error',
							title: 'OOPS!!',
							text: 'Server Error!'
						});
					}
				});
			}
		});
		$('#editform').validate({
			rules: {

				etahun: {
					required: true,
					minlength: 4,
					maxlength: 4

				},
				ejenis: {
					required: true,

				},
				etanggal: {
					required: true,

				},
				ejumlah: {
					required: true,

				},
				eper: {
					required: function () {
						return $("#jenis").val() === "sapi";
					},

				},
				emuzakki: {
					required: true,

				},
				eketerangan: {
					required: true,

				},

			},
			messages: {




			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});


		// showedit data
		$('#datazakat').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url()?>k_qurban/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function () {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="etahun"]').val(data.tahun);
						$('[name="etanggal"]').val(data.tanggal);
						$('[name="ejenis"]').val(data.jenis);
						$('[name="emuzakki"]').val(data.muzakki);
						$('[name="ejumlah"]').val(data.jumlah);
						$('[name="eketerangan"]').val(data.keterangan);
						$('[name="eper"]').val(data.per);

						if (data.jenis === 'kambing') {
							$('#eper').prop("disabled", true);
							
						} else {
							$('#eper').prop("disabled", false);
							
						}



					});
				}
			});
			return false;
		});


		//hapus data
		//GET HAPUS
		$('#datazakat').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		//Hapus Barang

		$('#btn_hapus').on('click', function () {
			var kode = $('#textkode').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>k_qurban/hapus",
				data: {
					id: kode
				},
				success: function (response) {

					if (response == "success") {

						$('#ModalHapus').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						Toast.fire({
							icon: 'success',
							title: 'Data Berhasil dihapus'
						});
						$('#datazakat').DataTable().ajax.reload();
						totalpemasukan();



					} else {
						$('#ModalHapus').modal('hide');
						Toast.fire({
							icon: 'error',
							title: 'Data Gagal dihapus'
						});
					}

					console.log(response)
				}

			});
			return false;
		});




	});

</script>

</body>

</html>
