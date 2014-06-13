<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Waccount extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
    }

    function create($data){
        if(empty($data['token'])){
            $this->load->helper('string');
            $data['token'] = random_string('alnum',32);
        }
        $this->load->helper('array');
        $insert_data = elements(array('alias','token','weixin_name','weixin_id','is_service','app_key','app_secret'),$data);
        $insert_data['flag'] = md5(time());
        $insert_data['uid'] = $this->session->userdata('user.id');
        $this->db->insert('weixin_account',$insert_data);
        $d = elements(array('id','alias','weixin_name','weixin_id','flag','is_service','app_key','app_secret'),$insert_data);
        $d['id'] = $this->db->insert_id();
        $this->_update_session('create',$d);
        return $this->db->insert_id();
    }

    function getWeixinAccount($id){
        $query = "select * from weixin_account where id = ? and uid = ?";
        $rs = $this->db->query($query,array($id,$this->session->userdata('user.id')));
        if($rs->num_rows() > 0){
            return $rs->row_array();
        }
        return FALSE;
    }

    function getLists(){
        $query = "select * from weixin_account where uid = ?";
        $rs = $this->db->query($query,array($this->session->userdata('user.id')));
        if($rs->num_rows() >0){
            return $rs->result_array();
        }
        return FALSE;
    }

    function checkWeixinByToken($token){
        $query = "select id,token from weixin_account where flag = ? and uid = ?";
        $rs = $this->db->query($query,array($token,$this->session->userdata('user.id')));
        if($rs->num_rows() > 0){
            return $rs->row_array();
        }
        return FALSE;
    }

    function update($data){
        $this->load->helper('array');
        $update_data = elements(array('alias','token','weixin_name','weixin_id','is_service','app_key','app_secret'),$data);
        $this->db->update('weixin_account',$update_data,array('id'=>$data['id'],'uid'=>$this->session->userdata('user.id')));
        $this->_update_session('edit',array('id'=>$data['id']));
    }

    function del($id){
        $query = "delete from weixin_account where id = ? and uid = ?";
        $this->db->query($query,array($id,$this->session->userdata('user.id')));
        $this->_update_session('del',array('id'=>$id));
    }

    function _update_session($type,$data = array()){
        switch($type){
            case 'create':
                if($this->session->userdata('weixin_num') == 0){
                    $session_data['weixin_num'] = 1;
                    $session_data['weixin'] = $data;
                    $this->session->set_userdata($session_data);
                }
                break;
            case 'edit':
                if($data['id'] == $this->session->userdata('weixin.id')){
                    $query = "select id,alias,weixin_name,weixin_id,flag,is_service,app_key,app_secret from weixin_account where id={$data['id']}";
                    $rs = $this->db->query($query);
                    $session_data['weixin'] = $rs->row_array();
                    $this->session->set_userdata($session_data);
                }
                break;
            case 'del':
                if($data['id'] == $this->session->userdata('weixin.id')){
                    $query = "select id,alias,weixin_name,weixin_id,flag,is_service,app_key,app_secret from weixin_account where uid = {$this->session->userdata('user.id')} order by id asc limit 1";
                    $rs = $this->db->query($query);
                    if($rs->num_rows() > 0){
                        $session_data['weixin_num'] = 1;
                        $session_data['weixin'] = $rs->row_array();
                    }else{
                        $session_data['weixin_num'] = 0;
                    }
                    $this->session->set_userdata($session_data);   
                }
                break;
        }
    }
}

/* End of file m_waccount.php */
/* Location: ./application/models/m_waccount.php */