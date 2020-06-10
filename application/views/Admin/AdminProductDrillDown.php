<?php
	$this->load->view('Admin/AdminHeader'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
       // $img_base=base_url()."AdminController/assets/images/"
?>
<style>
    .Admincard {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);
  max-width: 80%;
  margin: auto;
/*  text-align: center;*/
  font-family: arial;
  /*font-size:15px;*/
  padding:40px;
}

.Admincard h3 u
{
    font-size:25px;
    
    
}
.Admincard p 
{
    font-size:20px;
   
    /*font-family: sans-serif;*/
}
#simg{
    width:20%;
    margin-left:40%
    
}

</style>


<?php foreach ($view_data as $row) { ?>


<div class="Admincard">
    <h2 style="text-align:center"><u><?php echo $row->productName ?></u></h2>
<?php echo '<img id="simg" img src='.$img_base.'products/'.$row->image.'>';?>
<h3><b><u>Description</b></u></h3><p><?php echo $row->productDescription ?></p>
<h3><b><u>Product Vendor</b></u></h3><p><?php echo $row->productVendor ?></p>
<h3><b><u>Product Scale</b></u></h3><p><?php echo $row->productScale ?></p>
<h3><b><u>Quantity in stock </b></u></h3><p><?php echo $row->quantityInStock ?></p>
<h3><b><u>Product Code </b></u></h3><p><?php echo $row->productCode ?></p>
<h3><b><u> Product Line </b></u></h3><p><?php echo $row->productLine ?></p>

<h3><b><u>MSRP </b></u></h3><p><?php echo  '&euro;'. $row->MSRP ?></p>

<h3><b><u>Price: </b></u></h3><p><?php echo '&euro;'.$row->buyPrice ?></p>
<!--  <p><button>Add to Cart</button></p>-->
    <?php } ?>
</div>

<?php
	$this->load->view('footer'); 
?>