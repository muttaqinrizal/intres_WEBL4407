<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function load_view_home($view,$data = "")
    {
    	// header
	    $this->load->view('client/header'); 
	    // cek jika sudah login
	    if($this->session->userdata('logged_in') == TRUE){
	    $usn=$this->session->userdata('usn');
    	$datausn['user'] = $this->admin_model->getuserid($usn);	

    	// apakah admin
		if(strcmp($this->session->userdata('lvl'), "admin")==0){
		// panel admin
			$this->load->view('admin/sidebar',$datausn);	
		}
		// sidebar pengguna logged in
		$this->load->view('client/sidebarkiriloggedin',$datausn);
		}else{
        	// keluar logout/login
        $this->load->view('client/sidebarkiri',$data);
        }		
        // form signup
        $this->load->view('client/signup',$data);
    	$this->load->view($view,$data);  
    }


	public function index()
	{
   		$data['konten'] = $this->admin_model->get_kontenhome();
   		$data['kontendisc'] = $this->admin_model->get_kontendisc();
   		$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
		$data['tipe'] = $this->admin_model->get_tipe();
		// $data['kategori'] = $this->admin_model->get_kategori();
		$data['komentar'] = $this->admin_model->get_komentar();
		$this->load_view_home('client/main',$data);
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer');
	}

	

	public function managekonten($usn)
	{
		if(strcmp($this->session->userdata('usn'), $usn)==0){
   		$data['konten'] = $this->admin_model->get_kontenuser($usn);
   		$data['kontendisc'] = $this->admin_model->get_kontendisc();
		$data['tipe'] = $this->admin_model->get_tipe();
		// $data['kategori'] = $this->admin_model->get_kategori();
		$data['komentar'] = $this->admin_model->get_komentar();
		
		$data['detailuser'] = $this->admin_model->getuserid($usn);
		$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
		$this->load_view_home('client/managekonten',$data);
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer',$data);
		}
		else{
		$this->session->set_flashdata('loginstat','eror'); 
				//redirect to some function
		redirect('home');
		}
	}

	public function detailuser($usn)
	{	
		$data['konten'] = $this->admin_model->get_kontenhome();
		$data['komentar'] = $this->admin_model->get_komentar();
		$data['detailuser'] = $this->admin_model->getuserid($usn);
		$data['kontendisc'] = $this->admin_model->get_kontendisc();
   		$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
		$this->load_view_home('client/userdetail',$data);
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer',$data);
		
	}

	public function updateakun($usn){
		$this->validasiformeditakun();
    	if ($this->form_validation->run() == FALSE) {
    		echo "eror";
    	} else {
    		$this->admin_model->update_akun($usn);   
    		 //ganti akun admin 
			if(strcmp($this->session->userdata('lvl'), "admin")==0){
				//deteksi apa akunnya sendiri yg diganti
				if(strcmp($this->session->userdata('usn'), $usn)==0){
				$userdata = array(
				        'usn'  => $this->input->post('usn')
				);
				$this->session->set_userdata($userdata);
				}
				// kedaftar member jika sukses
				redirect('admin/atur_member/');	
			}

			else{
    		// $this->admin_model->update_akun($usn);
				// ganti akun user
    		$userdata = array(
				        'usn'  => $this->input->post('usn')
				);
    		//redirect dan ganti session username
			$this->session->set_userdata($userdata);
	   		redirect('home/detailuser/'.$this->session->userdata('usn'));
	   		}
    	}
	}

	public function editakun($usn)
	{
		if(strcmp($this->session->userdata('usn'), $usn)==0){
		$data['detailuser'] = $this->admin_model->getuserid($usn);
		$this->load_view_home('client/akunedit',$data);
		$data['konten'] = $this->admin_model->get_kontenhome();
		$data['kontendisc'] = $this->admin_model->get_kontendisc();
   		$data['diskusiteratas'] = $this->admin_model->get_diskusiteratas();
		$this->load->view('client/sidebarkanan',$data);
		$this->load->view('client/footer',$data);
		}
		else{
		$this->session->set_flashdata('loginstat','eror'); 
				//redirect to some function
		redirect('home');
		}
	}

	public function editkonten($idkonten)
	{
		if( $this->session->userdata('logged_in') ) {
				// $data['kategori'] = $this->admin_model->get_kategori();
				$data['tipe'] = $this->admin_model->get_tipe();
				$data['konten'] = $this->admin_model->get_detailkonten($idkonten);
				$data['status']="edit";
				$this->load_view_home('client/formposting', $data);
			} else {
		     $this->session->set_flashdata('loginstat','eror'); 
				//redirect to some function
				redirect("home/");
				//echo in view or controller
		    }
	}

	public function edituser($iduser){
		$data['iduser']=$iduser;
		$data['useredit']=$this->admin_model->selectuser($iduser);
		$this->load_view_home('admin/editmember',$data);
	}

	public function deletekonten($idkonten)
	{
		$this->admin_model->del_konten($idkonten);
		if($this->session->userdata('logged_in') == TRUE){
	    $usn=$this->session->userdata('usn');	
	    	if(strcmp($this->session->userdata('lvl'), "admin")==0){
	    	redirect('admin/aturkonten');		
	   		}
        }
		$this->session->set_flashdata('managenotif','hapus');
		redirect('home/managekonten/'.$usn);
	}

	public function admin()
	{
		// $userdata = array(
		// 		        'username'  => "galang",
		// 		        'user_id'     => "1",
		// 		);
		// $this->session->set_userdata($userdata);
		redirect('admin/index');
	}

	public function search($key)
	{
	$data['cari'] = $this->admin_model->get_search($key);
	$data['key']=$key;
	$this->load_view_home('client/tampilsearch',$data);
	}

	public function searchtag($key)
	{
	$data['cari'] = $this->admin_model->get_searchtag($key);
	$this->load_view_home('client/tampilsearch',$data);
	}

	public function searchuserpost($key)
	{
	$data['cari'] = $this->admin_model->get_search_upost($key);
	$this->load_view_home('client/tampilsearch',$data);
	}


	public function submitkomentar($idk)
	{
		$this->validasiformkomentar();
		if($this->form_validation->run() === FALSE)
		{
			echo "eror";
		}
		else
		{
			$this->admin_model->tambah_komentar($idk);
			$this->admin_model->counter_komentar($idk);
			redirect('home/detailkonten/'.$idk);
			
			$this->session->set_flashdata('input_sukses','Data berhasil di input');	
		}
	}


	public function tambahuser()
	{
		// $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
		// $this->form_validation->set_rules('id_user', 'Id user', ['required', 'is_unique[user.id_user]']);
		$this->validasiformsignup();
		if($this->form_validation->run() === FALSE)
		{
			echo "eror";
		}
		else
		{
			$this->admin_model->tambah_user();
			redirect('home/index');
			$this->session->set_flashdata('input_sukses','Data berhasil di input');	
		}
	}


	public function login()
	{

		// $this->form_validation->set_rules('id_user', 'Id user', ['required', 'is_unique[user.id_user]']);
		if($this->session->userdata('logged_in') == TRUE){
        	redirect('home/');
        }
        $this->validasiformlogin();
    	if ($this->form_validation->run() == FALSE) {
    		redirect('home/');
    	} else {
    		$username = $this->input->post('usn');
    		$password = base64_encode($this->input->post('pass'));
    		// $password = $this->input->post('pass');

    		if($this->admin_model->login($username,$password) == 1){
    			//success
    			$id_user = $this->admin_model->getuserid($username)->id_user;
    			$level_user = $this->admin_model->getuserid($username)->level;
    			$userdata = array(
				        'usn'  => $username,
				        'id_user'     => $id_user,
				        'logged_in' => TRUE,
				        'lvl' => $level_user
				);
				$this->session->set_userdata($userdata);
				$status='TRUE';
    			$this->admin_model->userlog($id_user,$status);
    			$this->session->set_flashdata('loginstat', 'sukses');
    			if(strcmp($this->session->userdata('lvl'),'admin')==0){
    			redirect('admin/');
    			}
    			else {
    			redirect('home/index');
    			}
    		}else{
    			//error
    			$this->session->set_flashdata('error', 'Error in Username or Password');
    			// $this->load->view('login');
    			redirect('home/');
    		}
    	}
	}

	public function formposting()
	{
		// jika udah login
		if( $this->session->userdata('logged_in') ) {
			//jika login admin sidebar beda
			$data['tipe'] = $this->admin_model->get_tipe();
			$data['status']="add";
		if( strcmp($this->session->userdata('lvl'), "admin")==0)  {
			$this->load_view_home('client/formposting', $data);
			}else{
				// jika sidebar user
			$this->load_view_home('client/formposting', $data);
			}

			}

			 else {
			 	// notif blm login 
		     $this->session->set_flashdata('loginstat','eror'); 
		     	// kirim ke home login dl
				redirect("home/");
				
		    }
	}


	public function solved($idkomen)
	{
		 $this->admin_model->update_komentar($idkomen);
		 redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapuskomen($idkomen)
	{
		 $this->admin_model->hapus_komen($idkomen);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// public function updatemember($id)
	// {
	// 	$this->validasiedit();
	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 		echo $id;
	// 	}
	// 	else
	// 	{
	// 		$this->admin_model->update_member($id);
	// 		$this->session->set_flashdata('update_sukses', 'Data mobil berhasil diperbaharui');
	// 		redirect('/admin/add_member');
	// 	}
	// }


	public function posting($stats)
	{
		// $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
		// $this->form_validation->set_rules('idkonten', 'Id Konten', ['required', 'is_unique[konten.idkonten]']);
		$this->validasiformposting();
		if($this->form_validation->run() === FALSE)
		{
			$this->formposting();
		}
		else
		{
			if(strcmp($stats, "add")==0){
			$this->admin_model->tambah_konten();
			redirect('home/');
			$this->session->set_flashdata('input_sukses','Data berhasil di input');
			}else{
			$this->admin_model->update_konten();
		    $usn=$this->session->userdata('usn');	
		    $this->session->set_flashdata('managenotif','edit');
		    // jika admin
		    if(strcmp($this->session->userdata('lvl'), "admin")==0){
	    	redirect('admin/aturkonten');		
	   		}else{
			redirect('home/managekonten/'.$usn);
				}
			}
		}
	}

	public function vote($slug)
	{
     $this->admin_model->update_vote($slug);
      redirect($_SERVER['HTTP_REFERER']);
	}

	public function detailkonten($kontenid)
	{
		$data['konten'] = $this->admin_model->get_detailkonten($kontenid);
		$data['komentar'] = $this->admin_model->get_komentarkonten($kontenid);
		$data['jmlkomentar'] = $this->admin_model->get_jmlkomentarkonten($kontenid);
		$this->load_view_home('client/detailkonten',$data);
		$this->load->view('client/footer');
		$this->add_count($kontenid);
	}

	public function add_count($slug)
	{
    $this->load->helper('cookie');
  $check_visitor = $this->input->cookie(urldecode($slug), FALSE);
    $ip = $this->input->ip_address();
    if ($check_visitor == false) {
        $cookie = array(
            "name"   => urldecode($slug),
            "value"  => "$ip",
            "expire" =>  time() + 7200,
            "secure" => false
        );
        $this->input->set_cookie($cookie);
        $this->admin_model->update_counter(urldecode($slug));
    }
}

	



	public function logout()
    {
    	$id_user=$this->session->userdata('id_user');
   		$status='FALSE';
		$this->admin_model->userlog($id_user,$status);
    	$this->session->sess_destroy();  	
    	redirect('home/index');
    }


	public function validasiformlogin()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'usn',
					'label' => 'Usn',
					'rules' => 'required'
				],
				[
					'field' => 'pass',
					'label' => 'Password',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}


	public function validasiformeditakun(){
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'id',
					'label' => 'ID',
					'rules' => 'required'
				],[
					'field' => 'level',
					'label' => 'Level',
					'rules' => 'required'
				],
				[
					'field' => 'usn',
					'label' => 'Usn',
					'rules' => 'required'
				],
				[
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
				],
				[
					'field' => 'pass',
					'label' => 'Pass',
					'rules' => 'required'
				],
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required'
				],
				[
					'field' => 'bio',
					'label' => 'Bio',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}


	public function validasiformkomentar()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
				],
				[
					'field' => 'isikomentar',
					'label' => 'Isikomentar',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}

	public function validasiedit()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'level',
					'label' => 'Level',
					'rules' => 'required'
				],[
					'field' => 'usn',
					'label' => 'Usn',
					'rules' => 'required'
				],
				[
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'required'
				],
				[
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
				],
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required'
				],
				[
					'field' => 'bio',
					'label' => 'Bio',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}

	public function validasiformsignup()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'level',
					'label' => 'Level',
					'rules' => 'required'
				],[
					'field' => 'usn',
					'label' => 'Usn',
					'rules' => 'required'
				],
				[
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
				],
				[
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'required'
				],
				[
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
				],
				[
					'field' => 'fname',
					'label' => 'Fname',
					'rules' => 'required'
				],
				[
					'field' => 'lname',
					'label' => 'Lname',
					'rules' => 'required'
				],
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required'
				],
				[
					'field' => 'bio',
					'label' => 'Bio',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}

	public function validasiformposting()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'id_konten',
					'label' => 'Id_konten',
					
				],
				[
					'field' => 'tipe',
					'label' => 'Tipe',
					'rules' => 'required'
				],
				[
					'field' => 'judul',
					'label' => 'Judul',
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
				],
				[
					'field' => 'blog_tags',
					'label' => 'Blog_tags',
					'rules' => 'required'
				]
			];

		$this->form_validation->set_rules($config);
	}

	// public function formtambah()
	// {
	// 	$data['title'] = "Tambah Data | Test tampil Database";

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('formtambah');
	// 	$this->load->view('templates/footer');
	// }

	// public function tambahmobil()
	// {
	// 	$this->form_validation->set_message('is_unique', '{field} sudah terpakai');

	// 	$this->form_validation->set_rules('kdmobil', 'Kode Mobil', ['required', 'is_unique[mobil.kdmobil]']);

	// 	$this->validasi();

	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 		$this->formtambah();
	// 	}
	// 	else
	// 	{
	// 		$this->mobil_model->tambah_mobil();
	// 		$this->session->set_flashdata('input_sukses','Data mobil berhasil di input');
	// 		redirect(current_url());
	// 	}
	// }

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

	// public function validasi()
	// {
	// 	$this->form_validation->set_message('required', '{field} tidak boleh kosong');

	// 	$config = [[
	// 				'field' => 'jenis',
	// 				'label' => 'Jenis',
	// 				'rules' => 'required'
	// 			],
	// 			[
	// 				'field' => 'tahun',
	// 				'label' => 'Tahun',
	// 				'rules' => 'required'
	// 			],
	// 			[
	// 				'field' => 'harga',
	// 				'label' => 'Harga',
	// 				'rules' => 'required'
	// 			],
	// 			[
	// 				'field' => 'nopol',
	// 				'label' => 'No. Polisi',
	// 				'rules' => 'required'
	// 			]];

	// 	$this->form_validation->set_rules($config);
	// }
}
?>