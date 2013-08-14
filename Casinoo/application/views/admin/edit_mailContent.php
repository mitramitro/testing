<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftPanel'); ?><head>

<style>
.whole-pennel-pass {border: 1px solid #CCCCCC;float: left;margin-top:12px;padding: 10px;width:785px;
}
#UserManage
{background: none repeat scroll 0 0 #0771A5;color: white;font-family: Verdana;font-size: 18px;padding: 12px 0 15px 18px;text-align: left;text-decoration: underline;
}
.validationErrorMsg{color:red;height: auto;margin: 0 0 6px 185px;padding: 6px 9px 10px;width: auto;}
</style>
</head>

<div class="whole-pennel-pass">
<div id="UserManage">Register Mail Content</div>


<div class="validationErrorMsg">
 <?php $ckeditor = $editor['ckeditor']; ?>
<?php echo form_open('admincontroller/updateMailContent'); ?>
<?php
echo validation_errors();
?>
</div>
<?php echo form_hidden('id',$content[0]->id); $content[0]->id; ?>
<?php
				
				$cat_desc=array(
									'name'=>'cat_desc',
									'id'=>'entry_body',
									'class'=>'textArea',
									'rows'=>'10',
									'cols'=>'50',
									'value'=>$content[0]->register_content,set_value('cat_desc'),
				
				);	
$this->table->add_row('Mail Content',form_textarea($cat_desc),display_ckeditor($ckeditor));
$this->table->add_row('',form_submit(array('name'=>'submit','value'=>'Update','class'=>'button')));
echo $this->table->generate();
echo form_close(); 
?>
</div>
<?php $this->load->view('admin/include/footer'); ?>