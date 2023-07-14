<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_Model");
        $this->load->database();
	}

	function check_session(){
		if(empty($this->session->userdata("username"))){
			redirect("login");
		}
	}

	public function home(){
		$this->load->view("V_Sidebar");
		$this->load->view("V_Home");
		$this->load->view("V_Footer");
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect("login");
	}

	public function login(){

		if ($_POST){
			$username = $_POST["username"];
            $password = md5($_POST["password"]);
            $validate = $this->M_Model->check_user_account($username, $password);

			if ($validate){
				$this->session->set_userdata("username", $validate[0]["username"]);
				$this->session->set_userdata("role", $validate[0]["role"]);
				$this->session->set_userdata("password", $validate[0]["password"]);
				redirect("home");
			} else {
				$this->session->set_flashdata("error", "Incorrect username or password !");
			}
		}

		$this->load->view("V_Login.php");
	}

	public function post()
	{
		$this->check_session();

		$data["posts"] = $this->M_Model->get_post();

		$this->load->view("V_Sidebar", $data);
		$this->load->view("V_PostMonitoring", $data);
		$this->load->view("V_Footer", $data);
	}

	public function post_delete($post_id){
		$this->M_Model->post_delete($post_id);
		redirect("post");
	}

	public function post_create_edit($post_id=null){
		$this->check_session();
		$data = array();

		if ($_POST){
			if(empty($post_id)){
				$_POST["username"] = $this->session->userdata("username");
				$this->M_Model->insert_post($_POST);
			} else {
				$this->M_Model->update_post($_POST, $post_id);
			}

			redirect("post");
		}

		$current_url = explode("/", $_SERVER['REQUEST_URI']);
        $data["process"] = $current_url[3];

		if ($post_id){
			$data["post"] = $this->M_Model->get_post($post_id)[0];
		}

		$this->load->view("V_Sidebar", $data);
		$this->load->view("V_PostCreateEdit", $data);
		$this->load->view("V_Footer", $data);

	}


	public function account(){
		$this->check_session();
		$data["accounts"] = $this->M_Model->get_account();

		$this->load->view("V_Sidebar", $data);
		$this->load->view("V_AccountMonitoring", $data);
		$this->load->view("V_Footer", $data);
	}

	public function account_create_edit($username=null){
		$this->check_session();
		$data = array();

		if ($_POST){
			if(empty($username)){
				$_POST["password"] = md5($_POST["password"]);
				$this->M_Model->insert_account($_POST);
			} else {
				if($_POST["passowrd"] != $this->session->userdata("password")){
					$_POST["password"] = md5($_POST["password"]);
				}
				$this->M_Model->update_account($_POST, $username);
			}

			redirect("account");
		}

		if ($username){
			$data["account"] = $this->M_Model->get_account($username)[0];
		}

		$current_url = explode("/", $_SERVER['REQUEST_URI']);
        $data["process"] = $current_url[3];
		$data["post"] = "";

		$this->load->view("V_Sidebar", $data);
		$this->load->view("V_AccountCreateEdit", $data);
		$this->load->view("V_Footer", $data);

	}

}
