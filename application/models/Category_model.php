<?php
if(! defined('BASEPATH')) exit('No direct script acess allowed');
/**
 * 
 * Author    : Fauzan Falah
 * apps      : CodeIgniter RestServer
 * Website   : https://www.codekop.com/
 * 
 * 
 * 
 * 
 */
class Category_model extends CI_Model
{

    public function get_category()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('id', 'DESC');

        return $this->db->get()->result();
    }

    public function get_category_id($id)
    {
        return $this->db->get_where('category',['id' => (int)$id])->row();
    }

    public function category_store($data = array())
    {
        return $this->db->insert('category', $data);
    }

    public function category_update($data = array(), $id)
    {
        $this->db->where('id', (int)$id);
        return $this->db->update('category', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('category',['id' => (int)$id]);
    }
}