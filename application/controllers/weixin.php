<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin extends CI_Controller {

    function index(){
        is_logged();
    }

    function article(){
        $id = $this->uri->segment(3);
        $this->load->model('m_article');
        $article = $this->m_article->get($id);
        if($article){
            $this->template->set_layout('article')->build('article_detail',array('article'=>$article));
        }else{
            $this->template->set_layout('article')->build('article_detail_error');
        }
    }

    function init(){
        $token = $this->uri->segment(2);
        $this->load->model('m_waccount');
        $weixin = $this->m_waccount->checkWeixinByToken($token);
        if($weixin){
            $echostr = $this->input->get('echostr');
            if(empty($echostr)){
                $this->load->model('m_weixin');
                $response = file_get_contents('php://input');
                if( ! $response){
                    exit('No Response');
                }
                $data = $this->m_weixin->response_xml($response);
                switch($data['MsgType']){
                    case 'text':
                        $reply = $this->m_weixin->responseText($data,$token);
                        switch($reply['reply_type']){
                            case "text":
                                $this->load->view('reply_txt',$reply);
                                break;
                            case "article":
                            case "multiple-article":
                                $this->load->view('reply_article',$reply);
                                break;
                            case "menu":
                                break;
                        }
                        break;
                    case 'event':
                        switch(strtolower($data['Event'])){
                            case 'click':
                                
                                break;
                            case 'subscribe':
                                if(isset($data['EventKey'])){
                                    $reply = $this->m_weixin->qrsceneSubsribe($data);
                                }else{
                                    $reply = $this->m_weixin->normalSubscribe($data);
                                }
                                switch ($reply['event']['event_type']) {
                                    case 'text':
                                        # code...
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                                break;
                            case 'scan':
                                break;
                        }
                        break;
                }
            }else{
                $token = $weixin['token'];
                $signature=$this->input->get('signature');
                $nonce=$this->input->get('nonce');
                $timestamp=$this->input->get('timestamp');
                $tmpArr = array($token,$timestamp,$nonce);
                sort($tmpArr,SORT_STRING);
                $sign_str = implode($tmpArr);
                $sign_str = sha1($sign_str);
                if($sign_str == $signature){
                    echo $echostr;
                    //return true;
                    exit;
                }else{
                    //return false;
                    exit;
                }
            }
        }
    }
}

/* End of file weixin.php */
/* Location: ./application/controllers/weixin.php */