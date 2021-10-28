 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Barang extends CI_Controller {
    public function __construct(){
         parent::__construct();
         $this->simple_login->cek_login();
         $this->load->model('Home_model');
         $this->load->model('Barang_model');
         $this->load->model('Jenis_barang_model');
         $this->load->model('No_urut');
         $this->load->database();
         $this->load->helper('url');
     }
     
     public function index() {
        // $row = $this->Barang_model->get_by_id($id);
        // if ($row) {
        //     $data = array(
        // 'id_barang' => $row->id_barang,
        // 'kode_barang' => $row->kode_barang,
        // 'nama_barang' => $row->nama_barang,
        // 'harga' => $row->harga,
        // 'stok' => $row->stok,
        // );
        //     $this->load->view('Barang/barang_read', $data);
        // } else {
        //     $this->session->set_flashdata('message', 'Record Not Found');
        //     redirect(site_url('barang'));
        // }
        $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data['brg'] = $this->Barang_model->get_all();
        // var_dump($data);
        $this->load->view('Barang/barang_read', $data);
     }

     public function create() 
    {
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        $data = array(
            'button' => 'Create',
            'action' => site_url('Barang/add_barang'),
        'id_barang' => set_value('id_barang'),
        'kode_barang' => $this->No_urut->buat_kode_barang(),
        'nama_barang' => set_value('nama_barang'),
        'harga' => set_value('harga'),
        'stok' => set_value('stok'),
        'id_jenis' => set_value('id_jenis'),
        'id_merk' => set_value('id_merk'),
        'kode_supplier' => set_value('kode_supplier'),
        'konten' => 'Barang/v_add_barang',
            'judul' => 'Data Barang',
    );
        
        // var_dump($data);
        $this->load->view('Barang/v_add_barang', $data);
    }
     
     public function add_barang()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        $nmfile = "barang_".time();
        $config['upload_path'] = './image/barang';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '20000';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('foto_barang');
        $result1 = $this->upload->data();
        $result = array('gambar'=>$result1);
        $dfile = $result['gambar']['file_name'];

            $data = array(
        'kode_barang' => $this->input->post('kode_barang',TRUE),
        'nama_barang' => $this->input->post('nama_barang',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'stok' => $this->input->post('stok',TRUE),
        'id_jenis' => $this->input->post('id_jenis',TRUE),
        'id_merk' => $this->input->post('id_merk',TRUE),
        'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'foto_barang' => $dfile,
        );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }

    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
        'id_barang' => set_value('id_barang', $row->id_barang),
        'kode_barang' => set_value('kode_barang', $row->kode_barang),
        'nama_barang' => set_value('nama_barang', $row->nama_barang),
        'harga' => set_value('harga', $row->harga),
        'stok' => set_value('stok', $row->stok),
        'id_jenis' => set_value('id_jenis', $row->id_jenis),
        'id_merk' => set_value('id_merk', $row->id_merk),
        'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
        'konten' => 'barang/v_add_barang',
            'judul' => 'Data Barang',
        );
            $this->load->view('Barang/v_add_barang', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
        if ($_FILES == '') {
            
            $data = array(
        'kode_barang' => $this->input->post('kode_barang',TRUE),
        'nama_barang' => $this->input->post('nama_barang',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'stok' => $this->input->post('stok',TRUE),
        'id_jenis' => $this->input->post('id_jenis',TRUE),
        'id_merk' => $this->input->post('id_merk',TRUE),
        'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));

        } else {

            $nmfile = "barang_".time();
            $config['upload_path'] = './image/barang';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '20000';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('foto_barang');
            $result1 = $this->upload->data();
            $result = array('gambar'=>$result1);
            $dfile = $result['gambar']['file_name'];

             $data = array(
        'kode_barang' => $this->input->post('kode_barang',TRUE),
        'nama_barang' => $this->input->post('nama_barang',TRUE),
        'harga' => $this->input->post('harga',TRUE),
        'stok' => $this->input->post('stok',TRUE),
        'id_jenis' => $this->input->post('id_jenis',TRUE),
        'id_merk' => $this->input->post('id_merk',TRUE),
        'kode_supplier' => $this->input->post('kode_supplier',TRUE),
        'foto_barang' => $dfile,
        );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }

           
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }


    public function _rules() 
    {
    $this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
    $this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
    $this->form_validation->set_rules('harga', 'harga', 'trim|required');
    $this->form_validation->set_rules('stok', 'stok', 'trim|required');

    $this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

 }
