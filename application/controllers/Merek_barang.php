<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Merek_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Merk_barang_model');
    }

    public function index()
    {
       $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data['brg'] = $this->Merk_barang_model->get_all();
        // var_dump($data);
        $this->load->view('Barang/merk_barang_read', $data);
    }

  //   public function read($id) 
  //   {
  //       $row = $this->Merk_barang_model->get_by_id($id);
  //       if ($row) {
  //           $data = array(
		// 'id_merk' => $row->id_merk,
		// 'merk_barang' => $row->merk_barang,
	 //    );
  //           $this->load->view('merk_barang/merk_barang_read', $data);
  //       } else {
  //           $this->session->set_flashdata('message', 'Record Not Found');
  //           redirect(site_url('merk_barang'));
  //       }
  //   }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Merek_barang/create_action'),
	    'id_merk' => set_value('id_merk'),
	    'merk_barang' => set_value('merk_barang'),
        'konten' => 'Barang/v_add_merk',
            'judul' => 'Merk Barang',
	);
        $this->load->view('Barang/v_add_merk', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'merk_barang' => $this->input->post('merk_barang',TRUE),
	    );

            $this->Merk_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Merek_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Merk_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Merek_barang/update_action'),
		'id_merk' => set_value('id_merk', $row->id_merk),
		'merk_barang' => set_value('merk_barang', $row->merk_barang),
        'konten' => 'Barang/v_add_merk',
            'judul' => 'Merk Barang',
	    );
            $this->load->view('Barang/v_add_merk', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Merek_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_merk', TRUE));
        } else {
            $data = array(
		'merk_barang' => $this->input->post('merk_barang',TRUE),
	    );

            $this->Merk_barang_model->update($this->input->post('id_merk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Merek_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Merk_barang_model->get_by_id($id);

        if ($row) {
            $this->Merk_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Merek_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('merk_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('merk_barang', 'merk barang', 'trim|required');

	$this->form_validation->set_rules('id_merk', 'id_merk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
