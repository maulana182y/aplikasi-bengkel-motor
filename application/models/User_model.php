<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function get_all_users()
    {
        $query = $this->db->query('SELECT * FROM tb_users');
        return $query->result();
    }
    function add_user($username, $nama, $role, $password)
    {
        $data = array(

            'username' => $username,
            'nama' => $nama,
            'role' => $role,
            'password' => md5($password),
            'active' => '1'
        );
        $output = $this->db->insert('tb_users', $data);
        return $output;
    }
    function get_edit_user($id)
    {
        $query = $this->db->query("SELECT * from tb_users where id='$id'");
        return $query->result();
    }

    function edit_user($id, $username, $nama, $role, $password)
    {
        $data = array(
            'username' => $username,
            'nama' => $nama,
            'role' => $role,
            'password' => md5($password)
        );
        $this->db->where('id', $id);
        $output = $this->db->update('tb_users', $data);
        return $output;
    }

    function get_delete_user($id)
    {
        $query = $this->db->query("DELETE from tb_users where id='$id'");
        return TRUE;
    }

    function delete_user($id, $username, $nama, $role)
    {
        $data = array(
            'username' => $username,
            'nama' => $nama,
            'role' => $role
        );
        $this->db->where('id', $id);
        $output = $this->db->delete('tb_users', $data);
        return $output;
    }

    function activateUser($value)
    {
        $data = array(
            'active' => $value['value']
        );
        $this->db->where('id', $value['id']);
        $output = $this->db->update('tb_users', $data);
        return $output;
    }

    function total_user() {
        $this->db->like('id');
        $this->db->or_like('username');
        $this->db->or_like('nama');
        $this->db->or_like('role');
        $this->db->or_like('active');
        $this->db->from('tb_users');
        return $this->db->count_all_results();
    }
}
