<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Waccount extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        redirect('waccount/lists');
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'weixin_id',
                'label' => 'Weixin ID',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'weixin_name',
                'label' => 'Weixin Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'token',
                'label' => 'Token',
                'rules' => 'trim'
            )
        ));
        if($this->form_validation->run() == FALSE){
            $weixin = array(
                    'id' => 0,
                    'alias' => '',
                    'weixin_name' => '',
                    'weixin_id' => '',
                    'token' => '',
                    'is_service' => '',
                    'app_key' => '',
                    'app_secret' => ''
                );
            $this->template->build('waccount_create_form',array('weixin'=>$weixin));
        }else{
            $this->load->model('m_waccount');
            $id = $this->m_waccount->create($this->input->post(NULL,TRUE));
            if($id){
                redirect('waccount/help/'.$id);
            }else{
                exit('error');
            }
        }
    }

    function edit(){
        $id = $this->uri->segment(3);
        if(!$id){
            $this->template->build('waccount_edit_error');
            return;
        }
        $this->load->model('m_waccount');
        $weixin = $this->m_waccount->getWeixinAccount($id);
        if(!$weixin){
            $this->template->build('waccount_edit_error');
            return;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'weixin_id',
                'label' => 'Weixin ID',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'weixin_name',
                'label' => 'Weixin Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'token',
                'label' => 'Token',
                'rules' => 'trim'
            )
        ));
        if($this->form_validation->run() == FALSE){
            $this->template->build('waccount_create_form',array('weixin'=>$weixin));
        }else{
            $this->m_waccount->update($this->input->post(NULL,TRUE));
            redirect('waccount/help/'.$id);
        }
    }

    function lists(){
        $this->load->model('m_waccount');
        $accounts = $this->m_waccount->getLists();
        if($accounts){
            $this->template->build('waccount_lists',array('accounts'=>$accounts));
        }else{
            $this->template->build('waccount_lists_error');
        }
    }

    function help(){
        $id = $this->uri->segment(3);
        if($id){
            $this->load->model('m_waccount');
            $weixin_account = $this->m_waccount->getWeixinAccount($id);
            if($weixin_account){
                $data = array(
                    'token' => $weixin_account['token'],
                    'url' => site_url('weixin/'.$weixin_account['flag']),
                    'alias' => $weixin_account['alias'],
                    'weixin_name' => $weixin_account['weixin_name'],
                    'weixin_id' => $weixin_account['weixin_id'],
                    'is_service' => $weixin_account['is_service']
                );
            }else{
                $data = FALSE;
            }
        }else{
            $data = FALSE;
        }
        $this->template->build('waccount_help',array('weixin'=>$data));
    }

    function del(){
        $id = $this->uri->segment(3);
        if(!$id){
            exit;
        }
        $this->load->model('m_waccount');
        $this->m_waccount->del($id);
        redirect('waccount/lists');
    }


    function manage(){
        $id = $this->uri->segment(3);
        $this->load->model('m_waccount');
        $weixin = $this->m_waccount->getWeixinAccount($id);
        if($weixin){
            $session = array(
                'id' => $weixin['id'],
                'alias' => $weixin['alias'],
                'weixin_name' => $weixin['weixin_name'],
                'weixin_id' => $weixin['weixin_id'],
                'is_service' => $weixin['is_service']
            );
            $this->session->set_userdata('weixin',$session);
        }
        redirect('waccount/lists');
    }
}

/* End of file waccount.php */
/* Location: ./application/controllers/waccount.php */