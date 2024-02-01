<footer>
    <div class="w-100 pt-100 dark-layer pb-70 opc8 position-relative">
        <div class="fixed-bg patern-bg back-blend-multiply dark-bg" style="background-image: url(<?php echo base_url() ?>assets/frontend/images/pattern-bg.jpg);"></div>
        <div class="container">
            <div class="footer-data v2 w-100">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="widget text-center w-100">
                            <div class="widget-inner d-inline-block">
                                <div class="logo bg-white">
                                    <h1 class="mb-0"><a href="home" title="Home"><img class="img-fluid" src="<?php echo base_url() ?>assets/upload/logo/<?php echo
                                                                                                                                                        $logo ?>" alt="Logo" srcset="<?php echo base_url() ?>assets/upload/logo/<?php echo
                                                                                                                                                                                                                                $logo ?>"></a></h1>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- Footer Data -->

            <div class="bottom-bar2 text-center w-100">
                <p class="mb-0"><a href="<?php echo base_url() ?>" title="Home"><?php echo $judulweb ?></a> - Copyright <?php echo date('Y') ?>. Design by <a href="https://ibrahimelgibran.com/" title="IegCode" target="_blank">IegCode</a></p>
            </div><!-- Bottom Bar -->
        </div>
    </div>
</footer><!-- Footer --> 
</main><!-- Main Wrapper -->

<script src="<?php echo base_url() ?>assets/frontend/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/wow.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/counterup.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/slick.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/fullcalendar/main.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/frontend/js/particle-int.js"></script> -->
<script src="<?php echo base_url() ?>assets/frontend/js/musicplayer-min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/circle-progress.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/custom-scripts.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {

        tampildata();

        function tampildata() {
            $('#datapengumuman').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "paging": true,


                "ajax": {
                    url: "<?php echo base_url() ?>c_dashboard/get_pengumuman",
                    type: 'GET'
                },
            });

        }

        var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next',
        center: 'title',
        right : ''
      },
      themeSystem: 'bootstrap',
      //Random default events
      events:"<?php echo base_url(); ?>c_dashboard/load",
      contentHeight: 500,
      
      eventClick: function(info) {
        // alert('Event: ' + info.event.extendedProps.description);
          Swal.fire({
					title: "Acara : "+info.event.title,
					html:  info.event.extendedProps.tanggal+" <strong>S/d</strong> " + info.event.extendedProps.selesai+"<br><h5> Keterangan : "+info.event.extendedProps.description+"</h5>",
            icon:"info",
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Oke'
				})
  
        info.el.style.borderColor = 'red';
      }
     
    });
           
    calendar.render();




    });
</script>


</body>

</html>