<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegularController extends CI_Controller {

   

    public function __construct(){
		parent::__construct();
		$this->load->model('RegularModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	
        $this->load->library('session');
    }
	public function index()
	{	$this->load->view('Index');
	}
     
        
        public function ProductList()
        {
            $data['Product_info']=$this->RegularModel->get_all_titles();
		$this->load->view('ProductListView',$data);
        }
        public function ProductDrilldown($productCode)
    {	$data['view_data']= $this->RegularModel->Productdrilldown($productCode);
		$this->load->view('DrillDownView', $data);
    }
	
///////////////////////////////////////CUSTOMER///////////////////////////////////////////////
       public function LoginCust() {

        $this->load->view('LoginCust');
    }
   //sessions 2018
	//successfully logged in so display home page
	public function CustomerHome() {
        //if the user is logged in
        if ($this->session->userdata('logged_in')) {
            //get the session data
            $session_data = $this->session->userdata('logged_in');
            //get the username from the session and put it in $data
            $data['customerName'] = $session_data['customerName'];
            $this->load->view('Customer/CustomerHome', $data);
        } else {
            //if no session, redirect to login page
            $this->load->view('LoginCust');
        }
    }

    //sessions 2018
    public function verify_logincust() {
        //set the validation rules for the login form
        //This code ensures that both the username and password
        //	are trimed of extra spaces at the beginning and end and	are required fields
        //The check_database function is also called
        //callback_ allows you to write your own form validation code
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_databasecust');

        if ($this->form_validation->run() == false) {
            //validation failed -> display login form
            $this->load->view('LoginCust');
        } else {
            //validation passed (inc a call to check_database() via a callback) -> display secret content
            redirect('CustomerController/CustomerHome');
        }
    }

    //sessions 2018
    //my callback function to validate the users credentials
    public function check_databasecust($password) {
        //only get here if form validation succeeded. now validate the users details against the DB
        $email = $this->input->post('email');
        //query the DB
        $result = $this->RegularModel->logincust($email, $password);
        //if a valid user write their id & name to session data
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'customerNumber' => $row->customerNumber,
                    'email' => $row->email,
                        'customerName'=>$row->customerName
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            //return true -> we have a valid user
            return true;
        } else {
            //return false ->we have an invalid user
            $this->form_validation->set_message('check_databasecust', '<p id="errors">Invalid email or password</p>');
            return false;
        }
    }

    //sessions 2018
    public function logoutcust() {
        //unset the session data
        $this->session->unset_userdata('logged_in');
        //destroy the session
        $this->session->sess_destroy();
        //load the login page
        $this->load->view('LoginCust');
    }

    public function CustRegister() {
        $this->load->view('CustomerRegistration');
    }

    public function customerRegister() {
        $user['email']=$this->input->post('email');
        $user['customerName']=$this->input->post('customerName');
        $user['contactFirstName']=$this->input->post('contactFirstName');
        $user['contactLastName']=$this->input->post('contactLastName');
        $user['phone']=$this->input->post('phone');
        $user['addressLine1']=$this->input->post('addressLine1');
        $user['addressLine2']=$this->input->post('addressLine2');
        $user['city']=$this->input->post('city');
        $user['state']=$this->input->post('state');
        $user['postalCode']=$this->input->post('postalCode');
        $user['country']=$this->input->post('country');
        $user['creditLimit']=$this->input->post('creditLimit');
       // $user['Pass1']=$this->input->post('Pass1');
        $pass=$this->input->post('Pass1');
        $passw = md5($pass);
        $user['password'] = $passw;  
         if ($this->RegularModel->custregister($user)) {
            
             $this->load->view('RegCompleteView');
        } 
        else {
        $user['email']= '';
        $user['customerName']= '';
        $user['contactFirstName']= '';
        $user['contactLastName']= '';
        $user['phone']= '';
        $user['addressLine1']= '';
        $user['addressLine2']= '';
        $user['city']= '';
        $user['state']= '';
        $user['postalCode']= '';
        $user['country']= '';
        $user['creditLimit']= '';
       
            $this->load->view('CustomerRegistration');
        }
    }
    
//////////////////////////////////////ADMIN///////////////////////////////////////////////       
        
       
    public function Register()
 { 
           // $this->load->view('Register');
        $user['username'] = '';
        $user['FirstName'] = '';
        $user['LastName'] = '';
        $user['password'] = '';

        $user['username'] = $this->input->post('UserName');
        $user['FirstName'] = $this->input->post('FirstName');
        $user['LastName'] = $this->input->post('LastName');
        $pass = $this->input->post('Pass2');
        $passw = md5($pass);
        $user['password'] = $passw;
        //$this->RegularModel->register($username,$fname,$lname,$passw);
        if ($user['username'] == null) {
           // echo "username is null ";
            $this->form_validation->set_message('Invalid username');
            $this->load->view('Register');
            return false;
        }
        print_r($user);
        if ($this->RegularModel->register($user)) {
            $this->load->view('RegCompleteView');
        } else {
            $user['username'] = '';
            $user['FirstName'] = '';
            $user['LastName'] = '';
            $user['password'] = '';
            $this->load->view('Register');
        }
    }
     public function LoginAdmin() {

        $this->load->view('LoginAdmin');
    }

    //sessions 2018
	//successfully logged in so display home page
	 function Home() {
        //if the user is logged in
        if ($this->session->userdata('logged_in')) {
            //get the session data
            $session_data = $this->session->userdata('logged_in');
            //get the username from the session and put it in $data
            $data['username'] = $session_data['username'];
             $data['order_data']=$this->RegularModel->getorderdata();
            $this->load->view('Admin/Home', $data);
        } else {
            //if no session, redirect to login page
            $this->load->view('LoginAdmin');
        }
    }

    //sessions 2018
    public function verify_login() {
        //set the validation rules for the login form
        //This code ensures that both the username and password
        //	are trimed of extra spaces at the beginning and end and	are required fields
        //The check_database function is also called
        //callback_ allows you to write your own form validation code
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == false) {
            //validation failed -> display login form
        //   echo $this->db->last_query(); 
            $this->load->view('LoginAdmin');
        } else {
            //validation passed (inc a call to check_database() via a callback) -> display secret content
          // echo $this->db->last_query(); 
            redirect('AdminController/Home');
        }
    }

    //sessions 2018
    //my callback function to validate the users credentials
    public function check_database($password) {
        //only get here if form validation succeeded. now validate the users details against the DB
        $username = $this->input->post('username');
        //query the DB
        $result = $this->RegularModel->login($username, $password);
        
        //if a valid user write their id & name to session data
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                   // 'ID' => $row->ID,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            //return true -> we have a valid user
            return true;
        } else {
            //return false ->we have an invalid user
            $this->form_validation->set_message('check_database', '<p id="errors">Invalid username or password</p>');
            return false;
        }
    }

    //sessions 2018
    public function logout() {
        //unset the session data
        $this->session->unset_userdata('logged_in');
        //destroy the session
        $this->session->sess_destroy();
        //load the login page
        $this->load->view('LoginAdmin');
    }

}