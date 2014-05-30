<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'menu',
                'label' => 'Menu Title',
                'rules' => 'trim|required'
            )
        ));
        if($this->input->post('type') == 'view'){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'url',
                    'label' => 'Web Link',
                    'rules' => 'required'
                )
            ));
        }
        if($this->form_validation->run() == FALSE){
            $this->template->build('menu_create_form');
        }else{
            $this->load->model('m_menu');
            
        }
    }

    function index(){
        $this->load->model('m_waccount');
        // $weixin = $this->m_waccount->getWexin($this->session->userdata());
        $this->template->build('menu_custom');
    }
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */