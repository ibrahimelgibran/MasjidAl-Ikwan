<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_headaccount extends CI_Controller
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

		$data['judul'] = 'Kelola Head Account';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_headaccount', $data);
		$this->load->view('paneladmin/partials/footerheadaccount', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->order_by('id','DESC');
		$query = $this->db->get("tbl_headaccount");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = $lists->account_id;
			$data[$key][]  = $lists->head_account;
			$data[$key][]  = $lists->jenis_transaksi;
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


		$acid = $this->input->post('acid');
		$head = $this->input->post('head');
		$jenis = $this->input->post('jenis');

        $cari = $this->db->get_where('tbl_headaccount' , ['account_id' => $acid]);
        if ($cari->num_rows() < 1) {
            $datasimpan = array(

                'account_id	' => $acid,
                'head_account	' => $head,
                'jenis_transaksi	' => $jenis,
            );
    
            $data = $this->db->insert('tbl_headaccount', $datasimpan);
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
		$user = $this->db->get_where("tbl_headaccount",["id" => $koser]);
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'acid' => $data->account_id,
					'head' => $data->head_account,
					'jenis' => $data->jenis_transaksi,
					'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{
        $acid = $this->input->post('eacid');
		$head = $this->input->post('ehead');
		$jenis = $this->input->post('ejenis');

		$datasimpan = array(
            'account_id	' => $acid,
            'head_account	' => $head,
            'jenis_transaksi	' => $jenis,
        );

		$this->db->where('id', $this->input->post('kodedit'));
		$simpan = $this->db->update('tbl_headaccount', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_headaccount WHERE id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
