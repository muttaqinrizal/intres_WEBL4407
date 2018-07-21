<?php

class Admin_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function get_konten($limit,$page)
	{
		$this->db->order_by("idkonten", "desc");
		$this->db->limit(($limit),$page);

		$query = $this->db->get('konten');
		return $query->result();
	}

	public function get_alluser()
	{
		$this->db->order_by("id_user", "desc");
		$query = $this->db->get('user');
		return $query->result();
	}

	public function delete_user($iduser){
		$this->db->delete('user', ['id_user' => $iduser]);
	}

	public function get_kontenhome()
	{
		$this->db->order_by("tgl_dibuat", "desc");
		$query = $this->db->get('konten');
		return $query->result();
	}

	public function get_kontendisc()
	{
		$this->db->order_by("pengunjung", "desc");
		$this->db->limit(5);  
		$query = $this->db->get('konten');
		return $query->result();
	}

	// public function get_diskusiteratas()
	// {
	// 	$query = $this->db->get('komentar');
	// 	return $query->result();
	// }

	public function get_kontenuser($usn)
	{
		$this->db->where('pembuat', $usn);
		$this->db->order_by("idkonten", "desc");
		// $this->db->limit(3);  
		$query = $this->db->get('konten');
		return $query->result();
	}


	public function login($username,$password)
	{
		$this->db->where('usn', $username);
		$this->db->where('pass', $password);
		$query = $this->db->get('user', 1);
		return $query->num_rows();
	}

	public function getuserid($username)
	{
		$this->db->where('usn', $username);
		$query = $this->db->get('user');
		return $query->row();
	}


	public function selectuser($id)
	{
		$this->db->where('id_user', $id);
		$query = $this->db->get('user');
		return $query->row();
	}

	public function get_search_upost($usn)
	{
		$this->db->where('pembuat', $usn);
		$query = $this->db->get('konten');
		return $query->result();
	}

	public function userlog($id_user,$stats)
	{
	$now = date('Y-m-d H:i:s');

	if(strcmp($stats,'FALSE')==0){
	ECHO "MASUK	";
	$data = array( 
    'logged_in'	=> $stats , 
    't_logout'=>  $now
	);
	$this->db->where('id_user', $id_user);
	$this->db->update('user', $data);
	}
	else{
	$data = array( 
    'logged_in'	=> $stats , 
    't_login'=>  $now
	);
	$this->db->where('id_user', $id_user);
	$this->db->update('user', $data);
		}
	}

	public function jmlkonten()
	{
		$query = $this->db->get('konten');
		return $query->num_rows();
	}

	public function jml_online()
	{
		$this->db->where('logged_in', TRUE);
		$query = $this->db->get('user');
		return $query->num_rows();
	}


	function update_counter($slug) {
// return current article views 
    $this->db->where('idkonten', urldecode($slug));
    $count = $this->db->get('konten')->row();
// then increase by one 
    $this->db->where('idkonten', urldecode($slug));
    $this->db->set('pengunjung', ($count->pengunjung + 1));
    $this->db->update('konten');
	}

	function update_vote($slug) {
// return current article views 
    $this->db->where('idkonten', urldecode($slug));
    $count = $this->db->get('konten')->row();
// then increase by one 
    $this->db->where('idkonten', urldecode($slug));
    $this->db->set('vote', ($count->vote + 1));
    $this->db->update('konten');
	}

	public function counter_komentar($id) {
	$this->db->where('idkonten', $id);
	$count = $this->db->get('konten')->row();
	 $this->db->where('idkonten', $id);
    $this->db->set('jml_komentar', ($count->jml_komentar + 1));
    $this->db->update('konten');
	}

	public function update_komentar($idkomen) {
	$data = array( 
    'solved'	=> 'Y' 
	);
	$this->db->where('id_komentar', $idkomen);
	$this->db->update('komentar', $data);
	}

	public function hapus_komen($idkomen) {
	$this->db->delete('komentar', ['id_komentar' => $idkomen]);
	}

	public function jml_user()
	{
		$query = $this->db->get('user');
		return $query->num_rows();
	}

	public function get_komentar(){
		$this->db->order_by("id_komentar", "desc");
		$query = $this->db->get('komentar');
		return $query->result();
	}


	public function get_diskusiteratas(){
		$this->db->order_by("jml_komentar", "desc");
			$this->db->limit(5);  
		$query = $this->db->get('konten');
		return $query->result();
	}

	public function get_jmlkomentarkonten($kontenid){
		$this->db->where('id_konten', $kontenid);
		$query = $this->db->get('komentar');
		return $query->num_rows();
	}

	// public function get_kategori()
	// {
	// 	$query = $this->db->get('kategori');
	// 	return $query->result();
	// }

	public function get_detailkonten($kontenid)
	{
		$this->db->where('idkonten', $kontenid);
		$query = $this->db->get('konten');
		return $query->row();
	}

	public function del_konten($idkonten)
	{
		$this->db->delete('konten', ['idkonten' => $idkonten]);
		
	}


	public function get_komentarkonten($kontenid)
	{
		$this->db->order_by("id_komentar", "desc");
		$this->db->where('id_konten', $kontenid);
		$query = $this->db->get('komentar');
		return $query->result();
	}
	
	
	public function get_tipe()
	{
		$query = $this->db->get('tipe');
		return $query->result();
	}


	public function tambah_konten()
	{
		$now = date('Y-m-d H:i:s');
		$data = [
					'idkonten' => $this->input->post('id_konten'),
					'judul' => $this->input->post('judul'),
					'tipe' => $this->input->post('tipe'),
					'deskripsi' => $this->input->post('deskripsi'),
					'pembuat' => $this->input->post('pembuat'),
					'tgl_dibuat' => $now,
					'post' => $this->input->post('post'),
					'tag' => $this->input->post('blog_tags')
				];

		$this->db->insert('konten', $data);
	}

	public function update_konten()
	{
		$now = date('Y-m-d H:i:s');
		$data = array( 
					'judul' => $this->input->post('judul'),
					'tipe' => $this->input->post('tipe'),
					'deskripsi' => $this->input->post('deskripsi'),
					'pembuat' => $this->input->post('pembuat'),
					'tgl_dibuat' => $now,
					'post' => $this->input->post('post'),
					'tag' => $this->input->post('blog_tags')
				);
	
		$this->db->where('idkonten',$this->input->post('id_konten'));
		$this->db->update('konten', $data);
	}

	// public function update_member($id)
	// {
	// 	$password=base64_encode($this->input->post('confirm_password'));
	// 	$data = array( 
	// 				'usn' => $this->input->post('usn'),
	// 				'pass' => $password,
	// 				'nama' => $this->input->post('nama'),
	// 				'email' => $this->input->post('email'),
	// 				'bio' => $this->input->post('bio'),
	// 				'level' => $this->input->post('level')
	// 			);
	// 	$this->db->where('id_user',$id);
	// 	$this->db->update('user', $data);
	// }


	public function update_akun($usn)
	{
		$password=base64_encode($this->input->post('pass'));
		$data = array( 
					'usn' => $this->input->post('usn'),
					'level' => $this->input->post('level'),
					'pass' => $password,
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'bio' => $this->input->post('bio'),
				);
		$this->db->where('usn',$usn);
		$this->db->update('user', $data);
	}

	public function tambah_user()
	{
		$password=base64_encode($this->input->post('confirm_password'));
		$now = date('Y-m-d H:i:s');
		$data = [
					'level' => $this->input->post('level'),
					'usn' => $this->input->post('usn'),
					'pass' => $password,
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'bio' => $this->input->post('bio'),
					'logged_in' => "FALSE",
					'tgl_terdaftar' => $now
				];
		$this->db->insert('user', $data);
	}

	public function get_search($key)
	{
	  $match = $key;
	  $this->db->like('judul',$match);
	  $this->db->or_like('deskripsi',$match);
	  $this->db->or_like('tag',$match);
	  $this->db->or_like('pembuat',$match);
	  $query = $this->db->get('konten');
	  return $query->result();
	}
	
	public function get_searchtag($match)
	{
	  $this->db->like('tag',$match);
	  $this->db->or_like('tipe',$match);
	  $this->db->or_like('pembuat',$match);
	  $query = $this->db->get('konten');
	  return $query->result();
	}

	public function tambah_komentar($idk)
	{
		$now = date('Y-m-d H:i:s');
		$data = [
					'id_konten' => $idk,
					'nama' => $this->input->post('nama'),
					'isi_komentar' => $this->input->post('isikomentar'),
					'tanggal' => $now
				];

		$this->db->insert('komentar', $data);
	}

	// public function edit_mobil($id)
	// {
	// 	$query = $this->db->get_where('mobil', ['kdmobil' => $id]);
	// 	return $query->row();
	// }

	// public function update_mobil()
	// {
	// 	$kondisi = ['kdmobil' => $this->input->post('kdmobil')];
		
	// 	$data = [
	// 				'jenis' => $this->input->post('jenis'),
	// 				'tahun' => $this->input->post('tahun'),
	// 				'harga' => $this->input->post('harga'),
	// 				'nopol' => $this->input->post('nopol'),
	// 			];

	// 	$this->db->update('mobil', $data, $kondisi);
	// }

	// public function hapus_mobil($id)
	// {
	// 	$this->db->delete('mobil', ['kdmobil' => $id]);
	// }
}

?>