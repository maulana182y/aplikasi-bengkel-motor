<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Home_model');
        $this->load->model('User_model');
        $this->load->database();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data['users'] = $this->User_model->get_all_users();
        $data['total_user'] =  $this->User_model->total_user();
        // var_dump($data);
        $this->load->view('User/v_all_users', $data);
    }
    public function add_user()
    {

        // add by maulana 28-11-2019
        if ($this->input->post('submit')) {
            $username = $this->input->post('username');
            $sql = $this->db->query("SELECT * FROM tb_users where username= '$username' ");
            $cek_user = $sql->num_rows();
            if ($cek_user > 0) {
                $this->session->set_flashdata('message', 'Username sudah digunakan');
            } else {
                $nama     = $this->input->post('nama');
                $role     = $this->input->post('role');
                $password  = $this->input->post('password');
                $data = $this->User_model->add_user($username, $nama, $role, $password);
            }
            redirect('User');
        } else {
            $this->load->view('User/v_add_user');
        }
    }
    public function edit_user($id)
    {
        if ($this->input->post('submit')) {
            $id       = $this->input->post('id');
            $username = $this->input->post('username');
            $nama     = $this->input->post('nama');
            $role     = $this->input->post('role');
            $password  = $this->input->post('password');
            $data = $this->User_model->edit_user($id, $username, $nama, $role, $password);
            redirect('User');
        } else {
            $data['data'] = $this->User_model->get_edit_user($id);
            $this->load->view('User/v_user_edit', $data);
        }
    }

    public function delete_user($id)
    {
        $data['data'] = $this->User_model->get_delete_user($id);
        redirect('User');
    }
    public function activateUser()
    {
        $result = $this->User_model->activateUser($this->input->post());
        redirect('user');
    }
    public function logout()
    {
        $this->simple_login->logout();
    }
}
