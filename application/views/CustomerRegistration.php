<?php
	$this->load->view('header'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>

<!--method="post" action="index.php?pageID=process_registration"-->
  <h2 class="header">Customer Registration </h2>
<form id="RegForm" method="post" action="customerRegister">

<div class="myform-group">
  
<label for="email">Email </label><input required type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" title="Email (Valid Email)">
<label for="customerName">Name</label><input required type="text" class="form-control" id="customerName" name="customerName" pattern="[a-zA-Z0-9óáéí']{1,48}" title="Full Name (up to 20 Characters)">
<label for="contactFirstName">Contact First Name</label><input required type="text" class="form-control" id="contactFirstName" name="contactFirstName" pattern="[a-zA-Z0-9óáéí']{1,48}" title="First Name (up to 20 Characters)">
<label for="contactLastName">Contact Last Name</label><input required type="text" class="form-control" id="contactLastName" name="contactLastName" pattern="[a-zA-Z0-9óáéí']{1,20}" title="Last Name (up to 20 Characters)" >

<label for="phone">Phone</label><input required type="text" class="form-control" id="Phone" name="phone" pattern="{0,9}" title="phone (up to 20 Characters)" >
<label for="addressLine1">Address Line 1</label><input required type="text" class="form-control" id="addressLine1" name="addressLine1" pattern="[a-zA-Z0-9óáéí']{1,20}" title="Address (up to 20 Characters)" >
<label for="addressLine2">Address Line 2</label><input required type="text" class="form-control" id="addressLine2" name="addressLine2" pattern="[a-zA-Z0-9óáéí']{1,20}" title="Address (up to 20 Characters)" >
<label for="city">City</label><input required type="text" class="form-control" id="city" name="city" pattern="[a-zA-Z0-9óáéí']{1,20}" title="City (up to 20 Characters)" >
<label for="state">State</label><input required type="text" class="form-control" id="state" name="state" pattern="[a-zA-Z0-9óáéí']{1,20}" title="State (up to 20 Characters)" >
<label for="postalCode">Postal Code</label><input required type="text" class="form-control" id="postalCode" name="postalCode" pattern="[a-zA-Z0-9óáéí']{1,20}" title="PostalCode (up to 20 Characters)" >
<label for="country">Country</label><input required type="text" class="form-control" id="country" name="country" pattern="[a-zA-Z0-9óáéí']{1,20}" title="Country (up to 20 Characters)" >
<label for="creditLimit">Credit Limit</label><input required type="number" class="form-control" id="creditLimit" name="creditLimit"  title="CreditLimit (up to 20 Characters)" >



<label for="Pass1">Password</label><input required type="password" class="form-control" id="Pass1" name="Pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
<label for="Pass2">Re-enter Password</label><input required type="password" class="form-control" id="Pass2" name="Pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match the above password exactly">


</div>
<button type="submit" class="btn" name="register_btn">Register</button>
<p>Already a member? <a href="LoginCust">Sign in</a></p>
</form>








<?php
	$this->load->view('footer'); 
?>

<!--<label for="username">User Name</label><input required type="text" class="form-control" id="UserName" name="UserName" pattern="[a-zA-Z0-9óáéí']{1,20}" title="username (up to 20 Characters)">
<label for="FirstName">First Name</label><input required type="text" class="form-control" id="FirstName" name="FirstName" pattern="[a-zA-Z0-9óáéí']{1,48}" title="First Name (up to 20 Characters)">
<label for="LastName">Last Name</label><input required type="text" class="form-control" id="LastName" name="LastName" pattern="[a-zA-Z0-9óáéí']{1,20}" title="Last Name (up to 20 Characters)" >
<label for="Pass1">Password</label><input required type="password" class="form-control" id="Pass1" name="Pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
<label for="Pass2">Re-enter Password</label><input required type="password" class="form-control" id="Pass2" name="Pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match the above password exactly">-->
