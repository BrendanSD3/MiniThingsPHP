<?php
	$this->load->view('Admin/AdminHeader'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
</br></br></br>
<h2>Welcome <i><?=$username;?></i></h2>

</br></br></br>

<?php
	$this->load->view('footer'); 
?>