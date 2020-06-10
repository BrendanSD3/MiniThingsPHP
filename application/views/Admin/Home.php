<?php
	$this->load->view('Admin/AdminHeader'); 
	$this->load->helper('url');
       $base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
        
?>


<div class='tableheader'>
<h2>Welcome <i><?=$username;?></i></h2>

</div>
<div class='tablecontent'>
    <h2>Recent Orders</h2>
   
   <table id='HomeTable' > 
		<tr class="header">
			<th>Order Number </th>
                        <th>Order Date </th>
			<th>Required Date</th>
			<th>Shipped Date</th>
                        <th>status</th>
                        
                </tr>

		<?php    foreach($order_data as $row){?>
		<tr>
                        <td><?php echo $row->orderNumber;?></td>
                        <td><?php echo $row->orderDate;?></td>
                        <td><?php echo $row->requiredDate;?> </td>
			<td><?php echo $row->shippedDate;?> </td>
                        <td><?php echo $row->status;?> </td>
                        
                       </tr> 
                        



 <?php     
   }
   ?>
                       
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


<!--<h3> Home Page</h3>-->

<!--<h3><a href="<?php echo 'logout' ?>">Log out</a></h3>-->
    <?php
	$this->load->view('footer'); 
?>