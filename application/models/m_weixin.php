<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Weixin extends CI_Model {
    private $_db = NULL;
    
    function __construct(){
        parent::__construct();
    }
    
    function valid(){
        
    }
    
    function checkSign(){
        
    }

    function normalSubscribe($data){
        $this->load->model(array('m_wmember','m_wevent'));
        $wmid = $this->m_wmember->memberSubscribe($data);
        $subscribe_event = $this->m_wevent->checkSubscribeEvent();
        return array('wmid'=>$wmid,'event'=>$subscribe_event);
    }

    function qrsceneSubsribe($data){
        $this->load->model(array('m_wmember','m_wevent'));
        $wmember = $this->m_wmember->memberSubscribe($data);
        $subscribe_event = $this->m_wevent->checkQRSubscribeEvent();
    }

    function responseText($data,$token){
        $keyword = $data['Content'];
        $reply = array(
            'ToUserName' => $data['FromUserName'],
            'FromUserName' => $data['ToUserName']
        );
        $l = mb_strlen($keyword);
        log_message('error','query: '.$keyword);
        $query = "select reply_type,reply_text,flag from keyword where is_fuzzy = 0 and keylength = ? and keyword = '?' and wid = ? order by id desc limit 1";
        log_message('error','query: '.$query);
        $rs = $this->db->query($query,array($l,$keyword,$token));
        log_message('error','query: '.$this->db->last_query());
        if($rs->num_rows() > 0){
            $reply['Content'] = $rs->row()->reply_text;
            $reply['reply_type'] = $rs->row()->reply_type;
        }else{
            $fquery = "select keyword,reply_type,reply_text,flag from keyword where is_fuzzy = 1 and keylength < ? and wid = ? ";
            $frs = $this->db->query($fquery,array($l,$token));
            if($frs->num_rows() > 0){
                $sign = FALSE;
                foreach($frs->result_array() as $row){
                    if(strpos($keyword,$row['keyword']) !== FALSE){
                        $reply['Content'] = $row['reply_text'];
                        $reply['reply_type'] = $row['reply_type'];
                        $sign = TRUE;
                        break;
                    }
                }
                if(!$sign){
                    $reply['Content'] = "<Content><![CDATA[Default Msg]]></Content>";
                    $reply['reply_type'] = 'text';
                }
            }else{
                $reply['Content'] = "<Content><![CDATA[Default Msg]]></Content>";
                $reply['reply_type'] = 'text';
            }
        }
        return $reply;

        // $this->load->helper('file');
        // $tag_file = 'data/'.$data['FromUserName'].'_tag.txt';
        // $tag = read_file($tag_file);
        // if($keyword == '校园签到'){
        //     //$data['Text'] = "签到请输入信息:\n姓名+校园园区+宿舍+电话";
        //     write_file($tag_file,'checkin');
        //     $this->load->model('m_check');
        //     $data['Content'] = $this->m_check->check($data);
        // }elseif($tag == 'checkin'){
        //     $this->load->model('m_check');
        //     $data['Content'] = $this->m_check->check($data);
        // }elseif($keyword == '校园介绍'){
        //     $user = json_decode(read_file('data/'.$data['FromUserName'].'.txt'),TRUE);
        //     $school = $user['school'];
        //     write_file($tag_file,'school');
        //     $data['Content'] =  "{$school}介绍:\n1. 园区介绍\n2. 周边介绍\n输入数字查看";
        // }elseif($tag == 'school'){
        //     switch($keyword){
        //         case 1:
        //             $data['Content'] = "园区介绍";
        //             break;
        //         case 2:
        //             $data['Content'] = "周边介绍";
        //             break;
        //         default:
        //             write_file($tag_file,'');
        //             break;
        //     }
        // }else{
        //     // $this->session->set_userdata('user',$data['FromUserName']);
        //     // $data['Content'] = '<a href="'.site_url('weixin/check').'">签到</a>';
        // }
        return $data;
    }


    function response_xml($response){
        $response_obj = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
        switch(strtolower($response_obj->MsgType)){
            case 'text':
               return $this->_response_txt($response_obj);
                break;
            case 'image':
                return $this->_response_img($response_obj);
                break;
            case 'location':
                return $this->_response_location($response_obj);
                break;
            case 'link': 
                return $this->_response_link($response_obj);
                break;
            case 'event':
                return $this->_response_event($response_obj);
                break;
            case 'voice':
                return $this->_response_voice($response_obj);
                break;
            case 'video':
                return $this->_response_video($response_obj);
                break;
        }
    }

    function _response_txt($response){
        $return = array(
            'ToUserName' => $response->ToUserName,
            'FromUserName' => $response->FromUserName,
            'CreateTime' => $response->CreateTime,
            'MsgType' => $response->MsgType,
            'Content' => $response->Content,
            'MsgId' => $response->MsgId,
        );
        return $return;
    }

    function _response_img($response){
        $return = array(
            'ToUserName' => $response->ToUserName,
            'FromUserName' => $response->FromUserName,
            'CreateTime' => $response->CreateTime,
            'MsgType' => $response->MsgType,
            'PicUrl' => $response->PicUrl,
            'MediaId' => $response->MediaId,
            'MsgId' => $response->MsgId,
        );
        return $return;
    }

    function _response_voice($response){
        $return = array(
            'ToUserName' => $response->ToUserName,
            'FromUserName' => $response->FromUserName,
            'CreateTime' => $response->CreateTime,
            'MsgType' => $response->MsgType,
            'MediaId' => $response->MediaId,
            'Format' => $response->Format,
            'MsgId' => $response->MsgId,
        );
        return $return;
    }

    function _response_video($response){
        $return = array(
            'ToUserName' => $response->ToUserName,
            'FromUserName' => $response->FromUserName,
            'CreateTime' => $response->CreateTime,
            'MsgType' => $response->MsgType,
            'MediaId' => $response->MediaId,
            'ThumbMediaId' => $response->ThumbMediaId,
            'MsgId' => $response->MsgId,
        );
        return $return;
    }

    function _response_link($response){
        $return = array(
            'ToUserName' => $response->ToUserName,
            'FromUserName' => $response->FromUserName,
            'CreateTime' => $response->CreateTime,
            'MsgType' => $response->MsgType,
            'Title' => $response->Title,
            'Description' => $response->Description,
            'Url' => $response->Url,
            'MsgId' => $response->MsgId,
        );
        return $return;
    }

    function _response_event($response){
        switch(strtolower($response->Event)){
            case 'subscribe':
                $return = array(
                    'ToUserName' => $response->ToUserName,
                    'FromUserName' => $response->FromUserName,
                    'CreateTime' => $response->CreateTime,
                    'MsgType' => $response->MsgType,
                    'Event' => $response->Event,
                );
                if(isset($response->EventKey)){
                    $return['EventKey'] = $response->EventKey;
                    $return['Ticket'] = $response->Ticket;
                }
                break;
            case 'scan':
                $return = array(
                    'ToUserName' => $response->ToUserName,
                    'FromUserName' => $response->FromUserName,
                    'CreateTime' => $response->CreateTime,
                    'EventKey' => $response->EventKey,
                    'Ticket' => $response->Ticket,
                    'MsgType' => $response->MsgType,
                    'Event' => $response->Event,
                );
                break;
            case 'location':
                $return = array(
                    'ToUserName' => $response->ToUserName,
                    'FromUserName' => $response->FromUserName,
                    'CreateTime' => $response->CreateTime,
                    'Latitude' => $response->Latitude,
                    'Longitude' => $response->Longitude,
                    'Precision' => $response->Precision,
                    'MsgType' => $response->MsgType,
                    'Event' => $response->Event,
                );
                break;
            case 'click':
                $return = array(
                    'ToUserName' => $response->ToUserName,
                    'FromUserName' => $response->FromUserName,
                    'CreateTime' => $response->CreateTime,
                    'EventKey' => $response->EventKey,
                    'MsgType' => $response->MsgType,
                    'Event' => $response->Event,
                );
                break;
            case 'view':
                $return = array(
                    'ToUserName' => $response->ToUserName,
                    'FromUserName' => $response->FromUserName,
                    'CreateTime' => $response->CreateTime,
                    'EventKey' => $response->EventKey,
                    'MsgType' => $response->MsgType,
                    'Event' => $response->Event,
                );
                break;
        }
        return $return;
    }

    function _response_location($response){
        $return = array(
            'ToUserName' => $response->ToUserName,
            'FromUserName' => $response->FromUserName,
            'CreateTime' => $response->CreateTime,
            'MsgType' => $response->MsgType,
            'Location_X' => $response->Location_X,
            'Location_Y' => $response->Location_Y,
            'Scale' => $response->Scale,
            'Label' => $response->Label,
            'MsgId' => $response->MsgId,
        );
        return $return;
    }
}