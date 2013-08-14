<?php
class Casino extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('breadcrumb');
	}
	function index()
	{
		$this->load->view('include/header');
		$this->load->view('pages/mypage');
        $this->load->view('include/footer');
	}
	function view($page)
	   {
		$this->breadcrumb->append_crumb('Home', 'mypage');
		$this->breadcrumb->append_crumb($page,'pages/'.$page);
		$this->load->view('include/header');	
		$this->load->view('pages/'.$page);
		$this->load->view('include/footer');
	}
}
?>