<?php
	$this->load->view('header'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>
<?php
 echo "<p>Registration Sucsessfull</p>";
 echo "<p> Remember your Email and password for login</p>";
 
 
?>
<p><a href=<?php echo"'$base./RegularController/LoginCust'";?>><span class="glyphicon glyphicon-log-in"></span>Log-in</a></p>
<?php
	$this->load->view('footer'); 
?>