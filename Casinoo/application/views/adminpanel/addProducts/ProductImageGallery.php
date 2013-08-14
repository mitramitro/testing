<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('adminPanel/include/header'); ?>    
<?php $this->view('adminPanel/include/leftPanel'); ?><head>
<script>

      checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
      }
  </script>

<script>
function update_Status()
{
	var con=confirm("Are you sure to change status.");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	
}
}
function del_Record()
{
var con=confirm("Are you sure to delete record.");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	
}
}
</script>

<!--Fancybox script starts here--->

<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect: 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
    
<!--Fancybox script ends here---> 


<!--Fancybox style ends here--->

<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>


    <style type="text/css">
        /* --- viewport configuration ---------------------------------------------------------- */
      .viewport {
    border: 3px solid #EEEEEE;
    float: left;
    height: 83px;
    margin: 0 9px 9px 0;
    overflow: hidden;
    padding-left: 22px;
    padding-right: 0;
    padding-top: 20px;
    position: relative;
    width: 82px;
}

        /* This is so that the 2nd thumbnail in each row fits snugly. You will want to add a similar
           class to the last thumbnail in each row to get rid of the margin-right. */
        .no-margin {
            margin-right: 0;
        }

        /* --- Link configuration that contains the image and label ----------------------------- */
        .viewport a {
            display: block;
            position: relative;
        }

        .viewport a img {
           height: 100px;
    left: -20px;
    position: relative;
    top: -20px;
    width: 100px;
        }

        /* --- Label configuration -------------------------------------------------------------- */
        .viewport a span {
            display: none;
            font-size: -1em;   /*font-size: 3.0em;*/
            font-weight: bold;
            height: 100%;
            padding-top: 120px;
            position: absolute;
            text-align: center;
            text-decoration: none;
            width: 100%;
            z-index: 100;
        }
            .viewport a span em {
                display: block;
                font-size: 0.45em;
                font-weight: normal;
            }

        /* --- Dark hover background ------------------------------------------------------------ */
        .dark-background {
            background-color: rgba(15, 15, 15, 0.6);
            color: #fff;
            text-shadow: #000 0px 0px 20px;
        }
            .dark-background em {
                color: #ccc;
            }

        /* --- Light hover background ----------------------------------------------------------- */
        .light-background {
            background-color: rgba(255, 255, 255, 0.6);
            color: #333;
            text-shadow: #fff 0px 0px 20px;
        }
            .light-background em {
                color: #707070;
            }

        /**
         * You could create multiple hover background classes for different looks depending on the
         * image type. Use your imagination!
         */
    </style>

<!--Fancybox style ends here---> 




<style type="text/css">
.heading

