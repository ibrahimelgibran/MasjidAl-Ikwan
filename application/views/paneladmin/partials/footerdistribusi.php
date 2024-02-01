<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>


<div class="modal fade" id="modal-add" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Pendistribusian Zakat</h4>
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
										<label>Jenis</label>
										<select id="jenis" name="jenis" class="form-control select2">
											<option value="">Pilih Jenis</option>
											<option value="beras">beras</option>
											<option value="uang">uang</option>
										</select>
									</div>
									<div class="form-group">
										<label>Mustahiq</label>
										<input type="text" name="mustahiq" id="mustahiq" class="form-control select2">
									</div>
									<div class="form-group">
										<label>Tanggal diterima</label>
										<input type="date" name="tanggal" id="tanggal" class="form-control select2">
									</div>
									<!-- /.form-group -->

								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Nilai Beras</label>
										<input type="number" name="nilai_beras" id="nilai_beras"
											class="form-control select2">
									</div>
									<div class="form-group">
										<label>Nilai Uang</label>
										<input type="number" name="nilai_uang" id="nilai_uang"
											class="form-control select2">
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
				<h4 class="modal-title">Edit Pendistribusian Zakat</h4>
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
										<label>Jenis</label>
										<select id="ejenis" name="ejenis" class="form-control select2">
											<option value="">Pilih Jenis</option>
											<option value="beras">beras</option>
											<option value="uang">uang</option>
										</select>
									</div>
									<div class="form-group">
										<label>Mustahiq</label>
										<input type="text" name="emustahiq" id="emustahiq" class="form-control select2">
									</div>
									<div class="form-group">
										<label>Tanggal diterima</label>
										<input type="date" name="etanggal" id="etanggal" class="form-control select2">
									</div>
									<!-- /.form-group -->

								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Nilai Beras</label>
										<input type="number" name="enilai_beras" id="enilai_beras"
											class="form-control select2">
									</div>
									<div class="form-group">
										<label>Nilai Uang</label>
										<input type="number" name="enilai_uang" id="enilai_uang"
											class="form-control select2">
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" name="eketerangan" id="eketerangan"
											class="form-control select2">
                                            <input type="hidden" name="kodedit" id="kodedit"
											class="form-control select2">
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
				<h4 class="modal-title" id="myModalLabel">Hapus Pemasukkan Zakat</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

			</div>
			<form>
				<div class="modal-body">

					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda Yakin akan <strong> Menghapus </strong> Pendistribusian Zakat ini?</p>

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

		var buttonCommon = {
        exportOptions: {	
			columns: [0,1,2,3,4,5,6,7],	
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 6 ?
                        data.replace( /[Rp.,]/g, '' ) :
                        data;
                }
            }
        }
    	};

		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		tampildata();

		function tampildata() {
			$('#datadistribusi').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,

				"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
				"buttons": [
            $.extend( true, {}, buttonCommon, {
                extend: 'copyHtml5',
            } ),
            $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
            } ),
            $.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5',
            } )
        	],
				"ajax": {
					url: "<?php echo base_url()?>k_distribusizakat/getdata",
					type: 'GET'
				},
				footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\Rp.,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
			var intBeras = function (i) {
                return typeof i === 'string' ? i.replace(/[\.Kg,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(6, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
			
			beras = api
                .column(5)
                .data()
                .reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);

			totalberas = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);
 
            // Update footer
            $(api.column(6).footer()).html('Rp.' + pageTotal + ' ( Rp.' + total + ' Total Seluruh )');
            $(api.column(5).footer()).html( totalberas  + '.Kg ( ' + beras  + '.Kg Total Seluruh)');

        	},
			});


		}

        totalpemasukan();


		function totalpemasukan() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_distribusizakat/getdata",
				dataType: "JSON",

				success: function(data) {
					$('#totaluang').html(data.totaluang)
					$('#totaluangtahun').html(data.totaluangtahun)
                    $('#totalberas').html(data.totalberas)
					$('#totalberastahun').html(data.totalberastahun)


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
					url: "<?php echo base_url() ?>k_distribusizakat/simpan",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: true,
					success: function (response) {

						if (response == "ada") {
							$('[name="tahun"]').val("");
							$('[name="tanggal"]').val("");
							$('[name="jenis"]').val("");
							$('[name="mustahiq"]').val("");
							$('[name="nilai_beras"]').val("");
							$('[name="nilai_uang"]').val("");
							$('[name="keterangan"]').val("");
							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#datadistribusi').DataTable().ajax.reload();
							totalpemasukan();

							Toast.fire({
								icon: 'error',
								title: 'Account ID Sudah Ada',
								text: "Coba Account ID Lain"
							});
						} else if (response == "success") {
							$('[name="tahun"]').val("");
							$('[name="tanggal"]').val("");
							$('[name="jenis"]').val("");
							$('[name="mustahiq"]').val("");
							$('[name="nilai_beras"]').val("");
							$('[name="nilai_uang"]').val("");
							$('[name="keterangan"]').val("");
							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datadistribusi').DataTable().ajax.reload();
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
                    minlength:4,
                    maxlength:4

				},
				jenis: {
					required: true,

				},
                tanggal: {
					required: true,

				},
				nilai_beras: {
					required: function () {
						return $("#jenis").val() === "beras";
					},

				},
				mustahiq: {
					required: true,

				},
				nilai_uang: {
					required: function () {
						return $("#jenis").val() === "uang";
					},

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
					url: "<?php echo base_url() ?>k_distribusizakat/simpanedit",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: true,

					success: function (response) {

						if (response == "ada") {
							$('[name="etahun"]').val("");
							$('[name="etanggal"]').val("");
							$('[name="ejenis"]').val("");
							$('[name="emustahiq"]').val("");
							$('[name="enilai_beras"]').val("");
							$('[name="enilai_uang"]').val("");
							$('[name="eketerangan"]').val("");
							$('[name="kodedit"]').val("");
							$('#modal-edit').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#datadistribusi').DataTable().ajax.reload();
							totalpemasukan();

							Toast.fire({
								icon: 'error',
								title: 'Account ID Sudah Ada',
								text: "Coba Account ID Lain"
							});
						} else if (response == "success") {
							$('[name="etahun"]').val("");
							$('[name="etanggal"]').val("");
							$('[name="ejenis"]').val("");
							$('[name="emustahiq"]').val("");
							$('[name="enilai_beras"]').val("");
							$('[name="enilai_uang"]').val("");
							$('[name="eketerangan"]').val("");
							$('[name="kodedit"]').val("");
							$('#modal-edit').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datadistribusi').DataTable().ajax.reload();
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
                    minlength:4,
                    maxlength:4

				},
				ejenis: {
					required: true,

				},
                etanggal: {
					required: true,

				},
				enilai_beras: {
					required: function () {
						return $("#ejenis").val() === "beras";
					},

				},
				emustahiq: {
					required: true,

				},
				enilai_uang: {
					required: function () {
						return $("#jenis").val() === "uang";
					},

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
		$('#datadistribusi').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url()?>k_distribusizakat/showedit",
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
							$('[name="emustahiq"]').val(data.mustahiq);
							$('[name="enilai_beras"]').val(data.nilai_beras);
							$('[name="enilai_uang"]').val(data.nilai_uang);
							$('[name="eketerangan"]').val(data.keterangan);



					});
				}
			});
			return false;
		});


		//hapus data
		//GET HAPUS
		$('#datadistribusi').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		//Hapus Barang

		$('#btn_hapus').on('click', function () {
			var kode = $('#textkode').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>k_distribusizakat/hapus",
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
						$('#datadistribusi').DataTable().ajax.reload();
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
