<?php
class Crap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('breadcrumb');
	}
	function index()
	{
		$this->breadcrumb->append_crumb('Home', 'mypage');
		$this->breadcrumb->append_crumb('review','pages/review');
		$this->load->view('include/header');
		$this->load->view('review');
        $this->load->view('include/footer');
	}
}
?>