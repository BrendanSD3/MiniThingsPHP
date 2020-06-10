<?php
	$this->load->view('Admin/AdminHeader'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<script>

</script>
<h1 class="header"> Update Product </h1>
<div class="myform-group">
<?php 
	foreach ($edit_data as $row) { 
		echo form_open_multipart('AdminController/updateProduct/'.$row->productCode);
		echo '</br></br>';
		
                echo 'Product Code : <br>';
                echo form_input('productCode',$row->productCode,'readonly');
                
                echo '</br></br>Enter product Name : <br>';
		echo form_input('productName', $row->productName);

		echo '</br></br>Product Description : <br>';
		echo form_input('productDescription', $row->productDescription);
//
		echo '</br></br>Enter Buy Price : <br>';
		echo form_input('buyPrice', $row->buyPrice);

		echo '</br></br>Enter product Vendor : <br>';
		echo form_input('productVendor', $row->productVendor);
	
//		echo '</br></br>Select File for Upload :';
//		echo form_upload('userfile');

		echo '</br></br>';
               
		echo form_submit('submitUpdate', "Submit");
		
		
                echo form_close();
                
	}
?>
</div>
<?php
	$this->load->view('footer'); 
?>
