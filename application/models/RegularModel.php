<?php

class RegularModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_all_titles() {
        $this->db->select("productCode,"
                . "productName,"
                . "productLine,"
                . "productScale,"
                . "productVendor,"
                . "productDescription,"
                . "quantityInStock,"
                . "buyPrice,"
                . "MSRP,"
                . "image");
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result();
    }

    public function Productdrilldown($productCode) {
        $this->db->select("productName,"
                . "productDescription,"
                . "buyPrice," . "image," . "productVendor," . "productScale");
        $this->db->from('products');
        $this->db->where('productCode', $productCode);
        $query = $this->db->get();
        return $query->result();
    }

    public function register($user) {

        $this->db->insert('admins', $user);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
function login($username, $password) {
        $this->db->select('ID, username, password');
        $this->db->from('admins');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this -> db -> limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function custregister($user) {
       $this->db->insert('customers', $user);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function logincust($email, $password) {
        $this->db->select('customerNumber, email, password,customerName');
        $this->db->from('customers');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        //$this -> db -> limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

//public function sortbycategory($productLine)
//{
//                $this->db->select("*"); 
//		$this->db->from('products');
//		$this->db->where('productLine',$productLine);
//		$query = $this->db->get();
//		return $query->result();
//    
//}



    public function getorderdata() {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('status!="Shipped"');
        $this->db->order_by('orderDate DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
}
?>