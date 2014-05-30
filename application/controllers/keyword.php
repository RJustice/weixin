<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keyword extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        redirect(site_url('keyword/lists'));
    }

    function lists(){
        $this->load->model('m_keyword');
        $keywords = $this->m_keyword->getLists();
        if($keywords){
            $this->template->build('keyword_lists',array('keywords'=>$keywords));
        }else{
            $this->template->build('keyword_lists_no_items');
        }
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'keyword',
                'label' => 'Keyword',
                'rules' => 'trim|required'
            ),
        ));
        $this->form_validation->set_rules('is_fuzzy');
        $reply_type = $this->input->post('reply_type',TRUE);
        if($reply_type == 'text'){
           $this->form_validation->set_rules(array(
                array(
                    'field' => 'text_msg',
                    'label' => 'Text Msg',
                    'rules' => 'trim|required'
                ),
            )); 
        }
        if($reply_type == 'multiple-article'){
           $this->form_validation->set_rules(array(
                array(
                    'field' => 'aids',
                    'label' => 'aids',
                    'rules' => 'required'
                ),
            )); 
        }
        if($reply_type == 'article'){
           $this->form_validation->set_rules(array(
                array(
                    'field' => 'aid',
                    'label' => 'aid',
                    'rules' => 'trim|required'
                ),
            ));
        }
        if($reply_type == 'menu'){
           $this->form_validation->set_rules(array(
                array(
                    'field' => 'menu',
                    'label' => 'menu',
                    'rules' => 'trim|required'
                ),
            ));
        }
        if($this->form_validation->run() == FALSE){
            $this->template->build('keyword_add_form');
        }else{
            switch($reply_type){
                case 'text':
                    $data = array(
                        'keyword' => $this->input->post('keyword',TRUE),
                        'keylength' => mb_strlen($this->input->post('keyword',TRUE)),
                        'reply_type' => $reply_type,
                        'is_fuzzy' => $this->input->post('is_fuzzy',TRUE),
                        'reply_text' => "<Content><![CDATA[".$this->input->post('text_msg',TRUE)."]]></Content>",
                    );
                    break;

                case 'multiple-article':
                case 'article':
                    if($reply_type == 'article'){
                        $aids = array($this->input->post('aid',TRUE));
                    }else{
                        $aids = $this->input->post('aids',TRUE);
                    }
                    $this->load->model('m_article');
                    $articles = $this->m_article->getByIDs($aids);
                    $t = "<ArticleCount>".count($articles)."</ArticleCount>";
                    $t .="<Articles>";
                    foreach($articles as $article){
                        $t .="<item>";
                        $t .="<Title><![CDATA[".$article['title']."]]></Title>";
                        $t .="<Description><![CDATA[".$article['description']."]]></Description>";
                        $t .="<PicUrl><![CDATA[".$article['imgs'][0]."]]></PicUrl>";
                        $t .="<Url><![CDATA[".site_url('weixin/article/'.$article['id'])."]]></Url>";
                        $t .="</item>";
                    }
                    $t .="</Articles>";
                    $data = array(
                        'keyword' => $this->input->post('keyword',TRUE),
                        'keylength' => mb_strlen($this->input->post('keyword',TRUE)),
                        'reply_type' => $reply_type,
                        'is_fuzzy' => $this->input->post('is_fuzzy',TRUE),
                        'reply_text' => $t,
                    );
                    break;
                case 'menu':
                    break;
            }
            $this->load->model('m_keyword');
            $id = $this->m_keyword->create($data);
            if(!$id){
                $this->template->build('keyword_add_error');
            }else{
                redirect(site_url('keyword/lists'));
            }
        }
    }

    function edit(){

    }
}

/* End of file keywords.php */
/* Location: ./application/controllers/keywords.php */