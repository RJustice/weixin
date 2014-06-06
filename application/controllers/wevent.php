<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wevent extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        redirect(site_url('wevent/lists'));
    }

    function lists(){
        $this->template->build('wevent_lists');
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            array(
                
            )
        );
        if($this->form_validation->run() == FALSE){
            $this->template->build('wevent_create_form');
        }else{
            $this->load->model('');
        }
    }

    function edit(){
        
    }




    function cat_create(){
        // is_admin();
        
    }

    function cat_list(){
        // is_admin();
    }

    function cat_edit(){
        // is_admin();
    }

}

/* End of file wevent.php */
/* Location: ./application/controllers/wevent.php */