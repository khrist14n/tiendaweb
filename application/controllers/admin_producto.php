<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library("twiggy");
		$this->load->model("productoModel");
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
	public function combo(){
	$id=trim($this->input->get_post("id"));
		if(strlen($id)>0){
			$data=$this->productoModel->getAllBySubcategoria($id);
		}else{
			$data=$this->productoModel->getAll();
		}
		$json=array("success"=>"true","data"=>$data);
		$this->output->
		set_header("Access-Control-Allow-Origin:*")->
		set_header("Access-Control-Allow-Methods:POST,GET,OPTIONS")->
		set_header("Access-Control-Allow-Headers:X-Requested-With")->
		set_header("Access-Control-Max-Age:86400")->
		set_content_type("application/json")->
		set_output(json_encode($json));
	}
	public function save(){
		$json=array("success"=>"false","error"=>"No se pudo guardar");
		$data=array(
				"subcategoria_id"=>trim($this->input->get_post("subcategoria_id")),
				"nombre"=>trim($this->input->get_post("nombre")),
				"descripcion"=>trim($this->input->get_post("descripcion")),
				"imagen_id"=>trim($this->input->get_post("imagen_id")),
				"deleted"=>0,
				"created"=>date("y-m-d"),
				"modified"=>date("y-m-d")
		);
		$flag=true;
		foreach($data as $i=>$j){
			if(strlen($j)==0){
				$flag=false;
			}
		}
		if($flag==true){
			try{
				$id=trim($this->input->get_post("id"));
			}catch(Exception $ex){
				$id='';
			}
			$num=0;
			if($id!=false && strlen($id)>0 && isset($id)==true){
				$num=intval($this->productoModel->update($id,$data));
			}else{
				$id=intval($this->productoModel->create($data));
			}
			if($num>0 || $id>0){
				$json=array("success"=>"true","id"=>$id,"message"=>"Datos Guardados");
			}
		}else{
			$json=array("success"=>"false","error"=>"Faltan datos");
		}
		$this->output->
		set_header("Access-Control-Allow-Origin:*")->
		set_header("Access-Control-Allow-Methods:POST,GET,OPTIONS")->
		set_header("Access-Control-Allow-Headers:X-Requested-With")->
		set_header("Access-Control-Max-Age:86400")->
		set_content_type("application/json")->
		set_output(json_encode($json));
	}
}

/* End of file admin_producto.php */
/* Location: ./application/controllers/admin_producto.php */