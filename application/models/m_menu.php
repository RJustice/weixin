<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Menu extends CI_Model {

    protected $wid;
    protected $app_key;
    protected $app_secret;
    protected $buttons_data;

    public function __construct()
    {
        parent::__construct();
        $this->wid = $this->session->userdata('weixin.flag');
        $this->app_key = $this->session->userdata('weixin.app_key');
        $this->app_secret = $this->session->userdata('weixin.app_secret');
    }

    function create($menus){
        $q = "delete from menu where wid = ?";
        $this->db->query($q,array($this->wid));
        foreach($menus as $num=>$menu){
            $button = array();
            $insert_data = array();
            $button['name'] = $menu['btn'];
            $insert_data = array(
                'wid' => $this->wid,
                'menu' => $menu['btn'],
                'pid' => 0,
                'level' => 0,
                'type' => '',
                'key' => '',
                'url' => '',
                'state' => 1
            );
            $this->db->insert('menu',$insert_data);
            $pid = $this->db->insert_id();
            if(is_array($menu['sub_menu']) && !empty($menu['sub_menu'])){
                foreach($menu['sub_menu'] as $k=>$s){
                    $insert_data = array();
                    $insert_data = array(
                        'wid' => $this->wid,
                        'menu' => $s,
                        'pid' => $pid,
                        'level' => 1,
                        'type' => $menu['sub_menu_type'][$k],
                        'state' => 1
                    );
                    if($menu['sub_menu_type'][$k] == 'click'){
                        $button['sub_button'][] = array(
                            'name' => $s,
                            'type' => 'click',
                            'key' => $menu['sub_menu_key'][$k]
                        );
                        $insert_data['key'] = $menu['sub_menu_key'][$k];
                    }elseif($menu['sub_menu_type'][$k] == 'view'){
                        $button['sub_button'][] = array(
                            'name' => $s,
                            'type' => 'view',
                            'url' => $menu['sub_menu_key'][$k]
                        );
                        $insert_data['url'] = $menu['sub_menu_key'][$k];
                    }
                    $this->db->insert('menu',$insert_data);
                }
            }else{
                $button['type'] = 'click';
                $button['key'] = 'MAIN_'.strtoupper($num);
            }
            $buttons[] = $button;
        }
        $result = $this->_weixin_menu(json_encode(array('button'=>$buttons)));
        return $result;
    }

    function getMenus(){
        $query = "select * from menu where wid = ? order by id asc";
        $rs = $this->db->query($query,array($this->wid));
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return array();
    }

    function _format_buttons_data(){
        
    }

    function _weixin_menu($data){
        $this->load->library('rest');
        if($this->session->userdata('access_token') && $this->session->userdata('access_token.expires_in') > (time() - $this->session->userdata('access_token.create'))){
            $token = $this->session->userdata('access_token.token');
        }else{
            $this->rest->server('https://api.weixin.qq.com/cgi-bin/');
            $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
            $tparams['grant_type'] = 'client_credential';
            $tparams['appid'] = $this->app_key;
            $tparams['secret'] = $this->app_secret;
            $response = $this->rest->get('token',$tparams,'json');
            $token = $response['access_token'];
            $expires_in = $response['expires_in'];
            $this->session->set_userdata(array('access_token'=>array('token'=>$token,'expires_in'=>$expires_in,'create'=>time())));
        }         
        $this->rest->server('https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$token);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $r = $this->rest->post('',$data,'json');
        if($r['errcode'] == 0){
            return TRUE;
        }else{
            return $r;
        }
    }

}

/* End of file m_menu.php */
/* Location: ./application/models/m_menu.php */