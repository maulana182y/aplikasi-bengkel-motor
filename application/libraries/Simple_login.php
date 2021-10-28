 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Simple_login {
 
     // SET SUPER GLOBAL
     var $CI = NULL;
     public function __construct() {
         $this->CI =& get_instance();
     }
 
     public function login($username, $password) {
         //cek username dan password
         $query  = $this->CI->db->query("SELECT * FROM tb_users where username = ? and password = ? ",array($username,$password));
         if($query->num_rows() == 1) {
             //ambil data user berdasar username
             $row  = $this->CI->db->query('SELECT * FROM tb_users where username = ? ',array($username));
             $admin     = $row->row();
             $id   = $admin->id;
             
             //set session user
             $this->CI->session->set_userdata('username', $username);
             $this->CI->session->set_userdata('id_login', uniqid(rand()));
             $this->CI->session->set_userdata('id', $id);
             $this->CI->session->set_userdata('role', $admin->role);
 
             //redirect ke halaman dashboard
             redirect(site_url('Home'));
         }else{
                // script untuk menampilkan notif username dan password salah
            ?>
                <script type="text/javascript">
                    alert('Username dan password kamu salah !');
                    window.location="<?php echo base_url('Auth'); ?>";
                </script>
                <?php
 
             //jika tidak ada, set notifikasi dalam flashdata.
             // $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');
 
             //redirect ke halaman login
             // redirect(site_url('Auth'));
         }
          return false;
      }
     
     /**
      * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
      * login
      */
     public function cek_login() {
 
         //cek session username
         if($this->CI->session->userdata('username') == '') {
 
             //set notifikasi
             $this->CI->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('Auth'));
         }
     }
 
     /**
      * Hapus session, lalu set notifikasi kemudian di alihkan
      * ke halaman login
      */
     public function logout() {
         $this->CI->session->unset_userdata('username');
         $this->CI->session->unset_userdata('id_login');
         $this->CI->session->unset_userdata('id');
         $this->CI->session->unset_userdata('role');
         $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
         redirect(site_url('Auth'));
     }
 }
