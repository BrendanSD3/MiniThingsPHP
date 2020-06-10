<?php
	$this->load->view('header'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>
<style>

</style>


<?php foreach ($view_data as $row) { ?>


<div class="card">
    <h2 style="text-align:center"><?php echo $row->productName ?></h2>
<?php echo '<img id="img" img src='. $img_base.'products/'.$row->image.'>';?>
<h2><b><u>Description:</b></u></h2><p><?php echo $row->productDescription ?></p>
<h2><b><u>Product Vendor:</b></u></h2><p><?php echo $row->productVendor ?></p>
<h2><b><u>Product Scale:</b></u></h2><p><?php echo $row->productScale ?></p>

<h2><b><u>Price: </b></u><?php echo '&euro;'.$row->buyPrice ?></h2>
  <p><button>Add to Cart</button></p>
    <?php } ?>
</div>

<?php
	$this->load->view('footer'); 
?>