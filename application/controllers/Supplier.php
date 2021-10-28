<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Supplier_model');
    }

    public function index()
    {
        $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data['sply'] = $this->Supplier_model->get_all();
        // var_dump($data);
        $this->load->view('Supplier/v_all_supplier', $data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Supplier/create_action'),
	    'id_supplier' => set_value('id_supplier'),
	    'kode_supplier' => set_value('kode_supplier'),
        'nama_supplier' => set_value('nama_supplier'),
        'username' => set_value('username'),
	    'password' => set_value('password'),
        'konten' => 'Supplier/v_add_supplier',
            'judul' => 'Data Supplier',
	);
        $this->load->view('Supplier/v_add_supplier', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Supplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Supplier/update_action'),
		'id_supplier' => set_value('id_supplier', $row->id_supplier),
		'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
        'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
        'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
        'konten' => 'Supplier/v_add_supplier',
            'judul' => 'Data Supplier',
	    );
            $this->load->view('Supplier/v_add_supplier', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier', TRUE));
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Supplier_model->update($this->input->post('id_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Supplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $this->Supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_supplier', 'kode supplier', 'trim|required');
    $this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');

	$this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
