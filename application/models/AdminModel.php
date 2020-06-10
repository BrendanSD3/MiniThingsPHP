<?php
class AdminModel extends CI_Model
{
    function __construct()
    {	parent::__construct();
		$this->load->database();
    }
function get_all_titles($limit,$offset) 
    {
    $this->db->limit($limit,$offset);
    $this->db->select("productCode,"
                ."productName,"
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
public function AdminProductdrilldown($productCode)
	{	$this->db->select("*"); 
		$this->db->from('products');
		$this->db->where('productCode',$productCode);
		$query = $this->db->get();
		return $query->result();
    }
   public function updateProduct($productobj,$productCode)
	{
        $this->db->where('productCode',$productCode);
       return $this->db->update('products',$productobj);
        
      // return $this->db->query("UPDATE `products` SET `buyPrice`=$product WHERE `productCode`='$productCode'");
        
//	$this->db->where('productCode', $productCode);
//              return  $this->db->update('products', $productName);
                 
	}
public function editdata($productCode)
	{	$this->db->select("productCode,"."productName,"
                . "productDescription,"
                . "buyPrice,"."productVendor"); 
		$this->db->from('products');
		$this->db->where('productCode',$productCode);
		$query = $this->db->get();
		return $query->result();
    }
    public function getorderdata($limit,$offset)
    {
        $this->db->limit($limit,$offset);
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('status!="Shipped"');
        $this->db->order_by('orderDate DESC');
        $this->db->limit(10);
        $query=$this->db->get();
        return $query->result();
    }
    function record_count()
    {
        return $this->db->count_all('products');
        
        
    }
    function countorders()
    {
        $this->db->count('(*)');
        $this->db->from('orders');
        $this->db->where('status!="Shipped"');
        $this->db->order_by('orderDate DESC');
        $query=$this->db->get();
       return $this->$query->num_rows;
        
    }
    
}