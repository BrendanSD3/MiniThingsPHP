<?php
	$this->load->view('Customer/CustomerHeader'); 
	$this->load->helper('url');
       $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>


<table cellpadding="10" cellspacing="1" id="myTable">
           
               <tr class="header">
                    <th style="text-align: left;"><strong>Name</strong></th>
                    <th style="text-align: left;"><strong>Code</strong></th>
                    <th style="text-align: right;"><strong>Quantity</strong></th>
                    <th style="text-align: right;"><strong>Price</strong></th>
                    <!--<th style="text-align: center;"><strong>Action</strong></th>-->
                </tr>	
<?php
    foreach ($item_data as $row) {
        ?>
				<tr>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px solid;"><strong><?php echo $row->productName; ?></strong></td>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px solid;"><?php echo $row->productCode; ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid;"><?php echo $row->quantity;  ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid;"><?php echo $row->buyPrice; ?></td>
<!--                    <td
                        style="text-align: center; border-bottom: #F0F0F0 1px solid;"><a href="index.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img src="icon-delete.png" alt="icon-delete" title="Remove Item" /></a></td>-->
                </tr>
    <?php }?>
        </table>	

    <?php
	$this->load->view('footer'); 
?>
