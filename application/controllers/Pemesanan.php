<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Pemesanan_model');
    }

    public function index()
    {
        $this->load->model('Home_model');
        $data['data'] = $this->Home_model->get_user_data($this->session->username);
        // $sql = $this->db->query("SELECT * FROM transaksi order by id_transaksi DESC");
        $data['sql'] = $this->Pemesanan_model->get_all();
        // var_dump($data);
        $this->load->view('Pemesanan/v_all_pemesanan', $data);
    }

    public function tambah_penjualan()
    {
        $this->load->model('No_urut');

        $data = array(
            'konten' => 'Pemesanan/v_add_pemesanan',
            'judul' => 'Tambah Transaksi',
            'kodeurut' => $this->No_urut->buat_kode_penjualan(),
        );
        $this->load->view('Pemesanan/v_add_pemesanan',$data);
    }

    public function hapus_penjualan($kode_penjualan)
    {
        
        $this->db->where('kode_transaksi', $kode_penjualan);
        $this->db->delete('transaksi');
        $this->db->where('kode_transaksi', $kode_penjualan);
        $this->db->delete('detail_transaksi');
        ?>
        <script type="text/javascript">
            alert('Berhapus Hapus Data');
            window.location='<?php echo base_url('Pemesanan') ?>';
        </script>
        <?php
    }

    public function cetak_penjualan($kode_penjualan)
    {
        
        $data = array(
            'data' => $this->db->query("SELECT * FROM transaksi where kode_transaksi='$kode_penjualan'"),
        );
        $this->load->view('Pemesanan/cetak_pemesanan',$data);
    }

    public function detail_penjualan($kode_penjualan)
    {
        
        $data = array(
            'konten' => 'Pemesanan/v_detail_pemesanan',
            'judul' => 'Detail Transaksi',
            'data' => $this->db->query("SELECT * FROM transaksi where kode_transaksi='$kode_penjualan'"),
        );
        $this->load->view('Pemesanan/v_detail_pemesanan',$data);
    }


    public function simpan_penjualan()
    {
        $kode_penjualan = $this->input->post('kode_penjualan');
        $total_harga = $this->input->post('total_harga');
        $tgl_penjualan = $this->input->post('tgl_penjualan');
        // $pelanggan = $this->input->post('pelanggan');

        foreach ($this->cart->contents() as $items) {
            $kode_barang = $items['id'];
            $qty = $items['qty'];
            $d = array(
                'kode_transaksi' => $kode_penjualan,
                'kode_barang' => $kode_barang,
                'qty' => $qty,
            );
            $this->db->insert('detail_transaksi', $d);
            //$this->db->query("UPDATE menu SET satuan=satuan-'$qty' WHERE kode_menu='$kode_barang'");
        }

        $data = array(
            //'nama_pelanggan' => $pelanggan,
            'kode_transaksi'=> $kode_penjualan,
            'total_harga'=> $total_harga,
            'tgl_transaksi'=> $tgl_penjualan,
        );
        $this->db->insert('transaksi', $data);
        $this->cart->destroy();
        redirect('Pemesanan/penjualan');
    }


    public function simpan_cart()
    {
        
        $data = array(
            'id'    => $this->input->post('kode_barang'),
            'qty'   => $this->input->post('jumlah'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nabar'),
        );
        $this->cart->insert($data);
        redirect('Pemesanan/tambah_penjualan');
    }

    public function hapus_cart($id)
    {
        
        $data = array(
            'rowid'    => $id,
            'qty'   => 0,
        );
        $this->cart->update($data);
        redirect('Pemesanan/tambah_penjualan');
    }
    

    public function penjualan()
    {
        $data = array(
            'konten' => 'penjualan',
            'judul' => 'Data Transaksi',
        );
        // $this->load->view('Pemesanan/v_all_pemesanan',$data);
        redirect('Pemesanan');
    }

    public function pemesanan_supplier()
    {
        $data = array(
            'konten' => 'pesanan_supplier',
            'judul' => 'Data Pemesanan Barang ke Supplier',
        );
        $this->load->view('v_index',$data);
    }

    public function cek_barang()
    {
        $kode_barang = $this->input->post('kode_barang');
        $cek = $this->db->query("SELECT * FROM barang WHERE kode_barang='$kode_barang'")->row();
        $data = array(
            'stok' => $cek->stok,
            'harga' => $cek->harga,
            'kode_barang' => $cek->kode_barang,
            'nama_barang' => $cek->nama_barang,
        );
        echo json_encode($data);
    }


}
