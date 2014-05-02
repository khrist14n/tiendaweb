<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_imagen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library("twiggy");
		$this->load->model("imagenModel");
		$this->load->helper("url");
		$this->load->helper("form");
	}
	public function index()
	{
		$this->twiggy->set("title","Admin",TRUE);
		$this->twiggy->set("base_url",base_url(),TRUE);
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function save()
	{
		$json=array("success"=>"true");
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = 1024*1024;
		$config['max_height']  = 768*1024;

		$this->load->library('upload', $config);
		$this->load->helper('file');

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$json=array("success"=>"false","error"=>$error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$extension=$data['upload_data']['file_ext'];
			$nombre=$data['upload_data']['raw_name'];
			$path=$data['upload_data']['full_path'];
			$dir=$data['upload_data']['file_path'];
			mt_srand(date('s'));
			$md5=md5($nombre.mt_rand());
			$blob=read_file($path);
			$ruta=$dir.$md5;
			write_file($ruta,$blob);
			unlink($path);
			$insert=array(
				"nombre"=>$nombre,
				"extension"=>$extension,
				"data"=>json_encode($data),
				"ruta"=>$ruta,
				"deleted"=>false,
				"modified"=>date("y-m-d"),
				"created"=>date("y-m-d")
			);
			$id=$this->imagenModel->create($insert);
			$json=array("success"=>"true","data"=>$data,"message"=>"Imagen subida correctamente","id"=>$id);
		}
		echo json_encode($json);
	}
}

/* End of file admin_imagen.php */
/* Location: ./application/controllers/admin_imagen.php */