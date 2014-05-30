<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function login(){
        $refer_uri = $this->uri->segment(3);
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|md5'
            )
        ));
        if($this->form_validation->run() == FALSE){
            $this->template->build('user_login_form',array('ref'=>$refer_uri));
        }else{
            $this->load->model('m_user');
            $check = $this->m_user->login($this->input->post(NULL,TRUE));
            if($check){
                if( ! $this->input->post('ref',TRUE)){
                    redirect(site_url('waccount'));
                }else{
                    redirect(base64_decode($this->input->post('ref',TRUE)));
                }
            }else{
                $this->template->build('user_login_form',array('ref'=>$refer_uri));
            }
        }
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|match[pwdconf]|md5'
            ),
            array(
                'field' => 'pwdconf',
                'label' => 'Password Confirmation',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'multi',
                'label' => 'Multi',
                'rules' => 'trim|integer'
            ),
        ));
        if($this->form_validation->run() == FALSE){
            $this->template->build('user_create_form',array('error'=>0));
        }else{
            $this->load->model('m_user');
            $id = $this->m_user->create($this->input->post(NULL,TRUE));
            if($id > 0){
                redirect(site_url('user/lists'));
            }else{
                $this->template->build('user_create_form',array('error'=>$id));
            }
        }
    }

    function lists(){
        $this->template->build('user_lists');
    }

    function edit(){

    }

    function logout(){
        $this->session->sess_destroy();
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */