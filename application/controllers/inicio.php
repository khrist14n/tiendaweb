<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library("twiggy");
	}
	public function index()
	{
		$this->twiggy->set("title","Testing twig",TRUE);
		$this->twiggy->set("base_url",base_url(),TRUE);
		$this->twiggy->title()->prepend("Inicio");
		$this->twiggy->meta("keywords","tienda,peru,hardware,descuentos,nacional");
		$this->twiggy->meta("description","Tienda peruana de hardware");
		$this->twiggy->display();
	}
}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */