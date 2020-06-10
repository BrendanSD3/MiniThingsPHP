<?php
	$this->load->view('Customer/CustomerHeader'); 
	$this->load->helper('url');
       $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>


<div class='tableheader'>
<h2>Welcome <i><?=$customerName;?></i></h2>

</div>

    <?php
	$this->load->view('footer'); 
?>