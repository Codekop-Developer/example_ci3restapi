<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $category = url_get_api(base_url('api/category/index'));

        $this->data = [
            'title'     => 'CodeIgniter RestServer',
            'file'      => 'home/index',
            'category'  => $category
        ];

        $this->load->view('template', $this->data);
    }
    
    public function article()
    {
        $article  = url_get_api(base_url('api/article/index'));
        $category = url_get_api(base_url('api/category/index'));

        $this->data = [
            'article'   => $article,
            'category'  => $category
        ];

        $this->load->view('home/tabel', $this->data);
    }

    public function category()
    {
        $this->data = [
            'title'     => 'CodeIgniter RestServer',
            'file'      => 'category/index',
        ];

        $this->load->view('template', $this->data);
    }

    public function data_category()
    {
        $category = url_get_api(base_url('api/category/index'));
        $this->data = [
            'category'  => $category
        ];
        $this->load->view('category/tabel', $this->data);
    }
}