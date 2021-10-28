<?php
class Home_model extends CI_Model
{

    function get_user_data($userid)
    {
        $query = $this->db->query("SELECT * from tb_users where username=? ", array($userid));
        return $query->result();
    }
}