{
	background-color:#0771A5;
	color:#FFF;
	padding:5px;
}
.ShowData
{
	padding-left: 19px;
    padding-top: 15px;
}
#manageUserPagination
{
 float:right;
}
.input-long{ width:280px; float:right; border:1px solid #666; margin:0 0 0 30px; height:20px; outline:none;}

/*
.whole-pennel-pass {
    border: 1px solid #CCCCCC;
    float: right;
    height: auto;
    margin: 9px -54px 0 0;
    padding: 10px;
    width: 585px;
}*/

.whole-pennel-pass {
 border: 1px solid #CCCCCC;
    float: left;
    margin: -372px 0 0 366px;
    padding: 10px;
    width: 785px;
}
 
.textpas{ float:left; width:150px; height:15px; font-size:13px;} 
#UserManage
{
 background: none repeat scroll 0 0 #0771A5;
    color: white;
    font-family: Verdana;
    font-size: 18px;
    padding: 12px 0 15px 18px;
    text-align: left;
    text-decoration: underline;
	margin-bottom:10px;
}
.post_images
{
padding:2px 0 5px 0;
}
#ProductList
{padding: 0 0 8px;}
.DeleteAllPic
{
	margin:0 0 0 358px;
}
.addImages
{
	margin:0;
}
</style>
</head>

<?php //$rowCount = count($query);?>
 
<div class="whole-pennel-pass">
 <div id="UserManage">Product Image Gallery</div>
 
 <?php
 $DynID=$this->uri->segment(3);
$DynProName=$this->uri->segment(4);


/*$options = array(
				  $DynID => $DynProName
                  
                );*/


echo "<div id='ProductList'>";
//echo form_dropdown('products', $options, 'proName');
echo  form_open_multipart('AdminPanel/uploadProdImage/'.$DynID.'/'.$DynProName);
echo form_label('Upload Product Images '); 
 echo form_input(array('name'=> 'userfile[]' ,'id' =>'userfile','type' =>'file','multiple'=> 'mulltiple','class' => 'multi'));
echo form_submit('submit','Upload');
echo form_close();
echo "</div>";

echo anchor('AdminPanel/DeleteAllPic/'.$DynID.'/'.$DynProName,'Delete All'." ".substr($DynProName,0,10)." ".'images',array('class'=>'DeleteAllPic'));
echo "&nbsp;&nbsp;";
echo anchor('AdminPanel/ProdList','Back');

 ?>
 
<div  style="border: 1px solid #333333;height: auto;padding: 4px 0 7px;width:793px;">
 <?php
  echo  form_open('AdminPanel/delete_checkbox_images',array('id'=>'myform'));
 $tmpl = array (
 	    'table_open'          => '<table border="0" cellpadding="5px" cellspacing="2" width="796" height="auto" class="addImages">',
					

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td class="ShowData">',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td class="ShowData">',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl);
$ChkUnchk = array(
    'name'        => 'checkall[]',
    'id'          => 'chkuser',
    'checked'     => FALSE,
	'onclick' => 'checkedAll()'
  
    );
$this->table->set_heading('SrNo.',form_checkbox($ChkUnchk),'Product Name','Image Preview','Image Status','Action');
$path=base_url().'proImages/';

if(count($query)>0)
{
$i =$this->uri->segment(5) + 0;
foreach($query as $val)
{
$i++;
if(isset($val))
	{
		$name=$val->prod_name;
	$imageName=$val->filename;
	$id=$val->id;
	 $sid=$val->status;
	
	$image_properties = array(
          'src' => $path.$imageName,
          'alt' => 'Product Images',
          'class' => 'post_images',
          'width' => '100',
          'height' => '100',
          'title' => 'product Images',
          'rel' => 'lightbox',
		  
);

$data = array(
    'name'        => 'delchkimages[]',
    'id'          => 'delchkimages',
    'value'       => $id,
    'checked'     => FALSE,
  
    );
	 
	

$this->table->add_row($i,form_checkbox($data),$name,"<div class='viewport'>".'<a class="fancybox" data-fancybox-group="gallery"  href="'.$path.$imageName.'">'.img($image_properties).'</a>'."</div>",
anchor('AdminPanel/ImageStatus/'.$id.'/'.$sid.'/'.$DynID.'/'.$name,$val->status
,array('onclick'=> "javascript:return update_Status()")),
anchor('AdminPanel/DeleteImage/'.$id.'/'.$DynID.'/'.$name,'Delete',
array('onclick'=> "javascript:return del_Record()"))."&nbsp;".
'<a class="fancybox" data-fancybox-group="gallery" href="'.$path.$imageName.'">'.'Full View'.'</a>');

 }
 }

echo $this->table->generate();
$js = 'onClick="checkAll()"';
echo form_submit('submit','Delete'); 

}
else
{
 $tmpl = array (
 	    'table_open'          => '<table border="0" cellpadding="5px" cellspacing="2" width="796" height="auto" class="addImages">',
					

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl);
$ChkUnchk = array(
    'name'        => 'checkall[]',
    'id'          => 'chkuser',
    'checked'     => FALSE,
	'onclick' => 'checkedAll()'
  
    );
$this->table->set_heading('SrNo.',form_checkbox($ChkUnchk),'Product Name','Image Preview','Image Status','Action');
$path=base_url().'proImages/';
$this->table->add_row('','','','No Record Found','','','');
	echo $this->table->generate(); 
	
}
 ?>
 </div>
<div id="manageUserPagination">
<?php 
echo $links;

 ?>
 </div>
</div>
<?php $this->view('adminpanel/include/footer'); ?>    