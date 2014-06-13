<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

    protected $_check_valid;

    public function __construct()
    {
        parent::__construct();
        
    }

    function login($data){
        $query = "select id,username,is_valid,multi,type from user where username=? and password = md5(concat(?,salt))";
        $rs = $this->db->query($query,array($data['username'],$data['password']));
        if($rs->num_rows() > 0){
            $user = $rs->row_array();
            $session_data['user'] = $user;
            $q = "select id,alias,weixin_name,weixin_id,flag,is_service,app_key,app_secret from weixin_account where uid = {$user['id']} order by id asc";
            $r = $this->db->query($q);
            if($r->num_rows() > 0){
                $session_data['weixin'] = $r->row_array();
            }
            $session_data['weixin_num'] = $r->num_rows();
            $session_data['logged'] = TRUE;
            $this->session->set_userdata($session_data);
            return TRUE;
        }
        return FALSE;
    }

    function create($data){
        if( $this->_checkValid($data['username'],$data['email']) !== TRUE){
            return $this->_check_valid;
        }
        $this->load->helper('string');
        $n = rand(6,20);
        $salt = random_string('alnum',$n);
        $insert_data = array(
            'username' => $data['username'],
            'password' => md5($data['password'].$salt),
            'salt' => $salt,
            'email' => $data['email'],
            'email_valid' => random_string('unique'),
            'is_valid' => 1,
            'multi' => $data['multi'],
            'type' => 1
        );
        $this->db->insert('user',$insert_data);
        return $this->db->insert_id();
    }

    function _checkValid($username,$email){
        $query = "select username,email from user where username = ? or email = ?";
        $rs = $this->db->query($query,array($username,$email));
        if($rs->num_rows() > 0){
            $this->_check_valid = ($username == $rs->row()->username)? -1 : -2;
            return $this->_check_valid;
        }
        return TRUE;
    }

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */