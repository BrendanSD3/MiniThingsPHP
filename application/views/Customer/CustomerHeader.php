<?php 
	$this->load->helper('url'); 
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
	$base = base_url() . index_page();
?>

<!DOCTYPE>
<html>
<head>
  <title>Mini Things</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?php echo $cssbase."style.css"?>" rel="stylesheet" type="text/css" />
<script src="<?php echo $jsbase."common.js"?>"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   ul
   {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
 text-decoration: none;
/*  background-color: turquoise;*/

   }
li {
  float: left;
  
/*  border-right:1px solid #bbb;*/
}


li a:hover {
  background-color: lightgrey;
  text-decoration: none;
  color: black;
}

li a{
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
  </style>
</head>
<body>
 <nav class="my-navbar">
  <div class="container-fluid">
    <div class="navbar-header">

      <img id="navbarimg" style="width:150px; height:100px " src="<?php echo $img_base.'logo.jpg';?>">
    </div>
    <div class="collapse navbar-collapse" >
      <ul class="navlinks">
          <li><a href=<?php echo"'$base./CustomerController/CustomerHome'";?>>Home</a></li>
        <li><a href=<?php echo"'$base./CustomerController/CustProductList'";?>>View Products</a></li>
        
       
       
        <li style="float:right"><a href=<?php echo"'$base./RegularController/logoutcust'";?>><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
       <li><a href=<?php echo"'$base./CustomerController/ViewCart'";?>><span class="glyphicon glyphicon-shopping-cart"></span> cart</a></li>
    
      </ul>

          
     
    </div>
  </div>
</nav>


