<?php
class Admincontroller extends CI_Controller
{
	public $data 	= 	array();



			public function __construct()
		   {
		  
				parent::__construct();
				$this->load->library('pagination'); 
				$this->load->library('table');
				$this->load->library('email');
				$this->load->helper(array('form', 'url','html'));
				$this->load->model('Blog_model');
				
				$this->load->helper('url'); //You should autoload this one ;)
				$this->load->helper('ckeditor');
			
			//Ckeditor's configuration
				$this->data['ckeditor'] = array(
			
				//ID of the textarea that will be replaced
				'id' 	=> 	'entry_body',
				'path'	=>	'js/ckeditor',
			
				//Optionnal values
				'config' => array(
					'toolbar' 	=> 	"Full", 	//Using the Full toolbar
					'width' 	=> 	"550px",	//Setting a custom width
					'height' 	=> 	'100px',	//Setting a custom height
						
				),
			
				//Replacing styles from the "Styles tool"
				'styles' => array(
				
					//Creating a new style named "style 1"
					'style 1' => array (
						'name' 		=> 	'Blue Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 			=> 	'Blue',
							'font-weight' 		=> 	'bold'
						)
					),
					
					//Creating a new style named "style 2"
					'style 2' => array (
						'name' 		=> 	'Red Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 			=> 	'Red',
							'font-weight' 		=> 	'bold',
							'text-decoration'	=> 	'underline'
						)
					)				
				)
			);
			
		   }
		   

	public function index()
	{
	
	//$data['title'] = "Add new post";
			
			$this->load->helper('form');
			$this->load->library(array('form_validation','session'));
			
			//set validation rules
			$this->form_validation->set_rules('entry_name', 'Title', 'required|max_length[200]');
			$this->form_validation->set_rules('entry_body', 'Body', 'required');
					

			if ($this->form_validation->run() == FALSE)
			{
				//if not valid
				$this->load->view('blog/add_new',$this->data);
			}
			else
			{
				//if valid
				$name = $this->input->post('entry_name');
				$body = $this->input->post('entry_body');
				$this->blog_model->add_new_entry($name,$body);
				$this->session->set_flashdata('message', '1 new post added!');
				//redirect('new-post');
				$this->index();
			}
		
	}
		public function show()
		{
			$this->load->view('admin/adminlogin');
		}
		public function adminLogin()
		{
		
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
	        
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			
			if($this->input->post('submit'))
			{
				if($this->form_validation->run() == FALSE)
				{
					$this->load->view('admin/adminlogin.php');
				}
				else
				{ 
					$this->load->model('Admin_model');
					$this->Admin_model->loginAdmin();
				}	
			}
			
			
		}
		public function logout()
		{
			$this->session->sess_destroy();
		
			redirect('admincontroller/show');
		}
		public function adminhome()
		{
		
		
			$id=$this->session->userdata('id'); 
			if($id== '' && $id== null)
			{
				redirect('admincontroller/show');
			}
			else
			{
			$this->load->view('admin/adminhome');
			}
		}
	
		public function admincasino()
		{		
		
					
					$id=$this->session->userdata('id'); 
					if($id== '' && $id== null)
					{
					redirect('Admincontroller/show');
					}
					else
					{
		
					$this->load->model('Admin_model');
					$coun['countryNames']=$this->Admin_model->getcountryNames();
					
				
					
					/*$this->form_validation->set_rules('country','Country','required');
					$this->form_validation->set_rules('category','Casino Name','required');
					$this->form_validation->set_rules('cat_desc','Description','required');
					$this->form_validation->set_rules('siteUrl','Site Url','required');
					
				
					if($this->form_validation->run() == FALSE)
					{
						
						$data = array('country_name' => $coun['countryNames'],'editor' => $this->data);
						
						
						$this->load->view('admin/addcasino',$data);
					}
					else
					{*/
								
						$this->do_upload1();
						$this->load->model('Admin_model');
						$this->Admin_model->insert_data();
						
						
					/*}
					*/
				}
		}
		
		public function do_upload1()
		{
			 $config['upload_path'] = './admin/upload/';
			
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['overwrite'] = TRUE;
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';
			$config['max_size'] = 100000;
			
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('casinoImg'))
			{
			
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				
				echo $this->upload->data();
				
			}
			
		}
		
		
		public function casinoList()
		{	
					$id=$this->session->userdata('id'); 
					if($id== '' && $id== null)
					{
					redirect('admincontroller/show');
					}
					else
					{
			$data=array();
			$this->load->model('Admin_Model');
			$config["base_url"] 
							=base_url().'index.php/admincontroller/casinoList/';
			$config["total_rows"] = $this->Admin_Model->casinorecord_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data['casinolist'] = $this->Admin_Model->selectCasino($config["per_page"], $page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/casinolist',$data);	
					}
			
		}
		public function updateStatus($id,$status)
		{
			$this->load->model('Admin_Model');
			$this->Admin_Model->update_status($id,$status);
			
		}
		public function deleteCasino($id)
		{
			 $this->load->model('Admin_Model');
			 $this->Admin_Model->deleteCasino($id);
			
		}
		public function editCasino($id)
		{
					
					
					$data=array();
					$data['id']=$id;
					$this->load->model('Admin_Model');
					$selectedit=$this->Admin_Model->selectupdateCasino($id);
					
					//print_r($data['selectupdate']);
					
					$data['id']=$id;
					$this->form_validation->set_rules('category','Category','required');
					$this->form_validation->set_rules('cat_desc','Description','required');
				
					if($this->form_validation->run() == FALSE)
					{
						$get=array('selectupdate'=>$selectedit,'abc'=>$this->data);
						$this->load->view('admin/editcasino',$get);
					}
					/*else
					{
						
						$checkid=$this->Admin_Model->checkData();
						$check=$this->Admin_Model->checkId();
						$cid=$this->input->post('id');
						//die();
						if((($cid==$checkid) && ($check>0)) || (($checkid==0) && ($check==0)))
						{
							
						}*/
						else
						{
							
							$this->Admin_Model->updateCasino($id);
						}
						//echo "success";
					
		}
		public function manageUser()
		{	
			$id=$this->session->userdata('id'); 
			if($id== '' && $id== null)
			{
				redirect('Admincontroller/show');
			}
			else
			{
			
			//$this->load->model('Admin_Model');
			//$data['userlist']=$this->Admin_Model->selectUser();
			//print_r($data['userlist']);
			//$this->load->view('admin/userlist',$data);
			
			$this->load->model('Admin_Model');
			$config["base_url"] =base_url().'index.php/AdminController/manageUser/';
			$config["total_rows"] = $this->Admin_Model->count_user();
			$config["per_page"] = 3;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data['userlist'] = $this->Admin_Model->selectUser($config["per_page"], $page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/userlist',$data);
			}
		}
		public function userStatus($id,$status)
		{
			$this->load->model('Admin_Model');
			$this->Admin_Model->user_Status($id,$status);
			//echo "updated status";
			
		}
		public function deleteUser($id)
		{
			$this->load->model('Admin_Model');
			$this->Admin_Model->delete_User($id);
			
		}
		public function show_gamescat()
		{
			$this->load->view('admin/gamescategory');		
		}
		public function do_upload()
		{
			$config['upload_path'] = './admin/upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload())
			{
				///$error = array('error' => $this->upload->display_errors());
				//$this->load->view('admin/gamescategory');
			}
			else
			{
				$this->upload->data();
			}
			
		}
		public function addGamescat()
		{
					
					$this->form_validation->set_rules('category','Category','required');
					$this->form_validation->set_rules('cat_desc','Description','required');
					//$this->form_validation->set_rules('userfile','Userfile','required');
				
					if($this->form_validation->run() == FALSE)
					{
						$this->load->view('admin/gamescategory',$this->data);
					}
					else
					{
						//echo "suceess";
						$this->do_upload();
						$this->load->model('Admin_model');
						$this->Admin_model->addgames_Cat();
					}
			
		}
		public function gamecat_list()
		{
			$id=$this->session->userdata('id'); 
			if($id== '' && $id== null)
			{
				redirect('admincontroller/show');
			}
			else
			{
			
			$this->load->model('Admin_model');
			$data['select_gcat']=$this->Admin_model->select_Gcat();
			$this->load->view('admin/gamecategorylist',$data);
			}
			//print_r($data['select_gcat']);
		}
		public function deleteGcat($id)
		{
			$this->load->model('Admin_model');
			$this->Admin_model->deleteGcat($id);
		}
		public function statusGcat($id,$status)
		{
			$this->load->model('Admin_model');
			$this->Admin_model->statusGcat($id,$status);
		}
		public function editGcat($id)
		{
			//echo $id;
			$this->load->model('Admin_model');
			$data['selectgcat']=$this->Admin_model->selectGcat($id);
			//print_r($data['selectgcat']);
			$filename=$this->input->post('filename');
			
			
					$this->form_validation->set_rules('category','Category','required');
					$this->form_validation->set_rules('cat_desc','Description','required');
					//$this->form_validation->set_rules('userfile','Userfile','required');
				
					if($this->form_validation->run() == FALSE)
					{
						$this->load->view('admin/editgamecat',$data);
					}
					else
					{
						//echo "suceess";
						unlink('./admin/upload/'.$filename);
						$this->do_upload();
						$this->load->model('Admin_model');
						$this->Admin_model->edit_Gcat($id);
					}
		}
		public function getCountry()
		{
			$this->load->model('Admin_model');
			$this->Admin_Model->getCountryDetail(); 
		}
		public function addGames()
		{	
			$id=$this->session->userdata('id'); 
			if($id== '' && $id== null)
			{
				redirect('Admincontroller/show');
			}
			else
			{
			$this->form_validation->set_rules('category','Game Name','required');
			$this->form_validation->set_rules('cat_id','Category','required');
			$this->form_validation->set_rules('cat_desc','Description','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/addgames',$this->data);
			}
			else
			{
				$this->do_upload();
				$this->load->model('Admin_Model');
				$this->Admin_Model->insertGames(); 
			}
			}
		}
		public function gamesList()
		{	
			$id=$this->session->userdata('id'); 
			if($id== '' && $id== null)
			{
				redirect('admincontroller/show');
			}
			else
			{
			
			/*
			$this->load->model('Admin_Model');
			$data['gamelist']=$this->Admin_Model->selectGames();
			//print_r($data['gamelist']);
			$this->load->view('admin/gameslist',$data);*/
			$this->load->model('Admin_Model');
			//echo $this->Admin_Model->gamesrecord_count();
			$config["base_url"] = base_url().'index.php/AdminController/gamesList/';
			$config["total_rows"] = $this->Admin_Model->gamesrecord_count();
			$config["per_page"] = 3;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data['gamelist'] = $this->Admin_Model->selectGames($config["per_page"], $page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/gameslist',$data);
			}
		}
		public function gameStatus($id,$status)
		{
			//echo "success";
			$this->load->model('Admin_Model');
			$this->Admin_Model->game_Status($id,$status);
		}
		public function deleteGame($id)
		{
			$this->load->model('Admin_Model');
			$this->Admin_Model->delete_game($id);
			
			//echo "success";
		}
		public function editGames()
		{
			$this->form_validation->set_rules('category','Game Name','required');
			$this->form_validation->set_rules('cat_id','Category','required');
			$this->form_validation->set_rules('cat_desc','Description','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/editgamesname',$this->data);
			}
			else
			{
				//$this->do_upload();
				//$this->load->model('Admin_Model');
				//$this->Admin_Model->insertGames(); 
			}
		}
		/*********************admin mail content module controller functions starts  here****************************/	
		public function show_mailContent()
			{	
				$this->load->model('Admin_Model');
				$data['register_mailContent']=$this->Admin_Model->getResiterMailContent();
				$this->load->view('admin/view_mailContentList',$data);
			}
			
			public function EditMailContent($id)
			{
				$this->load->model('Admin_Model');
				$data['unique_mailContent']=$this->Admin_Model->getUniqueMailContent($id);
				
				
				$data = array('content' => $data['unique_mailContent'],'editor' => $this->data);
				$this->load->view('admin/edit_mailContent',$data);
			}
			
			public function updateMailContent()
			{
				$id=$this->input->post('id');
				
				$this->load->model('Admin_Model');
				$this->Admin_Model->updateMailContent($id);
			}
			
			
			public function ViewMailContent($id)
			{
				$this->load->model('Admin_Model');
				$data['unique_mailContent']=$this->Admin_Model->getUniqueMailContent($id);
				
				
				$data = array('content' => $data['unique_mailContent'],'editor' => $this->data);
				$this->load->view('admin/ViewMailContent',$data);
			}
			
			/*--------------------admin mail content module controller functions ends  here-------------------------*/
			/*--------------------admin confirm users module controller functions starts from here---------------------------*/
			
			
			public function ShowConfirmUsers()
			{	
				$id=$this->session->userdata('id'); 
				if($id== '' && $id== null)
				{
				redirect('admincontroller/show');
				}
				else
				{
				$this->load->model('Admin_Model');
				$data['confirmUsers']=$this->Admin_Model->getConfirmUsers();
				
				$this->load->view('admin/showConfirmUserPage',$data);
				}
			}
			
			public function changeUserStatus($val,$uname)
			{	
			$this->load->model('Admin_Model');
			$this->Admin_Model->getLogin_Status($val,$uname);
				
			}
			
			
			/*--------------------admin confirm users module controller functions ends  here----------------------------------*/
			/******************************Add new game module starts from here***********************************/
			
			public function Set_newgame()
			{
				    
					//$this->form_validation->set_rules('userfile','Userfile','required');
				
					
						$this->load->view('admin/addgames_type');
					
					
			}
	public function add_newGam()
		{	
		$this->load->model('Admin_Model');
		$this->Admin_Model->setnewGames();
		}
		
		public function Setgamedescription($id)
		{
			$dataa=$id;
			$this->load->model('Admin_Model');
			$result=$this->Admin_Model->fetch_cntry_name();
			$data['id'] = $dataa;
            $data['country_t'] = $result;
			$this->load->view('admin/addgames_desc',$data);
		}
	public function add_game_desc($id)
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->setgame_desc($id);
	}
	public function fetchedresponse($tag)
	{
		    echo $tag;die();
			$this->load->view('fetched.php',$tag);
	}
			
			/******************************Add new game module ends here***********************************/

		
}

?>