<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fun_menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        redirect(site_url('fun_menu/lists'));
    }

    function lists(){
        $this->template->build('fun_menu_lists');
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ),
        ));
        if($this->form_validation->run() == FALSE){
            $this->template->build('fun_menu_create_form');
        }else{
            echo 1;
        }
    }

}

/* End of file fun_menu.php */
/* Location: ./application/controllers/fun_menu.php */