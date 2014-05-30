<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cat extends CI_Model {

    protected $wid;

    public function __construct()
    {
        parent::__construct();
        $this->wid = $this->session->userdata('weixin.flag');
    }

    function create($data){
        $this->load->helper('array');
        $cat = elements(array('cat_name'),$data);
        $cat['create_time'] = time();
        $cat['wid'] = $this->wid;
        $this->db->insert('cat',$cat);
        return $this->db->insert_id();
    }

    function lists(){
        $query = "select * from cat where wid = ? order by id asc";
        $rs = $this->db->query($query,array($this->wid));
        if($rs->num_rows() > 0 ){
            return $rs->result_array();
        }
        return FALSE;
    }

    function get($id){
        $query = "select * from cat where id = ? and wid = ?";
        $rs = $this->db->query($query,array($id,$this->wid));
        if($rs->num_rows() > 0){
            return $rs->row_array();
        }
        return FALSE;
    }

    function update($data){
        $this->load->helper('array');
        $cat = elements(array('cat_name'),$data);
        $this->db->update('cat',$cat,array('id'=>$data['id'],'wid'=>$this->wid));
        return $this->db->affected_rows();
    }

}

/* End of file m_cat.php */
/* Location: ./application/models/m_cat.php */