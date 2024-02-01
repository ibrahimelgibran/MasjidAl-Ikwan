<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_masjid');

		$this->load->model('m_grafik');
		$this->load->helper('rupiah_helper');
		if (!$this->session->userdata("level") == "admin") {
			redirect('login');
		}
	}

	// Halaman dasbor
	public function index()
	{
		$this->load->model('m_user');
		//settingdata masjid
		$id = $this->session->userdata("user_id");
		$data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
		$data['logo'] = $this->m_masjid->detail()->masjid_logo;
		$data['namauser'] = $this->m_user->getuser($id)->user_nama;


		//

		//get data in card
		$data['totalpemasukan'] = $this->db->query(" SELECT SUM(pemasukan_jumlah) AS total FROM tbl_pemasukan ")->row();
		$bulanini = date('m');
		 $pemasukanbulanini= $this->db->query("SELECT  MONTH(pemasukan_tanggal) AS Month, SUM(pemasukan_jumlah) AS pemasukan
		 FROM tbl_pemasukan
		 WHERE MONTH(pemasukan_tanggal) = '$bulanini'
		 GROUP BY  MONTH(pemasukan_tanggal) ")->row();
		$realpemasukanbulanini=null;
		 if ($pemasukanbulanini == '') {
			$realpemasukanbulanini= 0;
		} else {
			$realpemasukanbulanini=$pemasukanbulanini->pemasukan;
		 }
		 

		$data['pemasukanbulanini']=$realpemasukanbulanini;
		$data['totalpengeluaran'] = $this->db->query(" SELECT SUM(pengeluaran_jumlah) AS total FROM tbl_pengeluaran ")->row();
		$data['pengeluaranbulanini'] = $this->db->query("SELECT SUM(pengeluaran_jumlah) AS pengeluaran FROM tbl_pengeluaran WHERE MONTH(pengeluaran_tanggal) = '$bulanini'  ")->row();

		$data['grafikpemasukan'] = $this->m_grafik->get_data_pemasukan();
		$data['grafikpengeluaran'] = $this->m_grafik->get_data_pengeluaran();

		//
		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/dashboard', $data);
		$this->load->view('paneladmin/partials/footerdashboard', $data);
	}

	public function load()
	{
		$dataa = $this->db->get("tbl_rencanakegiatan")->result_array();
   
        foreach ($dataa as $row ) 
		{
			$data[] = array(
				// 'id' => $row['id'],
				'title' => $row['nama_kegiatan'],
				'start' => $row['tanggal'],
				'end' => date('Y-m-d', strtotime($row['tanggal_selesai'].'+ 1 days ')),
				'description' => $row['keterangan'],
				'tanggal' => date('d M Y', strtotime($row['tanggal'])),
				'selesai' => date('d M Y', strtotime($row['tanggal_selesai']))
			   );
			
            // $data['data'][$key]['title'] = $value->nama_kegiatan;
            // $data['data'][$key]['start'] = $value->tanggal;
            // $data['data'][$key]['end'] =  date('Y-m-d', strtotime($value->tanggal_selesai.'+ 1 days '));;
            // $data['data'][$key]['description'] = $value->keterangan;
            // $data['data'][$key]['tanggal'] = date('d M Y', strtotime($value->tanggal));
            // $data['data'][$key]['selesai'] = date('d M Y', strtotime($value->tanggal_selesai));
            // // $data['data'][$key]['backgroundColor'] = "#00a65a";
        }

		echo json_encode($data);
	}
}
