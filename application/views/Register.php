<?php
	$this->load->view('header'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>
<!--method="post" action="index.php?pageID=process_registration"-->
<h2 class="header">Register</h2>
<form id="RegForm" method="post" action="Register">

<div class="myform-group">
    
<label for="username">User Name</label><input required type="text" class="form-control" id="UserName" name="UserName" pattern="[a-zA-Z0-9óáéí']{1,20}" title="username (up to 20 Characters)">
<label for="FirstName">First Name</label><input required type="text" class="form-control" id="FirstName" name="FirstName" pattern="[a-zA-Z0-9óáéí']{1,48}" title="First Name (up to 20 Characters)">
<label for="LastName">Last Name</label><input required type="text" class="form-control" id="LastName" name="LastName" pattern="[a-zA-Z0-9óáéí']{1,20}" title="Last Name (up to 20 Characters)" >
<label for="Pass1">Password</label><input required type="password" class="form-control" id="Pass1" name="Pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
<label for="Pass2">Re-enter Password</label><input required type="password" class="form-control" id="Pass2" name="Pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match the above password exactly">


</div>
<button type="submit" class="btn" name="register_btn">Register</button>
<p>Already a member? <a href="LoginAdmin">Sign in</a></p>
</form>








<?php
	$this->load->view('footer'); 
?>

