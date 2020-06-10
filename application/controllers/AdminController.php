<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminController extends CI_Controller {

   

    public function __construct(){
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	
        $this->load->library('session');
        $this->load->library('pagination');
    }
	public function index()
	{	$this->load->view('Index');
	}
        public function Home() {
		//if the user is logged in
		if($this->session->userdata('logged_in')) {
			//get the session data
			$session_data = $this->session->userdata('logged_in');
			//get the username from the session and put it in $data
			$data['username'] = $session_data['username'];
                       // $data['order_data']=$this->AdminModel->getorderdata();
                            
//load index/home view with the username included in $data
                         $config['base_url']=site_url('AdminController/Home/');
               $config['total_rows']=$this->AdminModel->record_count();
               $config['per_page']=8;
               $this->pagination->initialize($config);
               $data['order_data']=$this->AdminModel->getorderdata(8,$this->uri->segment(3));
			$this->load->view('Admin/Home', $data);
		}
		else {
			//if no session, redirect to login page
			$this->load->view('LoginAdmin');
		}
	}
           public function AdminProductList()
        {
               $config['base_url']=site_url('AdminController/AdminProductList/');
               $config['total_rows']=$this->AdminModel->record_count();
               $config['per_page']=8;
//               $config['cur_tag_open'] = '<div class="active">';
//               $config['cur_tag_close'] = '</div>';
               $this->pagination->initialize($config);
               $data['Product_info']=$this->AdminModel->get_all_titles(8,$this->uri->segment(3));
		$this->load->view('Admin/AdminProductView',$data);
        }
        public function AdminProductDrillDown($productCode)
    {	$data['view_data']= $this->AdminModel->AdminProductDrillDown($productCode);
		$this->load->view('Admin/AdminProductDrillDown', $data);
    }
        public function editProduct($productCode)
        {
            $data['edit_data']= $this->AdminModel->editdata($productCode);
		$this->load->view('Admin/updateProductView',$data);
            //print_r($data);
            
        }
         public function updateProduct($productCode)
         {
       // $this->form_validation->set_rules('productName', 'productName', 'required');
		$this->form_validation->set_rules('productDescription', 'Description', 'required');
		$this->form_validation->set_rules('buyPrice', 'price ', 'required');	
		$this->form_validation->set_rules('productVendor', 'Vendor', 'required');
//                    
             
             $productobj= array('productName'=>$this->input->post('productName'),
                 'productDescription'=>$this->input->post('productDescription'),
                 'buyPrice'=>$this->input->post('buyPrice'),
                 'productVendor'=>$this->input->post('productVendor')
                );
             if(!$this->form_validation->run())
             {
                 redirect('AdminController/editProduct/'.$productCode);
                 return;
             }
             else{
             $updatedRows= $this->AdminModel->updateProduct($productobj,$productCode);
             if ($updatedRows > 0)
		{	
                    
                    //$data['message'] = "$updatedRows Product has been updated";
                   
                    redirect('AdminController/AdminProductList');
                    }
             
             
                else
		{
                    
                    echo $this->db->last_query();
                    //$data['message'] = "There was an error updating ";
                    
                    //$this->load->view('DisplayMessageView',$data);
                }
//                
                
             }
         }
        
        
}