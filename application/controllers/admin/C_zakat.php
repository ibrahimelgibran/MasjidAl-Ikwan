<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_zakat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_masjid');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('rupiah_helper');

		//cek session login
		if (!$this->session->userdata("level") == "admin") {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('m_user');
		//settingdata masjid
		$id = $this->session->userdata("user_id");
		$data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
		$data['logo'] = $this->m_masjid->detail()->masjid_logo;
		$data['namauser'] = $this->m_user->getuser($id)->user_nama;


		//

		$data['judul'] = 'Kelola Data Zakat';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_zakat', $data);
		$this->load->view('paneladmin/partials/footerzakat', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->order_by('id','DESC');
		$query = $this->db->get("tbl_zakatfitrah");

        // widget
        $tahunini = date('Y');
		$totalzakatuang = $this->db->query(" SELECT SUM(nilai_uang) AS total FROM tbl_zakatfitrah ")->row();
        $totalzakatuangtahunini= $this->db->query("SELECT SUM(nilai_uang) AS total FROM tbl_zakatfitrah WHERE YEAR(tanggal_diterima) = '$tahunini'")->row();

        $totalzakatberas= $this->db->query(" SELECT SUM(nilai_beras) AS total FROM tbl_zakatfitrah ")->row();
        $totalzakatberastahunini= $this->db->query("SELECT SUM(nilai_beras) AS total FROM tbl_zakatfitrah WHERE YEAR(tanggal_diterima) = '$tahunini'")->row();


        // akhir widget


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
			if ($lists->nilai_uang ==="") {
				$uang = 0;
			} else {
				$uang= $lists->nilai_uang;
			}
			if ($lists->nilai_beras ==="") {
				$beras = 0;
			} else {
				$beras= $lists->nilai_beras;
			}
			
			$data[$key][]  = $no;
			$data[$key][]  = $lists->tahun;
			$data[$key][]  = $lists->muzakki;
			$data[$key][]  = date("d M Y",strtotime($lists->tanggal_diterima));
			$data[$key][]  = $lists->jenis;
			$data[$key][]  = $beras;
			$data[$key][]  = 'Rp.'.rupiah($uang);
			$data[$key][]  = $lists->keterangan;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data,
            'totaluang'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-success"><i class="fas fa-comments-dollar"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text"> Total Zakat Uang Keseluruhan :</span>
                       <span class="info-box-number text-primary"><h5>Rp. ' . rupiah($totalzakatuang->total) . '</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',

			'totaluangtahun'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-info"><i class="fas fa-comments-dollar"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text">Zakat Uang Tahun ini :</span>
                       <span class="info-box-number text-primary"><h5>Rp. ' . rupiah($totalzakatuangtahunini->total) . '</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',
                   'totalberas'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-success"><i class="fas fa-shopping-bag"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text"> Total Zakat beras Keseluruhan :</span>
                       <span class="info-box-number text-primary"><h5>' . $totalzakatberas->total.'.Kg</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',

			'totalberastahun'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-info"><i class="fas fa-shopping-bag"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text">Zakat Beras Tahun ini :</span>
                       <span class="info-box-number text-primary"><h5>' . $totalzakatberastahunini->total.'.Kg</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   '
		);


		echo json_encode($result);
		exit();
	}



	function simpan()
	{


		$tahun = $this->input->post('tahun');
		$muzakki = $this->input->post('muzakki');
		$jenis = $this->input->post('jenis');
		$tanggal = $this->input->post('tanggal');
		$nilai_beras = $this->input->post('nilai_beras');
		$nilai_uang = $this->input->post('nilai_uang');
		$keterangan = $this->input->post('keterangan');

        
            $datasimpan = array(

                'tahun' => $tahun,
                'muzakki' => $muzakki,
                'jenis' => $jenis,
                'tanggal_diterima' => $tanggal,
                'nilai_beras' => $nilai_beras,
                'nilai_uang' => $nilai_uang,
                'keterangan' => $keterangan,
            );
    
            $data = $this->db->insert('tbl_zakatfitrah', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        

		
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->get_where("tbl_zakatfitrah",["id" => $koser]);
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
                    'tahun' => $data->tahun,
                    'muzakki' => $data->muzakki,
                    'jenis' => $data->jenis,
                    'tanggal' => $data->tanggal_diterima,
                    'nilai_beras' => $data->nilai_beras,
                    'nilai_uang' => $data->nilai_uang,
                    'keterangan' => $data->keterangan,
                'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{
        $tahun = $this->input->post('etahun');
		$muzakki = $this->input->post('emuzakki');
		$jenis = $this->input->post('ejenis');
		$tanggal = $this->input->post('etanggal');
		$nilai_beras = $this->input->post('enilai_beras');
		$nilai_uang = $this->input->post('enilai_uang');
		$keterangan = $this->input->post('eketerangan');

        $datasimpan = array(
            'tahun' => $tahun,
            'muzakki' => $muzakki,
            'jenis' => $jenis,
            'tanggal_diterima' => $tanggal,
            'nilai_beras' => $nilai_beras,
            'nilai_uang' => $nilai_uang,
            'keterangan' => $keterangan,
        );

        
		$this->db->where('id', $this->input->post('kodedit'));
		$simpan = $this->db->update('tbl_zakatfitrah', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_zakatfitrah WHERE id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
