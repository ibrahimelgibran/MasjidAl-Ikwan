<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_aset extends CI_Controller
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

		$data['judul'] = 'Kelola Data Aset';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_aset', $data);
		$this->load->view('paneladmin/partials/footeraset', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->order_by('id','DESC');
		$query = $this->db->get("tbl_aset");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
			if ($lists->harga ==="") {
				$uang = 0;
			} else {
				$uang= $lists->harga;
			}
			$data[$key][]  = $no;
			$data[$key][]  = $lists->nama;
			$data[$key][]  = $lists->jenis_pengadaan;
			$data[$key][]  = date("d M Y",strtotime($lists->tanggal_pembelian));
			$data[$key][]  = 'Rp.'.rupiah($uang);
			$data[$key][]  = $lists->keterangan;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data,
            
		);


		echo json_encode($result);
		exit();
	}



	function simpan()
	{


		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$tanggal = $this->input->post('tanggal');
		$harga = $this->input->post('harga');
		$keterangan = $this->input->post('keterangan');

        
            $datasimpan = array(

                'nama' => $nama,
                'jenis_pengadaan' => $jenis,
                'harga' => $harga,
                'tanggal_pembelian' => $tanggal,
                'keterangan' => $keterangan,
            );
    
            $data = $this->db->insert('tbl_aset', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        

		
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->get_where("tbl_aset",["id" => $koser]);
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
                'nama' => $data->nama,
                'jenis' => $data->jenis_pengadaan,
                'tanggal' => $data->tanggal_pembelian,
                'harga' => $data->harga,
                'keterangan' => $data->keterangan,
                'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{
        $nama = $this->input->post('enama');
		$jenis = $this->input->post('ejenis');
		$tanggal = $this->input->post('etanggal');
		$harga = $this->input->post('eharga');
		$keterangan = $this->input->post('eketerangan');

        $datasimpan = array(
            'nama' => $nama,
            'jenis_pengadaan' => $jenis,
            'harga' => $harga,
            'tanggal_pembelian' => $tanggal,
            'keterangan' => $keterangan,
        );

        
		$this->db->where('id', $this->input->post('kodedit'));
		$simpan = $this->db->update('tbl_aset', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_aset WHERE id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
