<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Wmember extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    function memberSubscribe($data){
        $openID = $data['FromUserName'];
        $wid = $data['ToUserName'];
        $insert_data = array(
            'wid' => $wid,
            'user_token' => $openID,
            'sub_time' => time(),
            'sub_event' => isset($data['EventKey'])?$data['EventKey']:''
        );
        $this->db->insert('weixin_member',$insert_data);
    }

}

/* End of file m_wmember.php */
/* Location: ./application/models/m_wmember.php */