<form action="<?php echo base_url(); ?>index.php/adminPanel/proSave" method="post" enctype="multipart/form-data">
<h2 style="border-bottom:1px solid #717171;color: #1F77B6;font-family: Times New Roman;font-size: 17px;">Add Products</h2>
<table border="0" width="100%">
<?php foreach($titles as $key => $title) { ?>
	<tr>
		<td class="tableTdClass"><?php echo $title; ?></td>
        <?php if($key=='image'){?>
        <td class="tableTdClass"><input type="file" name="proImage"/></td>
        <?php  } else { ?>
       
		<td class="tableTdClass"><?php echo $fields[$key]; ?></td>
         <?php } ?>
	</tr>
<?php } ?>
</table>

<p>
	<input type="submit" name="upload" value="Save" style="background-color:#54A8D7;color: white;height: 30px;margin-left: 250px;
    text-align: center;width: 84px; cursor:pointer;">
</p>

</form>