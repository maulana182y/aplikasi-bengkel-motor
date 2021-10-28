 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Home extends CI_Controller {
    public function __construct(){
         parent::__construct();
         $this->simple_login->cek_login();
         // $this->load->model('Home_model');
         $this->load->database();
         $this->load->helper('url');
     }
     
     public function index() {
        // $this->load->model('Home_model');
        // $data['data'] = $this->Home_model->get_user_data($this->session->username);
        // $data['jadwal'] = $this->Home_model->get_data_jadwal();
        // var_dump($data);         
        $this->load->view('Home/home');
     }
     

 }
