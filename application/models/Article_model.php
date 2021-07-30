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
class Article_model extends CI_Model
{

    public function get_article()
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->order_by('id', 'DESC');

        return $this->db->get()->result();
    }

    public function article_store($data = array())
    {
        return $this->db->insert('article', $data);
    }

    public function article_update($data = array(), $id)
    {
        $this->db->where('id', (int)$id);
        return $this->db->update('article', $data);
    }


    public function get_article_id($id)
    {
        return $this->db->get_where('article',['id' => (int)$id])->row();
    }

    public function delete($id)
    {
        return $this->db->delete('article',['id' => (int)$id]);
    }
}