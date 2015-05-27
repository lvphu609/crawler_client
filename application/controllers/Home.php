<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('home_model');
        $this->load->helper('url');
    }
    /*public function index(){
      $this->products();
    }*/

    public function index(){
    	/*$product = $this->home->getProduct();
    	$this->load->view('pages/home');*/
        $page = 1;
        $paging_limit = $numberPerPage = 12;
        $filter = "";

        if (isset($_GET['page'])) {
          if (!empty($_GET['page']) && $_GET['page'] != "" && $_GET['page'] != null && is_numeric($_GET['page'])) {
            $page = intval($_GET['page']);
          }
        }

        if (isset($_GET['filter'])) {
          if (!empty($_GET['filter']) &&
            $_GET['filter'] != "" &&
            $_GET['filter'] != null &&
            $_GET['filter'] != "null"
          ) {
            $filter = $_GET['filter'];
          }
        }
        
        $this->load->library('paging/crawler_paging');

        $config['base_url'] = base_url('')
          . '?filter=' . $filter. '&';

        $config['total_rows'] = $paging_count = $this->home_model->countAllProducts($filter);
        $config['per_page'] = $paging_limit = $numberPerPage;
        $config['cur_page'] = $page;

        $this->crawler_paging->initialize($config);
        $pagination = $this->crawler_paging->create_links();

 
        $products = $this->home_model->getProduct($page, $numberPerPage, $filter);
        
        $content = array(
            'products' => $products,
            'pagination' => $pagination
        );

        $this->load->view('pages/home',$content);

        /*$this->load->view('templates/header', $page_title);
        $this->load->view('templates/left_menu');
        $this->load->view('templates/container');
        $this->load->view('paging_list_supervisors_view', $content);
        $this->load->view('templates/footer');*/
    }

    public function masonry(){
       $this->load->view('page/masonry');
    }

    public function prod(){
        $no = $this->input->get('no');
        if(!empty($no)){
            $this->load->view('pages/detail');
        }
    }
}