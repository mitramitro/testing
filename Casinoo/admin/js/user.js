function getsubcatList(id){
	   if(id!=''){
	  var ajax = new Ajax();
			ajax.doGet('subcategory_List.php?act=subcategory_list&id='+id,subcatList,'text');
	   }
 }
 
  var subcatList = function(str)
    {
	 
	  document.getElementById('subcategory_list').innerHTML=str;
	}
	
	
	
	
	function getproductList(id){
		if(id!=''){
	         var ajax = new Ajax();
			ajax.doGet('subcategory_List.php?act=product_list&id='+id,productList,'text');
		  }
		}
 
  var productList = function(str)
    {
	  document.getElementById('product_list').innerHTML=str;
	}
	
	
	
	function getideassubcatList(id){
	   if(id!=''){
	  var ajax = new Ajax();
			ajax.doGet('subcategory_List.php?act=subcategory_list&id='+id,subcatList,'text');
	   }
 }
 
  var subcatList = function(str)
    {
	 
	  document.getElementById('subcategory_list').innerHTML=str;
	}
	
	
function getmeasurement(sizeCat){
	   if(sizeCat!=''){
	  var ajax = new Ajax();
			ajax.doGet('measurement_List.php?act=measurement_List&sizeCat='+sizeCat,measurement,'text');
	   }
 }
 
  var measurement = function(str)
    {
	 
	  document.getElementById('measurement_List').innerHTML=str;
	}
	

function getsize(sizeCat){
	   if(sizeCat!=''){
	  var ajax = new Ajax();
			ajax.doGet('size_List.php?act=size_List&sizeCat='+sizeCat,size,'text');
	   }
 }
 
  var size = function(str)
    {
	 
	  document.getElementById('size_List').innerHTML=str;
	}
	
	

	
function getcolorlist2(id){
		if(id!=''){
	         var ajax = new Ajax();
			ajax.doGet('colorlist1.php?act=colorlist2&id='+id,colorlist2,'text');
		  }
		}
 
  var colorlist2 = function(str)
    {

	  document.getElementById('colorlist2').innerHTML=str;

	}
	

function getzoomlist(id){
		if(id!=''){
	         var ajax = new Ajax();
			ajax.doGet('zoomlist.php?act=zoomlist&id='+id,zoomlist,'text');
		  }
	
		}
		
 
  var zoomlist = function(str)
    {
							
	     document.getElementById('zoomlist').innerHTML=str;
	}