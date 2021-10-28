<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Barang_masuk_model');
    }

    public function index()
    {
        $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data['bmsk'] = $this->Barang_masuk_model->get_all();
        // var_dump($data);
        $this->load->view('Barang_masuk/v_all_barang_masuk', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_masuk/create_action'),
	    'id_barang_masuk' => set_value('id_barang_masuk'),
	    'kode_barang' => set_value('kode_barang'),
	    'kode_supplier' => set_value('kode_supplier'),
	    'jumlah' => set_value('jumlah'),
	    'harga' => set_value('harga'),
        'konten' => 'Barang_masuk/v_add_barang_masuk',
            'judul' => 'Data Barang Masuk',
	);
        $this->load->view('Barang_masuk/v_add_barang_masuk', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Barang_masuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Barang_masuk/update_action'),
		'id_barang_masuk' => set_value('id_barang_masuk', $row->id_barang_masuk),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'harga' => set_value('harga', $row->harga),
        'konten' => 'Barang_masuk/v_add_barang_masuk',
            'judul' => 'Data Barang Masuk',
	    );
            $this->load->view('Barang_masuk/v_add_barang_masuk', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Barang_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang_masuk', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Barang_masuk_model->update($this->input->post('id_barang_masuk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Barang_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $this->Barang_masuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Barang_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Barang_masuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('kode_supplier', 'kode supplier', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_barang_masuk', 'id_barang_masuk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
