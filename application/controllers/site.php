<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct() {
        parent::__construct();
        //$this->load->model('user_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$debug = false;
		$data['debug'] = $debug;

        $dataTitle['title'] = 'Bienvenido/a Tótem';
        $dataContent['sedes'] = $this->db->get_where('sede', array('estado' => 1))->result_array() ;


        $data['header'] = $this->load->view('totem/header', $dataTitle );
      	$data['content'] = $this->load->view('totem/index', $dataContent );
        $data['footer'] = $this->load->view('totem/footer', array() );
	}


	public function getTotemsPorSede(){
		$debug = false;
        $data['debug'] = $debug;

        $idSede = $this->uri->segment(3); //idSede
	}

}