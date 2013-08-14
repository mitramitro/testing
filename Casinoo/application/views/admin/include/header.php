
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php //echo $pg_Name;?></title>
<link href="<?php echo base_url();?>admin/css/admin_style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>admin/css/tinystyle.css" rel="stylesheet" type="text/css" />

<?php //if(isset($pg_Name) && $pg_Name!='Forgot Passsword'){?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>menu/sdmenu/sdmenu.css" />
<script type="text/javascript" src="<?php echo base_url();?>/menu/sdmenu/sdmenu.js"></script>
<script type="text/javascript">
// <![CDATA[
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
// ]]>
</script>
<?php //} ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cat").click(function(){
			alert("sucessfully");
		});
	
	});
	
</script>




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.tokeninput.js"></script>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/token-input-facebook.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/token-input.css" />

<script type="text/javascript">
    $(document).ready(function() {
        
        $("#tokenize2").tokenInput("<?php echo site_url('Newsletter/suggestions'); ?>", {
            classes: {
			
                tokenList: "token-input-list-facebook",
                token: "token-input-token-facebook",
                tokenDelete: "token-input-delete-token-facebook",
                selectedToken: "token-input-selected-token-facebook",
                highlightedToken: "token-input-highlighted-token-facebook",
                dropdown: "token-input-dropdown-facebook",
                dropdownItem: "token-input-dropdown-item-facebook",
                dropdownItem2: "token-input-dropdown-item2-facebook",
                selectedDropdownItem: "token-input-selected-dropdown-item-facebook",
                inputToken: "token-input-input-token-facebook"
            }
        });
    });
    </script>

<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(function() {
		$( "#autocomplete" ).autocomplete({
			
			source: function(request, response) {
				$.ajax({ url: "<?php //echo site_url('Admincontroller/suggestions'); ?>",
				data: { term: $("#autocomplete").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
				//response(data);
				document.getElementById("abc").innerHTML=data;
				}
			});
		},
		minLength: 2
		});
	});
});
</script>-->

</head>

<body>
<!--admin con start here-->
<div id="admin_con">
<!--header strips start here-->
<div id="header_strips">
<h1><?php echo "Casino" //echo SITE_NAME;?></h1></div> 
<!--header strips start here-->
<div class="strips">
<?php //if(isset($pg_Name) && $pg_Name!='Forgot Passsword'){?>

<?php $id=$this->session->userdata('id'); 
if($id== '' && $id== null)
{
	echo "<div class=left_box>Welcome Admin!</div>";
}
else
{
echo "<div class=right_box>".anchor('Admincontroller/logout','Logout')."</div>";
}
?>

<?php //} ?>
</div>
<!--content panel start here-->
<div id="contentpanel">