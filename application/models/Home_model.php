<?php

class Home_model extends CI_Model {  
  	function __construct() 
  	{
    	parent::__construct();
    	$this->load->library('cimongo/cimongo');
  	}


	public function getProduct($page, $numberPerPage, $filter){
	  	$query = $this->cimongo->get_where("product",array(),$numberPerPage,$page);
		return $query->result_array();
	}

	public function countAllProducts($filter){
		if(trim($filter) == ""){
			$num = $this->cimongo->count_all('product');
			return $num;
		}
		else{
			/*$query = $this->cimongo->get('category');
			$query = $query->like('name',array('$gt' => 'abc'));*/
			$query = $this->cimongo->where(array("name"=>"/^c/^"))->get("product");
			return count($query);
		}
	}
}