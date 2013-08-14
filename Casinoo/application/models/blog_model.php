<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * @author Pisyek Kumar
	 * @email pisyek@gmail.com
	 * @link http://www.pisyek.com
	 */

class Blog_model extends CI_Model {

	function get_all_posts()
	{
		//get all entry, sort by latest to oldest
		$this->db->order_by('entry_date','desc');
		$query = $this->db->get('entry');
		return $query->result();
	}
	
	
	function add_new_entry($name,$body)
	{
		$data = array(
			'entry_name' => $name,
			'entry_body' => $body,
		);
		$this->db->insert('entry',$data);
	}
	
	
	////////////////////////////////////////////
	
	
	
	function add_new_comment($post_id,$commentor,$email,$comment)
	{
		$data = array(
			'entry_id'=>$post_id,
			'comment_name'=>$commentor,
			'comment_email'=>$email,
			'comment_body'=>$comment,
		);
		$this->db->insert('comment',$data);
	}
	
	
	// get post by particular id
	
	function get_post($id)
	{
		$this->db->where('entry_id',$id);
		$query = $this->db->get('entry');
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get_post_comment($post_id)
	{
	
	
		$this->db->where('entry_id',$post_id);
		$query = $this->db->get('comment');
		return $query->result();
	}
	
	function total_comments($id)
	{
		$this->db->like('entry_id', $id);
		$this->db->from('comment');
		return $this->db->count_all_results();
	}
	
	
	
	
	public function Login($username,$password)
	 {
	   $this->db->select('*');
	   $this->db->from('register');
	  $this->db->where('username',$username);
  	 $this->db->where('password', $password); 
	 

	   $this->db->limit(1);
	
	  $query = $this-> db->get();
	  
		 if($query->num_rows() == 1)
	   {
	      return $query->result();
	   }
	   else
	   {
		   $this->session->set_flashdata('errorlogin', 'Invalid username or password');
	 redirect('blog/login');
		
	   }
	 }
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */