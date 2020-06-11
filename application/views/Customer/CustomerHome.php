<?php
	$this->load->view('Customer/CustomerHeader'); 
	$this->load->helper('url');
       $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>


<div class='tableheader'>
<h2>Welcome <i><?=$customerName;?></i></h2>

</div>
<div class='tablecontent'>
	<?php if($count>0){?>
<h2 style="text-align:center;">You have <?=$count;?> items in your cart!</h2>
	<?php } else{?>
		<h2 style="text-align:center;">You have <?=$count;?> items in your cart add some items to cart <a href=<?php echo"'$base./CustomerController/CustProductList'";?>>View Products</a></h2>
	<?php } ?>
</div>
    <?php
	$this->load->view('footer'); 
?>