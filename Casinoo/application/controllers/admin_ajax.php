<?php
class admin_ajax extends CI_Controller
{
	public function index()
	{
		$this->load->model("Admin_Model");
		$select=$this->Admin_Model->select_Gcat();
		//print_r($selects);
		?>
		<option value="">----Select One Category-----</option>
		<?php 
		foreach($select as $value)
		{
		?>
		
		<option value="<?php echo $value['cat_id']?>"><?php echo $value['game_cat_name']?></option>
<?php
		}
	}
}

?>