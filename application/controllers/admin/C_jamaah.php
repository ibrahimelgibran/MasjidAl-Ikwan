<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jamaah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_masjid');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');

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

		$data['judul'] = 'Kelola Data Jamaah';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_jamaah', $data);
		$this->load->view('paneladmin/partials/footerjamaah', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->order_by('id','DESC');
		$query = $this->db->get("tbl_jamaah");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = $lists->nama;
			$data[$key][]  = $lists->status;
			$data[$key][]  = $lists->nama_istri;
			$data[$key][]  = $lists->alamat;
			$data[$key][]  = $lists->no_kontak;
			$data[$key][]  = $lists->keterangan;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);


		echo json_encode($result);
		exit();
	}



	function simpan()
	{


		$nama = $this->input->post('nama');
		$status = $this->input->post('status');
		$nama_istri = $this->input->post('nama_istri');
		$alamat = $this->input->post('alamat');
		$no_kontak = $this->input->post('no_kontak');
		$keterangan = $this->input->post('keterangan');

        $cari = $this->db->get_where('tbl_jamaah' , ['no_kontak' => $no_kontak]);
        if ($cari->num_rows() < 1) {
            $datasimpan = array(

                'nama' => $nama,
                'status' => $status,
                'nama_istri' => $nama_istri,
                'alamat' => $alamat,
                'no_kontak' => $no_kontak,
                'keterangan' => $keterangan,
            );
    
            $data = $this->db->insert('tbl_jamaah', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'ada';
        }
        

		
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->get_where("tbl_jamaah",["id" => $koser]);
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
				'nama' => $data->nama,
                'status' => $data->status,
                'nama_istri' => $data->nama_istri,
                'alamat' => $data->alamat,
                'no_kontak' => $data->no_kontak,
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
		$status = $this->input->post('estatus');
		$nama_istri = $this->input->post('enama_istri');
		$alamat = $this->input->post('ealamat');
		$no_kontak = $this->input->post('eno_kontak');
		$keterangan = $this->input->post('eketerangan');

        $datasimpan = array(
            'nama' => $nama,
            'status' => $status,
            'nama_istri' => $nama_istri,
            'alamat' => $alamat,
            'no_kontak' => $no_kontak,
            'keterangan' => $keterangan,
        );

        
		$this->db->where('id', $this->input->post('kodedit'));
		$simpan = $this->db->update('tbl_jamaah', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_jamaah WHERE id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
