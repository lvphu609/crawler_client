<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        // $this->load->library('cimongo/cimongo');
        // $this->load->model('home');
    }

    public function index(){
    	$this->load->view('pages/home');
    }
}