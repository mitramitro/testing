<p>
	<?php	echo anchor($controller.'/list_all', 'Back to list'); ?>
</p>

<form action="<?php echo base_url(); ?>index.php/adminPanel/save" method="post">

<table border="1">
<?php foreach($titles as $key => $title) { ?>
	<tr>
		<td><?php echo $title; ?></td>
		<td><?php echo $fields[$key]; ?></td>
	</tr>
<?php } ?>
</table>

<p>
	<input type="submit" value="Save">
</p>

</form>