<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_keyword extends CI_Model {

    protected $wid;

    public function __construct()
    {
        parent::__construct();
        $this->wid = $this->session->userdata('weixin.flag');
    }

    function getLists(){
        $query = "select * from keyword where wid = ?";
        $rs = $this->db->query($query,array($this->wid));
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return FALSE;
    }

    function create($data){
        $this->load->helper('array');
        $insert_data = $data;
        $insert_data['wid'] = $this->wid;
        $this->db->insert('keyword',$insert_data);
        return $this->db->insert_id();
    }

}

/* End of file m_keyword.php */
/* Location: ./application/models/m_keyword.php */