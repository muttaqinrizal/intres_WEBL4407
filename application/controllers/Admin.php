<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function aturkonten()
	{
   		$data['konten'] = $this->admin_model->get_kontenhome();
   		$data['kontendisc'] = $this->admin_model->get_kontendisc();
		$data['tipe'] = $this->admin_model->get_tipe();
		// $data['kategori'] = $this->admin_model->get_kategori();
		$data['komentar'] = $this->admin_model->get_komentar();
	   	$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
		$this->load_view('admin/aturkonten',$data);
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer');
	
	}

	public function deleteuser($iduser){
		$this->admin_model->delete_user($iduser);
		redirect('admin/atur_member/');
	}


	public function atur_member()
	{
   		$data['member'] = $this->admin_model->get_alluser();
  //  		$data['kontendisc'] = $this->admin_model->get_kontendisc();
		// $data['tipe'] = $this->admin_model->get_tipe();
		// $data['kategori'] = $this->admin_model->get_kategori();
		// $data['komentar'] = $this->admin_model->get_komentar();
   		$data['konten'] = $this->admin_model->get_kontenhome();
   		$data['kontendisc'] = $this->admin_model->get_kontendisc();
	   	$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();

		$this->load_view('admin/aturmember',$data);
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer');
	}

	public function add_member()
	{
		$data['konten'] = $this->admin_model->get_kontenhome();
   		$data['kontendisc'] = $this->admin_model->get_kontendisc();
	   	$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
   		$this->load_view('admin/addmember');
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer');
	}

	public function load_view($view,$data = "")
    {
  	if( $this->session->userdata('logged_in')==TRUE&&strcmp($this->session->userdata('lvl'), "admin")==0) {
  		$this->load->view('client/header'); 
    	$usn=$this->session->userdata('usn');
    	$datausn['user'] = $this->admin_model->getuserid($usn);
    	$this->load->view('admin/sidebar',$datausn);
    	$this->load->view('client/sidebarkiriloggedin',$datausn);
		$this->load->view($view,$data);
   	
       }
       else{
       	$this->session->set_flashdata('loginstat','eror'); 
				//redirect to some function
		redirect('home');
       }
    }

	public function index()
	{
	// $data['database'] = $this->admin_model->get_all_data();

	// 	$data['title'] = "Test tampil Konten";

	// 	 $this->load->view('templates/header', $data);
	// 	// $this->load->view('tampilkonten', $data);
	// 	 $this->load->view('templates/footer');
	if( $this->session->userdata('logged_in')==TRUE&&strcmp($this->session->userdata('lvl'), "admin")==0) {
	$data['usnmasuk']=$this->session->userdata('usn');
	$data['jmlonlen']=$this->admin_model->jml_online();
	$data['konten']=$this->admin_model->get_kontenhome();
	$data['jmluser']=$this->admin_model->jml_user();
	$data['jmlkonten']=$this->admin_model->jmlkonten();

	$data['kontendisc'] = $this->admin_model->get_kontendisc();
   	$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
	$this->load_view('admin/main',$data);
	$this->load->view('client/sidebarkanan',$data);
	$this->load->view('client/footer');
	}else{
		$this->session->set_flashdata('loginstat','eror'); 
				//redirect to some function
		
		redirect('home',$data);
	}
	}

	public function deletekonten($idkonten)
	{
		$this->admin_model->del_konten($idkonten);
		// $this->session->set_flashdata('managenotif','hapus');
		redirect('/admin/');
	}

	// public function updatemember($id)
	// {
	// 	$this->validasi();
	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 		$this->formedit($id);
	// 	}
	// 	else
	// 	{
	// 		$this->mobil_model->update_mobil();
	// 		$this->session->set_flashdata('update_sukses', 'Data mobil berhasil diperbaharui');
	// 		redirect('/home/lihatdata');
	// 	}
	// }

	public function datakonten()
	{
		$this->load->library('pagination');
	    $config['base_url'] = base_url('admin/datakonten');
    	$config['total_rows'] = $this->admin_model->jmlkonten();
      	$config['per_page'] = 5;
      	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      	$this->pagination->initialize($config);
   		$data['konten'] = $this->admin_model->get_konten($config['per_page'],$page);
   		$data["link_admin"] = $this->pagination->create_links();
		$this->load_view('admin/aturkonten', $data);
	}

	public function formtambahkonten()
	{
		$data['tipe'] = $this->admin_model->get_tipe();
		$this->load_view('admin/formtambahkonten', $data);
	}


	// public function edituser($username)
	// {
	// 	$data['user'] = $this->admin_model->getuserid($username);
	// 	$this->load_view('admin/addmember', $data);
	// }

	public function tambahkonten()
	{
		// $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
		// $this->form_validation->set_rules('idkonten', 'Id Konten', ['required', 'is_unique[konten.idkonten]']);
		$this->validasiformkonten();
		if($this->form_validation->run() === FALSE)
		{
			$this->formtambahkonten();
		}
		else
		{
			$this->admin_model->tambah_konten();
			redirect('admin/datakonten');
			$this->session->set_flashdata('input_sukses','Data berhasil di input');	
		}
	}



	// public function hapusdata($id)
	// {
	// 	$this->mobil_model->hapus_mobil($id);
	// 	$this->session->set_flashdata('hapus_sukses','Data mobil berhasil di hapus');
	// 	redirect('/home/lihatdata');
	// }

	// public function formedit($id)
	// {
	// 	$data['title'] = 'Edit Data | Test tampil Database';

	// 	$data['db'] = $this->mobil_model->edit_mobil($id);

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('formedit', $data);
	// 	$this->load->view('templates/footer');
	// }

	// public function updatemobil($id)
	// {
	// 	$this->validasi();

	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 		$this->formedit($id);
	// 	}
	// 	else
	// 	{
	// 		$this->mobil_model->update_mobil();
	// 		$this->session->set_flashdata('update_sukses', 'Data mobil berhasil diperbaharui');
	// 		redirect('/home/lihatdata');
	// 	}
	// }

	public function validasiformkonten()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'tipe',
					'label' => 'Tipe',
					'rules' => 'required'
				],[
					'field' => 'judul',
					'label' => 'Judul',
					'rules' => 'required'
				],
				[
					'field' => 'kategori',
					'label' => 'Kategori',
					'rules' => 'required'
				],
				[
					'field' => 'deskripsi',
					'label' => 'Deskripsi',
					'rules' => 'required'
				],
				[
					'field' => 'pembuat',
					'label' => 'Pembuat',
					'rules' => 'required'
				],
				[
					'field' => 'post',
					'label' => 'Post',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}

	
}
?>