<?php
	$this->load->view('Admin/AdminHeader'); 
	$this->load->helper('url');
        $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        //$cssbase = base_url()."assets/css/";
?>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
<style>
 
</style>
<title>ProductList</title>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Products by Name.." title="Type in a name">
<div class="list">
	<br><br>
        
<!--	<h1 class="main">List of Products</h1>-->
	

	<table id="myTable"> 
		<tr class="header">
			<th>Product Code </th>
                        <th>Product Name</th>
			<th>Type</th>
<!--			<th>Product Scale</th>
			<th>Product Vendor</th>-->
<!--                        <th>Product Description</th>-->
			<th>Stock</th>
                        <th>Price</th>
                        <th>Regular Price</th>
                        <th>Image </th>
                        <th colspan="2">Actions</th>
		</tr>

		<?php foreach($Product_info as $row){?>
		<tr>
                        <td><?php echo $row->productCode;?></td>
                        <td><?php echo $row->productName;?></td>
                        <td><?php echo $row->productLine;?> </td>
			
                        <td><?php echo $row->quantityInStock;?></td>
                        <td><?php echo '&euro;'.$row->buyPrice;?></td>
                        <td><?php echo '&euro;'.$row->MSRP;?></td>
                        
			
                        <td> <a href="<?php echo $base.'/AdminController/AdminProductDrilldown/'.$row->productCode;?> "> <img src="<?php echo $img_base.'thumbs/'.$row->image  ;?>" /> </a> </td>    
                        <td><?php echo anchor('AdminController/editProduct/'.$row->productCode, 'Update'); ?> </td>
                        <td><?php echo "Edit";?></td>
                
                </tr> 
		<?php }?>  
   </table>
</div>

<div class="center">
<div class="pagination">
    
<?php
$config['cur_tag_open'] = '<a class="active">';
                $config['cur_tag_close'] = '</a>';
               $this->pagination->initialize($config);
              
    echo $this->pagination->create_links();?>
</div>
</div>
   <br><br>
<?php
	$this->load->view('footer'); 
?>
