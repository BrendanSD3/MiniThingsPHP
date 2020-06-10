<?php
	$this->load->view('header'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>

<div class="myform-group">
       <h2 class='loginheader'>LogIn - Customer</h2>
       <div class='logincontent'>
                   <?php 
		echo form_open('RegularController/verify_logincust'); 
		?>
                    
               <label for='email'>email:</label><br>
		<?php 
                echo form_input('email');
                echo "<br><br>";
		?>
               <label for='password'>Password:</label><br>
		<?php
                echo form_password('password');
		
		echo "<br><br>";
                echo validation_errors();
  
		?>
		 <button  class="btn" name="Login_btn" <?php echo form_submit("Login");?> Login </button>
                
    
<!--    <button type="submit" class="btn" name="Login_btn">Log-in</button>-->
<p>Not a member? <a href="CustRegister">Sign up</a></p>
<?php echo form_close();?>
     </div>
</div>
<!--<form id="LoginForm" method="post" action="verify_login">
<div class="myform-group">
    
    <h2>Log-In</h2>
    <label for="username">User Name</label><input required type="text" class="form-control" id="UserName" name="username" pattern="[a-zA-Z0-9óáéí']{1,20}" title="username (up to 20 Characters)">
    <label for="Pass">Password</label><input required type="password" class="form-control" id="Passw" name="Passw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

    </div>
<button type="submit" class="btn" name="Login_btn">Log-in</button>
<p>Not a member? <a href="Register">Sign up</a></p>
</form>-->
<?php
	$this->load->view('footer'); 
?>
