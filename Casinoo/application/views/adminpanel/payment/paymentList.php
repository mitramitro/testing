<h2 style="border-bottom:1px solid #717171;color: #1F77B6;font-family: Times New Roman;font-size: 17px; margin-bottom:20px; ">Payment List</h2>

<table border="0" width="100%">

	<tr>
<?php foreach($titles as $k=>$title) { ?>
        <?php if($k=='id'){ ?>
        <td style="color: #4D4D4D;font-family: small-caption;font-size: 15px;width:50px;"><?php echo $title; ?></td>
        <?php }else{?>
		<td style="color: #4D4D4D;font-family: small-caption;font-size: 15px;width:100px;"><?php echo $title; ?></td>
<?php } } ?>
	</tr>

<?php foreach($fields as $k=>$row) { ?>
<?php 	foreach($row as $key=>$field) { 
             if($key=='image'){ ?>
                <td><img src="<?php echo image_Pro().$field; ?>" width="50" height="50" /></td>
			 <?php } else if($key=='pid'){ ?> 
			    <td><?php echo $proName[$k]; ?></td>
			 <?php } else { ?>
	         	<td><?php echo $field; ?></td>
<?php 	}  }?>
	</tr>
<?php } ?>

</table>

<?php if ($pages_count > 1) { ?>
<div style="float:left;margin-top: 20px;width: 300px;">
	<?php for($i=1;$i<=$pages_count;$i++) { ?>
		<?php	echo "<div style='border: 1px solid #CAC9C9;color: #292929;font-size: 13px; padding: 4px 7px;
    text-decoration: none;width:8px; background-color:#84B8E3;float:left;'>".anchor($controller.'/productList/'.$i, $i)."</div>"; ?>
	<?php } ?>
</div>
<?php } ?>

