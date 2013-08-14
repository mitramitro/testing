<?php


	   
			$state=$_GET['state'];
			//global $wpdb;
			//$wpdb->get_results("SELECT *FROM geo_states");
			//$mydb = new wpdb('root','','wordpress_onlinelearning','localhost');
			//$rows = $mydb->get_results("SELECT *FROM geo_states");
			//print_r($rows);
			//echo $query="select * from geo_states where con_id='$country' order by name asc";
			$con = mysql_connect('localhost', 'root','') or die("Could not connect database");
			mysql_select_db('wordpress_onlinelearning', $con) or die("Could not select database"); 
			
			$query="select * from geo_cities where sta_id='$state' order by name asc";
			$sql=mysql_query($query);
			while($data=mysql_fetch_assoc($sql))
			{
				//echo $data['sta_id'];
			?>
				<option value="<?php echo $data['cty_id'];?>"><?php echo $data['name'];?></option>
			<?php
			}
		
		


//add_shortcode('state','state');
	
?>