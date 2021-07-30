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

class Article extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('article_model');
    }

    public function index_get()
    {
      
        $id = $this->get('id');

        if ( $id === null )
        {
            $article = $this->article_model->get_article();

            // Check if the users data store contains users
            if ( isset($article) )
            {
                // Set the response and exit
                $this->response( $article, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status'    => false,
                    'message'   => 'No article were found'
                ], 404 );
            }
        }
        else
        {
            echo 'tes';
            $article = $this->article_model->get_article_id($id);

            if ( isset( $article ) )
            {
                $this->response( $article, 200 );
            }
            else
            {
                $this->response( [
                    'status'    => false,
                    'message'   => 'No such article found'
                ], 404 );
            }
        }
    }

    public function edit_get()
    {
        $id = $this->get('id');

        $article = $this->article_model->get_article_id($id);

        if ( isset( $article ) )
        {
            $this->response( $article, 200 );
        }
        else
        {
            $this->response( [
                'status'    => false,
                'message'   => 'No such article found'
            ], 404 );
        }
    }


    public function store_post()
    {
        $this->form_validation->set_rules("title", "Title", "trim|required");
        $this->form_validation->set_rules("category", "Category", "trim|required");
        $this->form_validation->set_rules("content", "Content", "required");
        $this->form_validation->set_rules("authors", "Authors", "trim|required");

        if($this->form_validation->run() != false) {

            $data = [
                'title'         => $this->post('title'),
                'category'      => $this->post('category'),
                'content'       => $this->post('content'),
                'authors'       => $this->post('authors'),
                'created_at'    => date('Y-m-d H:i:s'),
            ];

            $insert = $this->article_model->article_store($data);

            if ($insert) {
                $this->response( [
                    'status'    => true,
                    'message'   => 'article was created !'
                ], 200 );
            } else {
                $this->response( [
                    'status'    => false,
                    'message'   => 'article not created !'
                ], 200 );
            }

        }else{

            $this->response( [
                'status'    => false,
                'message'   => 'article not created !',
                'errors'    => validation_errors()
            ], 200 );
        }
    }

    public function update_post()
    {
        $this->form_validation->set_rules("title", "Title", "trim|required");
        $this->form_validation->set_rules("category", "Category", "trim|required");
        $this->form_validation->set_rules("content", "Content", "required");
        $this->form_validation->set_rules("authors", "Authors", "trim|required");
        $this->form_validation->set_rules("id", "ID", "required");

        if($this->form_validation->run() != false) {

            $data = [
                'title'         => $this->post('title'),
                'category'      => $this->post('category'),
                'content'       => $this->post('content'),
                'authors'       => $this->post('authors'),
                'created_at'    => date('Y-m-d H:i:s'),
            ];

            $update = $this->article_model->article_update($data, $this->post('id'));

            if ($update) {
                $this->response( [
                    'status'    => true,
                    'message'   => 'article was updated !'
                ], 200 );
            } else {
                $this->response( [
                    'status'    => false,
                    'message'   => 'article not updated !'
                ], 200 );
            }

        }else{

            $this->response( [
                'status'    => false,
                'message'   => 'article not updated !',
                'errors'    => validation_errors()
            ], 200 );
        }
    }

    public function delete_get()
    {
        $id = $this->get('id');

        if(!empty($id))
        {
            $article = $this->article_model->get_article_id($id);

            if ( isset( $article ) )
            {
                $this->article_model->delete($id);
                $this->response( [
                    'status'    => true,
                    'message'   => 'article was deleted !'
                ], 200 );
            }
            else
            {
                $this->response( [
                    'status'    => false,
                    'message'   => 'No such article found'
                ], 404 );
            }
        }
        else
        {
            $this->response( [
                'status'    => false,
                'message'   => 'No such article found'
            ], 404 );
        }
    }
}