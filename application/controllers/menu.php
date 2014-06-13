<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    function index(){
        redirect('menu/view');
    }

    function modify(){
        if($this->session->userdata('weixin.app_key') == ''){
            $this->template->build('menu_has_no_appkey');
            return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'btn[0]',
                'label' => 'Menu One Title',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'btn[1]',
                'label' => 'Menu Two Title',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'btn[2]',
                'label' => 'Menu Three Title',
                'rules' => 'trim|required'
            ),
        ));
        $btn = $this->input->post('btn');
        $one = array(
            'btn' => $btn[0],
            'sub_menu' => $this->input->post('btn_one'),
            'sub_menu_type' => $this->input->post('menu_one_type'),
            'sub_menu_key' => $this->input->post('menu_one_type_key')
        );
        $two = array(
            'btn' => $btn[1],
            'sub_menu' => $this->input->post('btn_two'),
            'sub_menu_type' => $this->input->post('menu_two_type'),
            'sub_menu_key' => $this->input->post('menu_two_type_key')
        );
        $three = array(
            'btn' => $btn[2],
            'sub_menu' => $this->input->post('btn_three'),
            'sub_menu_type' => $this->input->post('menu_three_type'),
            'sub_menu_key' => $this->input->post('menu_three_type_key')
        );    
    
        
        if(!empty($one['sub_menu'])){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'btn_one[]',
                    'label' => 'Sub One',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'menu_one_type_key[]',
                    'label' => 'Key Or Url',
                    'rules' => 'trim|required'  
                )
            ));
        }
        if(!empty($two['sub_menu'])){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'btn_two[]',
                    'label' => 'Sub Two',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'menu_two_type_key[]',
                    'label' => 'Key Or Url',
                    'rules' => 'trim|required'  
                )
            ));
        }
        if(!empty($three['sub_menu'])){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'btn_three[]',
                    'label' => 'Sub Three',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'menu_three_type_key[]',
                    'label' => 'Key Or Url',
                    'rules' => 'trim|required'  
                )
            ));
        }

        $this->load->model('m_menu');

        if($this->form_validation->run() == FALSE){
            $menus = $this->m_menu->getMenus();
            $tmp = array('one','two','three');
            $i = -1;
            foreach($menus as $menu){
                if($menu['level'] == 0){
                    $i++;
                    ${$tmp[$i]}['btn'] = $menu['menu'];
                }else{
                    ${$tmp[$i]}['sub_menu'][] = $menu['menu'];
                    ${$tmp[$i]}['sub_menu_type'][] = $menu['type'];
                    ${$tmp[$i]}['sub_menu_key'][] = $menu['type'] == 'click'? $menu['key']:$menu['url'];
                }
            }
            $this->template->build('menu_custom',array('one'=>$one,'two'=>$two,'three'=>$three));
        }else{
            $r = $this->m_menu->create(array('one'=>$one,'two'=>$two,'three'=>$three));
            if($r === TRUE){
                redirect('menu/view');
            }else{
                $this->template->build('menu_create_has_error',array('error'=>$r));
            }
        }
    }

    function view(){
        $this->load->model('m_menu');
        $menus = $this->m_menu->getMenus();
        $this->template->build('menu_view',array('menus'=>$menus));
    }

    function del(){
        $this->load->model('m_menu');
        $this->m_menu->del();
        redirect(site_url('menu/view'));
    }
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */