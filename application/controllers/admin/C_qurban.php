<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_qurban extends CI_Controller
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

		$data['judul'] = 'Kelola Data Qurban';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_qurban', $data);
		$this->load->view('paneladmin/partials/footerqurban', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->order_by('id','DESC');
		$query = $this->db->get("tbl_pengelolaqurban");

        // widget
        $tahunini = date('Y');
		$totalkambing = $this->db->query(" SELECT SUM(sum) AS total FROM tbl_pengelolaqurban WHERE jenis_hewan = 'kambing'")->row();
        $totalkambingtahunini= $this->db->query("SELECT SUM(sum) AS total FROM tbl_pengelolaqurban WHERE jenis_hewan = 'kambing' AND YEAR(tanggal_diterima) = '$tahunini'")->row();

        $totalsapi= $this->db->query(" SELECT SUM(jumlah) AS total FROM tbl_pengelolaqurban WHERE jenis_hewan = 'sapi' ")->row();

	

		$hasilsapi =  intval($totalsapi->total / 7);
		$sisasapi 	= $totalsapi->total % 7 ;

        $totalsapitahunini= $this->db->query("SELECT SUM(jumlah) AS total FROM tbl_pengelolaqurban WHERE jenis_hewan = 'sapi' AND YEAR(tanggal_diterima) = '$tahunini'")->row();

		

		$hasilsapitahunini =  intval($totalsapitahunini->total / 7);
		$sisasapitahunini	= $totalsapitahunini->total % 7 ;


        // akhir widget


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
			if ($lists->per === NULL) {
				$jumlah = $lists->jumlah;
			} else {
				$jumlah = $lists->jumlah.' / '.$lists->per;
			}
			

			$data[$key][]  = $no;
			$data[$key][]  = $lists->tahun_hijriah;
			$data[$key][]  = $lists->shohibul_qurban;
			$data[$key][]  = date("d M Y",strtotime($lists->tanggal_diterima));
			$data[$key][]  = $lists->jenis_hewan;
			$data[$key][]  = $jumlah;
			$data[$key][]  = $lists->keterangan;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data,
            'totalkambing'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-white"><i ><img src="'.base_url('assets/goat.png').'" width="40px"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text">Total Qurban Kambing :</span>
                       <span class="info-box-number text-primary"><h5>' . $totalkambing->total . ' Ekor</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',

			'totalkambingtahun'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-white"><i><img src="'.base_url('assets/goat.png').'" width="40px"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text">Qurban Kambing Tahun ini :</span>
                       <span class="info-box-number text-primary"><h5>' . $totalkambingtahunini->total . ' Ekor</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',
            'totalsapi'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-white"><i ><img src="'.base_url('assets/cow.png').'" width="40px"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text"> Total Qurban Sapi :</span>
                       <span class="info-box-number text-primary"><h5>' . $hasilsapi.' <sup>'. $sisasapi.'</sup>/<sub>7</sub> Ekor</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',

			'totalsapitahun'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-white"><i ><img src="'.base_url('assets/cow.png').'" width="40px"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text">Qurban Sapi Tahun ini :</span>
                       <span class="info-box-number text-primary"><h5>' . $hasilsapitahunini.' <sup>'.$sisasapitahunini.'</sup>/<sub>7</sub> Ekor</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
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
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		$per = $this->input->post('per');
		if ($jenis === "kambing") {
			$sum = $jumlah;
		} else {
			$sum = $jumlah / $per;
		}
		

        
            $datasimpan = array(

                'tahun_hijriah' => $tahun,
                'shohibul_qurban' => $muzakki,
                'jenis_hewan' => $jenis,
                'tanggal_diterima' => $tanggal,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
                'sum' => $sum,
                'per' => $per,
            );
    
            $data = $this->db->insert('tbl_pengelolaqurban', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        

		
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->get_where("tbl_pengelolaqurban",["id" => $koser]);
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
                'tahun' => $data->tahun_hijriah,
                'muzakki' => $data->shohibul_qurban,
                'jenis' => $data->jenis_hewan,
                'tanggal' => $data->tanggal_diterima,
                'jumlah' => $data->jumlah,
                'keterangan' => $data->keterangan,
                'id' => $data->id,
				'sum' => $data->sum,
                'per' => $data->per,
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
		$jumlah = $this->input->post('ejumlah');
		$keterangan = $this->input->post('eketerangan');
		$per = $this->input->post('eper');
		if ($jenis === "kambing") {
			$sum = $jumlah;
		} else {
			$sum = $jumlah / $per;
		}
		

        $datasimpan = array(
            'tahun_hijriah' => $tahun,
                'shohibul_qurban' => $muzakki,
                'jenis_hewan' => $jenis,
                'tanggal_diterima' => $tanggal,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
				'sum' => $sum,
                'per' => $per,
        );

        
		$this->db->where('id', $this->input->post('kodedit'));
		$simpan = $this->db->update('tbl_pengelolaqurban', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_pengelolaqurban WHERE id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
