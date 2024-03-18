<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_clean;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function dashboard(){
		if (session()->get('level')>0) {  

        echo view('header');
		echo view('menu');
		echo view('dashboard');
        echo view('footer');

	}else{
		return redirect()->to('home/login');
	}
    }

	// public function tes(){
        
    //     echo view('header');
	// 	echo view('menu');
	// 	echo view('tes');
    //     echo view('footer');
    // }

	public function login()
	{
		echo view ('header');
		echo view('login');
		
		
	}
	
    
    public function aksilogin()
	{
		$a=$this->request->getPost('username');
		$d=$this->request->getPost('password');

		$model = new M_clean();
		$where=array(
			'username'=> $a,
			'password'=> $d
		);

		$cek=$model->getWhere('tb_user',$where);
		if ($cek>0) {
			session()->set('id_user',$cek->id_user);
            session()->set('level',$cek->level);
			session()->set('username',$cek->username);
			
			return redirect()->to('Home/dashboard');
		}else{
			return redirect()->to('Home/login');
		}
	}
	
        public function logout()
	{
		session()->destroy();
		return redirect()->to('Home/login');
	}

	public function signup()
	{
		echo view ('header');
		echo view ('signup');
		
	}

    public function aksi_sign()
	{
		$model = new M_clean();
		
		$b= $this->request->getPost('username');
		$c= $this->request->getPost('password');
		$d= $this->request->getPost('email');
		$e= $this->request->getPost('no_hp');

		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

		$isi = array(
			
			'username' => $b,
			'password' => $c,
			'email' => $d,
			'no_hp' => $e,
			'level' => 3
				);

		$model->tambah('tb_user', $isi);
	 	

		return redirect()->to('Home/login');
		
	}

	public function menu_clean(){
		if (session()->get('level')>0) {  

        echo view('header');
		echo view('menu');
		echo view('menu_clean');
        echo view('footer');

	}else{
		return redirect()->to('home/login');
	}
    }

	public function kost(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['kost']=$model->tampil('tb_kost');
        echo view('header');
		echo view('menu');
		echo view('kost',$data);
        echo view('footer');

	}else{
		return redirect()->to('home/login');
	}
    }

	public function rumah(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['rumah']=$model->tampil('tb_rumah');
        echo view('header');
		echo view('menu');
		echo view('rumah',$data);
        echo view('footer');

	}else{
		return redirect()->to('home/login');
	}
    }

	public function kantor(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['kantor']=$model->tampil('tb_kantor');
        echo view('header');
		echo view('menu');
		echo view('kantor',$data);
        echo view('footer');

	}else{
		return redirect()->to('home/login');
	}
    }

	public function data_user(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['erwin']=$model->tampil('tb_user');
        
        echo view('header');
		echo view('menu');
		echo view('data_user',$data);
        echo view('footer');
	
	}else{
		return redirect()->to('home/login');
	}
    }

	public function t_duser()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		echo view ('header');
		echo view('menu');
		echo view('t_duser');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_t_duser()
	{
		$model = new M_clean();
		$a = $this->request->getPost('username');
		$b = $this->request->getPost('password');
		$c = $this->request->getPost('no_hp');
		$d = $this->request->getPost('level');
		$e = $this->request->getPost('email');
		
		$isi = array(

					'username' => $a,
					'password' => $b,
					'no_hp' => $c,
					'level' => $d,
					'email' => $e
					
		);
		
		$model->tambah('tb_user', $isi);
		return redirect()->to('Home/data_user');

	}

	public function e_duser($id)
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_user'=>$id);
		
		$data['satu']=$model->getWhere('tb_user', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('e_duser', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_e_duser()
	{
		$model = new M_clean();
		$a = $this->request->getPost('username');
		$b = $this->request->getPost('password');
		$c = $this->request->getPost('no_hp');
		$d = $this->request->getPost('level');
		$e = $this->request->getPost('email');
		$id = $this->request->getPost('id');
		
		$where = array('id_user'=>$id);

		$isi = array(

					'username' => $a,
					'password' => $b,
					'no_hp' => $c,
					'level' => $d,
					'email' => $e
		);

		$model->edit('tb_user', $isi, $where);
		//  print_r($isi);
		return redirect()->to('home/data_user');

	}

	public function hapus_duser($id){
		$model = new M_clean();
		$where = array('id_user'=>$id);
		$model->hapus('tb_user',$where);
		
		return redirect()->to('Home/data_user');
	}

	public function data_kost(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['erwin']=$model->tampil('tb_kost');
        
        echo view('header');
		echo view('menu');
		echo view('data_kost',$data);
        echo view('footer');
	
	}else{
		return redirect()->to('home/login');
	}
    }

	public function t_dkost()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		echo view ('header');
		echo view('menu');
		echo view('t_dkost');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_t_dkost()
	{
		$model = new M_clean();
		$a = $this->request->getPost('durasi');
		$b = $this->request->getPost('harga');
		
		$isi = array(

					'durasi' => $a,
					'harga' => $b
					
		);
		
		$model->tambah('tb_kost', $isi);
		return redirect()->to('Home/data_kost');

	}

	public function hapus_dkost($id){
		$model = new M_clean();
		$where = array('id_kost'=>$id);
		$model->hapus('tb_kost',$where);
		
		return redirect()->to('Home/data_kost');
	}

	public function e_dkost($id)
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_kost'=>$id);
		
		$data['satu']=$model->getWhere('tb_kost', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('e_dkost', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_e_dkost()
	{
		$model = new M_clean();
		$a = $this->request->getPost('durasi');
		$b = $this->request->getPost('harga');
		$id = $this->request->getPost('id');
		
		$where = array('id_kost'=>$id);

		$isi = array(

					'durasi' => $a,
					'harga' => $b
		);

		$model->edit('tb_kost', $isi, $where);
		//  print_r($isi);
		return redirect()->to('home/data_kost');

	}

	public function data_rumah(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['erwin']=$model->tampil('tb_rumah');
        
        echo view('header');
		echo view('menu');
		echo view('data_rumah',$data);
        echo view('footer');
	
	}else{
		return redirect()->to('home/login');
	}
    }

	public function t_drumah()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		echo view ('header');
		echo view('menu');
		echo view('t_drumah');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_t_drumah()
	{
		$model = new M_clean();
		$a = $this->request->getPost('durasi');
		$b = $this->request->getPost('harga');
		
		$isi = array(

					'durasi' => $a,
					'harga' => $b
					
		);
		
		$model->tambah('tb_rumah', $isi);
		return redirect()->to('Home/data_rumah');

	}

	public function hapus_drumah($id){
		$model = new M_clean();
		$where = array('id_rumah'=>$id);
		$model->hapus('tb_rumah',$where);
		
		return redirect()->to('Home/data_rumah');
	}

	public function e_drumah($id)
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_rumah'=>$id);
		
		$data['satu']=$model->getWhere('tb_rumah', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('e_drumah', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_e_drumah()
	{
		$model = new M_clean();
		$a = $this->request->getPost('durasi');
		$b = $this->request->getPost('harga');
		$id = $this->request->getPost('id');
		
		$where = array('id_rumah'=>$id);

		$isi = array(

					'durasi' => $a,
					'harga' => $b
		);

		$model->edit('tb_rumah', $isi, $where);
		//  print_r($isi);
		return redirect()->to('home/data_rumah');

	}

	public function data_kantor(){
		if (session()->get('level')>0) {
			$model = new M_clean();  
			$data['erwin']=$model->tampil('tb_kantor');
        
        echo view('header');
		echo view('menu');
		echo view('data_kantor',$data);
        echo view('footer');
	
	}else{
		return redirect()->to('home/login');
	}
    }

	public function t_dkantor()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		echo view ('header');
		echo view('menu');
		echo view('t_dkantor');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_t_dkantor()
	{
		$model = new M_clean();
		$a = $this->request->getPost('durasi');
		$b = $this->request->getPost('harga');
		
		$isi = array(

					'durasi' => $a,
					'harga' => $b
					
		);
		
		$model->tambah('tb_kantor', $isi);
		return redirect()->to('Home/data_kantor');

	}

	public function hapus_dkantor($id){
		$model = new M_clean();
		$where = array('id_kantor'=>$id);
		$model->hapus('tb_kantor',$where);
		
		return redirect()->to('Home/data_kantor');
	}

	public function e_dkantor($id)
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_kantor'=>$id);
		
		$data['satu']=$model->getWhere('tb_kantor', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('e_dkantor', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_e_dkantor()
	{
		$model = new M_clean();
		$a = $this->request->getPost('durasi');
		$b = $this->request->getPost('harga');
		$id = $this->request->getPost('id');
		
		$where = array('id_kantor'=>$id);

		$isi = array(

					'durasi' => $a,
					'harga' => $b
		);

		$model->edit('tb_kantor', $isi, $where);
		//  print_r($isi);
		return redirect()->to('home/data_kantor');

	}
	public function pembayaran()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_kost');
		
		$data['satu']=$model->getWhere('tb_kost', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('pembayaran', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_pembayaran_kost()
	{
		$model = new M_clean();
		$id_user = session()->get('id_user');
		$b= $this->request->getPost('durasi');
		$c= $this->request->getPost('harga');
		$d= $this->request->getPost('tgl');
		$e= $this->request->getPost('kota');
		$f= $this->request->getPost('kecamatan');
		$g= $this->request->getPost('alamat');
		$h= $this->request->getPost('waktu');

		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

		$durasi_detik = strtotime($b) - strtotime('00:00:00');

		// Mengonversi waktu mulai menjadi detik
		$start_detik = strtotime($h);
	
		// Menghitung waktu akhir (start + durasi)
		$end_detik = $start_detik + $durasi_detik;
	
		// Mengonversi waktu akhir kembali ke format time
		$end = date('H:i', $end_detik);

		$isi = array(
			
			'id_user' => $id_user,
			'durasi' => $b,
			'total_harga' => $c,
			'tgl' => $d,
			'lokasi' => $e. ", ". $f. ", ". $g ,
			'start' => $h,
			'end' => $end,
			'menu_tempat' => 'kost',
			'create_at'=> date('y,m,d')
				);

		$model->tambah('tb_order', $isi);

		return redirect()->to('Home/menu_clean');

	}
	public function pembayaran_kantor()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_kantor');
		
		$data['satu']=$model->getWhere('tb_kantor', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('pembayaran_kantor', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_pembayaran_kantor()
	{
		$model = new M_clean();
		$id_user = session()->get('id_user');
		$b= $this->request->getPost('durasi');
		$c= $this->request->getPost('harga');
		$d= $this->request->getPost('tgl');
		$e= $this->request->getPost('kota');
		$f= $this->request->getPost('kecamatan');
		$g= $this->request->getPost('alamat');
		$h= $this->request->getPost('waktu');

		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

		$durasi_detik = strtotime($b) - strtotime('00:00:00');

		// Mengonversi waktu mulai menjadi detik
		$start_detik = strtotime($h);
	
		// Menghitung waktu akhir (start + durasi)
		$end_detik = $start_detik + $durasi_detik;
	
		// Mengonversi waktu akhir kembali ke format time
		$end = date('H:i', $end_detik);

		$isi = array(
			
			'id_user' => $id_user,
			'durasi' => $b,
			'total_harga' => $c,
			'tgl' => $d,
			'lokasi' => $e. ", ". $f. ", ". $g ,
			'start' => $h,
			'end' => $end,
			'menu_tempat' => 'kantor',
			'create_at'=> date('y,m,d')
				);

		$model->tambah('tb_order', $isi);

		return redirect()->to('Home/menu_clean');

	}
	public function pembayaran_rumah()
	{
		if (session()->get('level')>0) {
		$model = new M_clean();
		$where=array('id_rumah');
		
		$data['satu']=$model->getWhere('tb_rumah', $where);

		

		echo view ('header');
		echo view ('menu');
		echo view('pembayaran_rumah', $data);
		echo view('footer');
	
    }else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_pembayaran_rumah()
	{
		$model = new M_clean();
		$id_user = session()->get('id_user');
		$b= $this->request->getPost('durasi');
		$c= $this->request->getPost('harga');
		$d= $this->request->getPost('tgl');
		$e= $this->request->getPost('kota');
		$f= $this->request->getPost('kecamatan');
		$g= $this->request->getPost('alamat');
		$h= $this->request->getPost('waktu');

		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

		$durasi_detik = strtotime($b) - strtotime('00:00:00');

		// Mengonversi waktu mulai menjadi detik
		$start_detik = strtotime($h);
	
		// Menghitung waktu akhir (start + durasi)
		$end_detik = $start_detik + $durasi_detik;
	
		// Mengonversi waktu akhir kembali ke format time
		$end = date('H:i', $end_detik);

		$isi = array(
			
			'id_user' => $id_user,
			'durasi' => $b,
			'total_harga' => $c,
			'tgl' => $d,
			'lokasi' => $e. ", ". $f. ", ". $g ,
			'start' => $h,
			'end' => $end,
			'menu_tempat' => 'rumah',
			'create_at'=> date('y,m,d')
				);

		$model->tambah('tb_order', $isi);

		return redirect()->to('Home/menu_clean');

	}
}
