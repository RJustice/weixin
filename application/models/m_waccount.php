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
    }

    function del($id){
        $query = "delete from weixin_account where id = ? and uid = ?";
        $this->db->query($query,array($id,$this->session->userdata('user.id')));
    }
}

/* End of file m_waccount.php */
/* Location: ./application/models/m_waccount.php */