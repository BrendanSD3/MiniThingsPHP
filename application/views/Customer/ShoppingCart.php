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
<?php $count=0;
    foreach ($item_data as $row) {
        ?>
				<tr>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px solid;"><strong><?php echo $row->productName; ?></strong></td>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px solid;"><?php echo $row->productCode; ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid;"><a href="<?php echo $base.'/CustomerController/RemoveFromCart/'.$row->productCode;?>"><span class="glyphicon glyphicon-minus"></span></a> &nbsp;<?php echo $row->quantity;  ?> &nbsp; <a href="<?php echo $base.'/CustomerController/addtoCart/'.$row->productCode;?>"><span class="glyphicon glyphicon-plus"></a></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid;"><?php echo '&euro;'.$row->buyPrice; $count+=$row->buyPrice *$row->quantity; ?></td>

                  
                </tr>
        <?php }?>
        <?php if($count>0){ ?>
                <tr>
                <td style="text-align: right; border-bottom: #F0F0F0 1px solid;"></td>
                <td style="text-align: right; border-bottom: #F0F0F0 1px solid;"></td>
                <td style="text-align: right; border-bottom: #F0F0F0 1px solid;"><strong>Total:</strong></td>
                    <td style="text-align: right; border-bottom: #F0F0F0 1px solid;"><strong><?php echo '&euro;'.$count; ?> </strong></td>
                </tr>
        <?php }else { ?>
                <tr>
                <td style="text-align: right; border-bottom: #F0F0F0 1px solid;">No Items in Cart </td>
                </tr>
            <?php  } ?>
        </table>	

    <?php
	$this->load->view('footer'); 
?>
