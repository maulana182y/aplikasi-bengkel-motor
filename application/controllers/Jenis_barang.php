<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Jenis_barang extends CI_Controller {
    public function __construct()
    {
         parent::__construct();
         $this->simple_login->cek_login();
         $this->load->model('Home_model');
         $this->load->model('Jenis_barang_model');
     }

     public function index() 
    {
        $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data['brg'] = $this->Jenis_barang_model->get_all();
        // var_dump($data);
        $this->load->view('Barang/jenis_barang_read', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Jenis_barang/create_action'),
        'id_jenis' => set_value('id_jenis'),
        'jenis_barang' => set_value('jenis_barang'),
        'konten' => 'Barang/v_add_jenis',
            'judul' => 'Jenis Barang',
    );
        var_dump($data);
        $this->load->view('Barang/v_add_jenis', $data);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'jenis_barang' => $this->input->post('jenis_barang',TRUE),
        );


            $this->Jenis_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Jenis_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_barang/update_action'),
        'id_jenis' => set_value('id_jenis', $row->id_jenis),
        'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
        'konten' => 'Barang/v_add_jenis',
            'judul' => 'Jenis Barang',
        );
            $this->load->view('Barang/v_add_jenis', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Jenis_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } else {
            $data = array(
        'jenis_barang' => $this->input->post('jenis_barang',TRUE),
        );

            $this->Jenis_barang_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Jenis_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id($id);

        if ($row) {
            $this->Jenis_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Jenis_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Jenis_barang'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required');

    $this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}