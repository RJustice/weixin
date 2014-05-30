<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_article extends CI_Model {

    protected $wid;

    public function __construct()
    {
        parent::__construct();
        $this->wid = $this->session->userdata('weixin.flag');
    }

    function getLists(){
        $query = "select a.id aid,a.title,a.created,c.cat_name,c.id cid from article a left join cat c on a.cid = c.id where a.wid = ?";
        $rs = $this->db->query($query,array($this->wid));
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return FALSE;
    }

    function getListsByCid($cid){
        $query = "select a.id aid,a.title,a.created,c.cat_name,c.id cid from article a left join cat c on a.cid = c.id where a.cid = ? and a.wid = ?";
        $rs = $this->db->query($query,array($cid,$this->wid));
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return FALSE;
    }

    function create($data){
        $this->load->helper('array');
        $insert_data = elements(array('title','content','cid','imgs'),$data);
        $insert_data['created'] = time();
        $insert_data['wid'] = $this->wid;
        $this->db->insert('article',$insert_data);
        return $this->db->insert_id();
    }

    function get($id){
        $query = "select * from article where id = ? and wid = ?";
        $rs = $this->db->query($query,array($id,$this->wid));
        if($rs->num_rows() > 0){
            return $rs->row_array();
        }
        return FALSE;
    }

    function update($data){
        $this->load->helper('array');
        $insert_data = elements(array('title','content','cid','imgs'),$data);
        $this->db->update('article',$insert_data,array('id'=>$data['id'],'wid'=>$this->wid));
    }

    function ajaxListsByCid($cid){
        $query = "select id,title,imgs from article where cid = ? and wid = ?";
        $rs = $this->db->query($query,array($cid,$this->wid));
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $imgs = unserialize($row['imgs']);
                $articles[] = array(
                        'title' => $row['title'],
                        'id' => $row['id'],
                        'img' => isset($imgs[0])?$imgs[0]:base_url('data/360x200.jpg')
                    );
            }
            return $articles;
        }
        return array();
    }

    function getByIDs($ids){
        $this->db->select('id,title,description,imgs');
        $this->db->from('article');
        $this->db->where_in('id',$ids);
        $this->db->where('wid',$this->wid);
        $rs = $this->db->get();
        if($rs->num_rows() >0){
            foreach($rs->result_array() as $row){
                $imgs = unserialize($row['imgs']);
                $articles[] = array(
                        'title' => $row['title'],
                        'id' => $row['id'],
                        'description' => $row['description'],
                        'imgs' => isset($imgs[0])?$imgs:array(base_url('data/360x200.jpg'))
                    );
            }
            return $articles;
        }
        return array();
    }
}

/* End of file m_article.php */
/* Location: ./application/models/m_article.php */