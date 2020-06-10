<?php
class CustomerModel extends CI_Model
{
    function __construct()
    {	parent::__construct();
		$this->load->database();
    }
function get_all_titles() 
	{	$this->db->select("productCode,"
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
public function CustomerProductdrilldown($productCode)
	{	$this->db->select("productCode ,"."productName,"
                . "productDescription,"
                . "buyPrice," . "image," . "productVendor," . "productScale");
        $this->db->from('products');
        $this->db->where('productCode', $productCode);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function addtoCart($item)
    {
//        $this->db->select("productName,"."buyPrice");
//        $this->db->from('products');
//        $this->db->where('productCode',$productCode);
//       $query = $this->db->get();
       
        $this->db->insert('cart',$item);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
        
        
    }
	public function removefromcart($productCode,$item)
	{
		$customerName=$item['customerName'];
		
		$sql="SELECT * FROM cart WHERE productCode=? AND customerName=?";
		$test=$this->db->query($sql,array($productCode,$customerName));
		if($test->num_rows() > 0)
		{
			foreach ($test->result() as $row)
			{
			$quantity=$row->quantity;	
			
			
			}
			$quantity=$quantity-1;
			$this->db->set('quantity',$quantity);
			  $this->db->where('productCode',$productCode);
			  $this->db->update('cart');
		}
		if($quantity<=0)
		{
			
		}
	}
   public function getdata($productCode,$item)
   {
	   $customerName=$item['customerName'];
	  /*  $this->db->select("quantity,"."customerName");
        $this->db->from('cart');
        $this->db->where('productCode',$productCode);
        $query=$this->db->get(); */
		$sql="SELECT * FROM cart WHERE productCode=? AND customerName=?";
		$test=$this->db->query($sql,array($productCode,$customerName));
		//print_r($test->num_rows());
		if($test->num_rows() > 0)
		{
			foreach ($test->result() as $row){
		$quantity=$row->quantity;	
			  $quantity=$quantity+1;
		      $this->db->set('quantity',$quantity);
			  $this->db->where('productCode',$productCode);
			  $this->db->where('customerName',$customerName);
			  $this->db->update('cart');
		}
		}
		else{
		$this->db->select("productName,"."buyPrice");
        $this->db->from('products');
        $this->db->where('productCode',$productCode);
       $query = $this->db->get();
     //  print_r($query->result());
        foreach ($query->result() as $row)
{
         $item['productName']=$row->productName;
         $item['buyPrice']=$row->buyPrice;
         $item['quantity']=1;
         $item['productCode']=$productCode;
}
///print_r($item);
        $this->CustomerModel->addtoCart($item);
		}
        //return $query->result();
      
   }
    
    
    
    public function ViewCart($productCode)
    {
       $this->db->select("productName,"."buyPrice,"."productCode");
        $this->db->from('products');
        $this->db->where('productCode',$productCode);
        $query=$this->db->get();
        
        $this->db->select("quantity,"."productName,"."buyPrice,"."productCode");
        $this->db->from('cart');
        $this->db->where('productCode',$productCode);
        $query=$this->db->get();
//        
        
        return $query->result();
    }
     public function ViewcustomerCart($data)
    {
	//print_r($data);
	$customerName=$data['customerName'];
	print($customerName);
// 	$this->db->select("productName,"."buyPrice,"."productCode");
  //      $this->db->from('products');
    //    $this->db->where('customerName',$customerName);
      //  $query=$this->db->get();
        
        $this->db->select("quantity,"."productName,"."buyPrice,"."productCode");
        $this->db->from('cart');
        $this->db->where('customerName',$customerName);
        $query=$this->db->get();
//        
        
        return $query->result();
    }
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//   public function updateProduct($productobj,$productCode)
//	{
//        $this->db->where('productCode',$productCode);
//       return $this->db->update('products',$productobj);
//        
//      // return $this->db->query("UPDATE `products` SET `buyPrice`=$product WHERE `productCode`='$productCode'");
//        
////	$this->db->where('productCode', $productCode);
////              return  $this->db->update('products', $productName);
//                 
//	}
//public function editdata($productCode)
//	{	$this->db->select("productCode,"."productName,"
//                . "productDescription,"
//                . "buyPrice,"."productVendor"); 
//		$this->db->from('products');
//		$this->db->where('productCode',$productCode);
//		$query = $this->db->get();
//		return $query->result();
//    }
//    public function getorderdata()
//    {
//        $this->db->select('*');
//        $this->db->from('orders');
//        $this->db->where('status!="Shipped"');
//        $this->db->order_by('orderDate DESC');
//        $this->db->limit(10);
//        $query=$this->db->get();
//        return $query->result();
//    }
    
    
