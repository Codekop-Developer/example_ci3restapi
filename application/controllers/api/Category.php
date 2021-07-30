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
use chriskacerguis\RestServer\RestController;

class Category extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index_get()
    {
        $category = $this->category_model->get_category();

        // Check if the users data store contains users
        if ( isset($category) )
        {
            // Set the response and exit
            $this->response( $category, 200 );
        }
        else
        {
            // Set the response and exit
            $this->response( [
                'status'    => false,
                'message'   => 'No category were found'
            ], 404 );
        }
    }

    public function edit_get()
    {
        $id = $this->get('id');

        $category = $this->category_model->get_category_id($id);

        if ( isset( $category ) )
        {
            $this->response( $category, 200 );
        }
        else
        {
            $this->response( [
                'status'    => false,
                'message'   => 'No such category found'
            ], 404 );
        }
    }


    public function store_post()
    {
        $this->form_validation->set_rules("category", "Category", "trim|required");

        if($this->form_validation->run() != false) {

            $data = [
                'category'      => $this->post('category'),
                'created_at'    => date('Y-m-d H:i:s'),
            ];

            $insert = $this->category_model->category_store($data);

            if ($insert) {
                $this->response( [
                    'status'    => true,
                    'message'   => 'category was created !'
                ], 200 );
            } else {
                $this->response( [
                    'status'    => false,
                    'message'   => 'category not created !'
                ], 200 );
            }

        }else{

            $this->response( [
                'status'    => false,
                'message'   => 'category not created !',
                'errors'    => validation_errors()
            ], 200 );
        }
    }

    public function update_post()
    {
        $this->form_validation->set_rules("category", "Category", "trim|required");
        $this->form_validation->set_rules("id", "ID", "required");

        if($this->form_validation->run() != false) {

            $data = [
                'category'      => $this->post('category'),
                'created_at'    => date('Y-m-d H:i:s'),
            ];

            $update = $this->category_model->category_update($data, $this->post('id'));

            if ($update) {
                $this->response( [
                    'status'    => true,
                    'message'   => 'category was updated !'
                ], 200 );
            } else {
                $this->response( [
                    'status'    => false,
                    'message'   => 'category not updated !'
                ], 200 );
            }

        }else{

            $this->response( [
                'status'    => false,
                'message'   => 'category not updated !',
                'errors'    => validation_errors()
            ], 200 );
        }
    }

    public function delete_get()
    {
        $id = $this->get('id');

        if(!empty($id))
        {
            $category = $this->category_model->get_category_id($id);

            if ( isset( $category ) )
            {
                $this->category_model->delete($id);
                $this->response( [
                    'status'    => true,
                    'message'   => 'category was deleted !'
                ], 200 );
            }
            else
            {
                $this->response( [
                    'status'    => false,
                    'message'   => 'No such category found'
                ], 404 );
            }
        }
        else
        {
            $this->response( [
                'status'    => false,
                'message'   => 'No such category found'
            ], 404 );
        }
    }
}