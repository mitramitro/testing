<?php


	   		require_once('config.php');
			$country=$_GET['country'];
			//global $wpdb;
			//$wpdb->get_results("SELECT *FROM geo_states");
			//$mydb = new wpdb('root','','wordpress_onlinelearning','localhost');
			//$rows = $mydb->get_results("SELECT *FROM geo_states");
			//print_r($rows);
			//echo $query="select * from geo_states where con_id='$country' order by name asc";
			$query="select * from geo_states where con_id='$country' order by name asc";
			$sql=mysql_query($query);
			while($data=mysql_fetch_assoc($sql))
			{
				//echo $data['sta_id'];
			?>
				<option value="<?php echo $data['sta_id'];?>"><?php echo $data['name'];?></option>
			<?php
			}
		
		


//add_shortcode('state','state');
	
?>