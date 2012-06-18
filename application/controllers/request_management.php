<?php
class Request_Management extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() { 
		$this -> add();
	}

	public function add() {
		$data['title'] = "Request Form";
		$data['content_view'] = "request_v";
		$data['banner_text'] = "Analysis Request";
		$data['link'] = "request_management";
		$data['quick_link'] = "request_management";
		$this -> load -> view("template", $data);
	}

}
