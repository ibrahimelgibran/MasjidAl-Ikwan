<aside class="main-sidebar elevation-1   sidebar-light-primary text-md">
	<!-- Brand Logo -->


	<!-- Sidebar -->
	<div class="sidebar " style="overflow-y: auto;padding-left: 0px;">
		<!-- Sidebar user panel (optional) -->
		<div style="background: rgb(76,149,137);
						background: linear-gradient(90deg, rgba(76,149,137,1) 10%, rgba(10,74,233,0.9164040616246498) 100%, rgba(65,9,231,0.969625350140056) 100%);"
			class="user-panel p-1 ml-0 mt-0  mb-3 brand-link text-center">


			<h2 class="text-light">Admin<strong>M</strong>asjid</h2>
		</div>


		<img src="<?php echo base_url() ?>assets/upload/logo/<?php echo $logo ?>" class="img-fluid ml-3 "
			style="height: 47px; width: 80%;" alt="Logo Image">
		<hr style="margin-left: 10px;">

		<!-- SidebarSearch Form -->

		<!-- Sidebar Menu -->
		<nav class="mt-3" style="padding-left: 10px;">

			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-header">Home</li>
				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/dasbor"
						class="nav-link <?= ($this->uri->segment(1) == 'admin') ? 'active' : ''; ?> ">
						<i class="nav-icon fa fa-home"></i>
						<p>
							Dashboard

						</p>
					</a>
				</li>
				<li class="nav-item ">
					<a href="<?php echo base_url() ?>k_pengumuman/index"
						class="nav-link <?= ($this->uri->segment(1) == 'k_pengumuman') ? 'active' : ''; ?> ">
						<i class="fas fa-blog nav-icon"></i>
						<p>
							Pengumuman

						</p>
					</a>
				</li>

				<li class="nav-header">Kegiatan</li>
				<li
					class="nav-item <?= ($this->uri->segment(1) == 'k_kegiatan' || $this->uri->segment(1) == 'k_calendar' || $this->uri->segment(1) == 'k_rekapkegiatan') ? 'menu-open' : ''; ?>">
					<a href="#"
						class="nav-link <?= ($this->uri->segment(1) == 'k_kegiatan' || $this->uri->segment(1) == 'k_calendar'  || $this->uri->segment(1) == 'k_rekapkegiatan') ? 'active' : ''; ?>">
						<i class="fab fa-accusoft nav-icon"></i>
						<p>
							Kegiatan
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_kegiatan/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_kegiatan') ? 'active' : ''; ?> ">
								<i class="far fa-circle nav-icon"></i>
								<p>
									Berita Kegiatan

								</p>
							</a>
						</li>

						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_calendar/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_calendar') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Kalender Kegiatan</p>
							</a>
						</li>
						
						
					</ul>
				</li>

				<?php if ($this->session->userdata("role") == "super") {
			
		 ?>
				<li class="nav-header">Keuangan</li>
				<li
					class="nav-item <?= ($this->uri->segment(1) == 'k_pemasukan' || $this->uri->segment(1) == 'k_jenispemasukan' || $this->uri->segment(1) == 'k_pengeluaran' || $this->uri->segment(1) == 'k_headaccount') ? 'menu-open' : ''; ?>">
					<a href="#"
						class="nav-link <?= ($this->uri->segment(1) == 'k_pemasukan' || $this->uri->segment(1) == 'k_jenispemasukan'  || $this->uri->segment(1) == 'k_headaccount' || $this->uri->segment(1) == 'k_pengeluaran') ? 'active' : ''; ?>">
						<i class="fab fa-accusoft nav-icon"></i>
						<p>
							Kas Masjid
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_headaccount/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_headaccount') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Head Accoount</p>
							</a>
						</li>
						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_pemasukan/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_pemasukan') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Pemasukan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>k_pengeluaran/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_pengeluaran') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Pengeluaran</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>k_jenispemasukan/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_jenispemasukan') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Jenis Pemasukan</p>
							</a>
						</li>
					</ul>
				</li>

				<?php } ?>
				<li class="nav-header">Zakat fitrah & Qurban</li>
				<li
					class="nav-item <?= ($this->uri->segment(1) == 'k_zakat' || $this->uri->segment(1) == 'k_qurban' || $this->uri->segment(1) == 'k_distribusizakat' ) ? 'menu-open' : ''; ?>">
					<a href="#"
						class="nav-link <?= ($this->uri->segment(1) == 'k_zakat' || $this->uri->segment(1) == 'k_qurban' || $this->uri->segment(1) == 'k_distribusizakat' ) ? 'active' : ''; ?>">
						<i class="fab fa-accusoft nav-icon"></i>
						<p>
							Zakat fitrah & Qurban
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_zakat/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_zakat') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Pemasukan Zakat</p>
							</a>
						</li>
						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_distribusizakat/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_distribusizakat') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Distribusi Zakat</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>k_qurban/index"
								class="nav-link <?= ($this->uri->segment(1) == 'k_qurban') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Hewan Qurban</p>
							</a>
						</li>

					</ul>
				</li>
				<li class="nav-header">Database</li>
				<?php if ($this->session->userdata("role") == "super") {
			
			?>
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_user/index"
						class="nav-link <?= ($this->uri->segment(1) == 'k_user') ? 'active' : ''; ?>">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Data User
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_jamaah/index"
						class="nav-link <?= ($this->uri->segment(1) == 'k_jamaah') ? 'active' : ''; ?>">
						<i class="nav-icon fa fa-users"></i>
						<p>
							Data Jamaah
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_galeri/index"
						class="nav-link <?= ($this->uri->segment(1) == 'k_galeri') ? 'active' : ''; ?>">
						<i class="fas fa-photo-video nav-icon"></i>
						<p>
							Gallery
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_masjid/index"
						class="nav-link <?= ($this->uri->segment(1) == 'k_masjid') ? 'active' : ''; ?>">
						<i class="fas fa-mosque nav-icon"></i>
						<p>
							Data Masjid
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_aset/index"
						class="nav-link <?= ($this->uri->segment(1) == 'k_aset') ? 'active' : ''; ?>">
						<i class="fas fa-suitcase nav-icon"></i>
						<p>
							Data Aset
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
