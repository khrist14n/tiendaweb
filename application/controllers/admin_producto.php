<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library("twiggy");
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
}

/* End of file admin_producto.php */
/* Location: ./application/controllers/admin_producto.php */