<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        redirect(site_url('cat/lists'));
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'cat_name',
                'label' => 'Category Name',
                'rules' => 'trim|required'
            ),
        ));
        if($this->form_validation->run() == FALSE){
            $this->template->build('cat_add_form',array('cat'=>array('id'=>0,'cat_name'=>'')));
        }else{
            $this->load->model('m_cat');
            $cid = $this->m_cat->create($this->input->post(NULL,TRUE));
            if($cid){
                redirect(site_url('cat/lists'));
            }else{
                $this->template->build('database_error',array('referred_url'=>current_url()));
            }
        }
    }

    function edit(){
        $id = $this->uri->segment(3);
        if( ! $id ){
            exit();
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'cat_name',
                'label' => 'Category Name',
                'rules' => 'trim|required'
            ),
        ));
        $this->load->model('m_cat');
        $cat = $this->m_cat->get($id);
        if( ! $cat ){
            $this->template->build('cat_edit_error');
            return;
        }
        if($this->form_validation->run() == FALSE){
            $this->template->build('cat_add_form',array('cat'=>$cat));
        }else{
            $cid = $this->m_cat->update($this->input->post(NULL,TRUE));
            if($cid){
                redirect(site_url('cat/lists'));
            }else{
                $this->template->build('database_error',array('referred_url'=>current_url()));
            }
        }
    }

    function lists(){
        $this->load->model('m_cat');
        $cats = $this->m_cat->lists();
        if($cats){
            $this->template->build('cat_lists',array('cats'=>$cats));
        }else{
            $this->template->build('cat_lists_no_items');
        }
    }

}

/* End of file cat.php */
/* Location: ./application/controllers/cat.php */