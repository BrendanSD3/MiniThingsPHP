<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerController extends CI_Controller {

   

    public function __construct(){
		parent::__construct();
		$this->load->model('CustomerModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	
        $this->load->library('session');
    }
	public function index()
	{	$this->load->view('Index');
	}
        public function CustomerHome() {
		//if the user is logged in
		if($this->session->userdata('logged_in')) {
			//get the session data
			$session_data = $this->session->userdata('logged_in');
			//get the username from the session and put it in $data
			$data['customerName'] = $session_data['customerName'];
            //$data['order_data']=$this->AdminModel->getorderdata();
			$this->load->view('Customer/CustomerHome', $data);
		}
		else {
			//if no session, redirect to login page
			$this->load->view('LoginAdmin');
		}
	}
           public function CustProductList()
        {
            $data['Product_info']=$this->CustomerModel->get_all_titles();
		$this->load->view('Customer/CustomerProductView',$data);
        }
        public function CustomerProductDrillDown($productCode)
    {	$data['view_data']= $this->CustomerModel->CustomerProductDrillDown($productCode);
		$this->load->view('Customer/CustomerProductDrillDown', $data);
    }
   public function ViewCart()
   {

	if($this->session->userdata('logged_in')) {
	//get the session data
	$session_data = $this->session->userdata('logged_in');
	//get the username from the session and put it in $data
	$data['customerName'] = $session_data['customerName'];
	$data['item_data']=$this->CustomerModel->ViewcustomerCart($data);
       	$this->load->view('Customer/ShoppingCart',$data);
		}
	}
    
	public function RemoveFromCart($productCode)
    {
       $session_data =$this->session->userdata('logged_in');
        $item['customerName']= $session_data['customerName'];
        
     
        $this->CustomerModel->removefromcart($productCode,$item);
        $data['item_data']=$this->CustomerModel->ViewcustomerCart($item);
        $this->load->view('Customer/ShoppingCart',$data);
        
        
        
    }



    public function addtoCart($productCode)
    {
       $session_data =$this->session->userdata('logged_in');
        $item['customerName']= $session_data['customerName'];
        
     
        $this->CustomerModel->getdata($productCode,$item);
        $data['item_data']=$this->CustomerModel->ViewcustomerCart($item);
        $this->load->view('Customer/ShoppingCart',$data);
        
        
        
    }
     
        
}