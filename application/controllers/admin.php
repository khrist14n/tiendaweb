<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public $menus=array();
	public $vars=array();
	public function __construct(){
		parent::__construct();
		$this->load->library("twiggy");
		$this->menus=array(
				"categorias"=>"false",
				"subcategorias"=>"false",
				"productos"=>"false",
				"ofertas"=>"false",
				"detalles"=>"false",
				"imagenes"=>"false",
				"administradores"=>"false",
				"usuarios"=>"false"
		);
		$this->vars=array(
				"title"=>"Admin",
				"base_url"=>base_url(),
				"logo"=>"Bizz Peru SAC"
		);
	}
	public function index()
	{
		$this->menus['categorias']='false';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function categorias()
	{
		$this->menus['categorias']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/categorias");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function subcategorias()
	{
		$this->menus['subcategorias']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/subcategorias");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function productos()
	{
		$this->menus['productos']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/productos");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function ofertas()
	{
		$this->menus['ofertas']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/ofertas");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function detalles()
	{
		$this->menus['detalles']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/detalles");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	}
	public function imagenes()
	{
		$this->menus['imagenes']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/imagenes");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
		
	}
	public function administradores()
	{
		$this->menus['administradores']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/administradores");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	
	}
	public function usuarios()
	{
		$this->menus['usuarios']='true';
		foreach ($this->menus as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		foreach ($this->vars as $i=>$j){
			$this->twiggy->set($i,$j,TRUE);
		}
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Admin");
		$this->twiggy->title()->prepend("Admin");
		$this->twiggy->theme("admin");
		$this->twiggy->template("admin/usuarios");
		$this->twiggy->register_function("base_url");
		$this->twiggy->display();
	
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */