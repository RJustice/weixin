<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }
    function index(){
        redirect(site_url('article/lists'));
    }

    function lists(){
        $cid = $this->uri->segment(3);
        $this->load->model('m_article');
        if($cid == 0){
            $articles = $this->m_article->getLists();
        }else{
            $articles = $this->m_article->getListsByCid($cid);
        }

        if($articles){
            $this->template->build('article_lists',array('articles'=>$articles));
        }else{
            $this->template->build('article_lists_no_items');
            return;
        }
    }

    function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'title',
                'label' => 'Article Title',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'content',
                'label' => 'Article Content',
                'rules' => 'trim|required'
            )
        ));
        if($this->form_validation->run() == FALSE){
            $this->template->build('article_add_form',array('article'=>array('id'=>0,'title'=>'','content'=>'','cid'=>1)));
            return;
        }else{
            preg_match_all('/src=\"data:image\/(\w+);base64,(.+?)\"/',$this->input->post('content'),$match,PREG_SET_ORDER);
            $this->load->helper('file');
            $content = $this->input->post('content');
            // echo $content;
            foreach($match as $d){
                $img = 'data/article/'.md5(microtime()).'.'.$d[1];
                write_file($img,base64_decode($d[2]));
                $content = preg_replace('/src=\"data:(.+?)\"/','src="'.base_url($img).'" class="img-responsive"',$content,1);
            }
            $_POST['content'] = $content;
            preg_match_all('/src=\"(.+?)\"/i',$content,$src,PREG_SET_ORDER);
            $imgs = array();
            foreach($src as $s){
                $imgs[] = $s[1];
            }
            $_POST['imgs'] = serialize($imgs);
            $this->load->model('m_article');
            $id = $this->m_article->create($this->input->post(NULL));
            redirect('article/lists');
        }
    }

    function edit(){
        $id = $this->uri->segment(3);
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'title',
                'label' => 'Article Title',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'content',
                'label' => 'Article Content',
                'rules' => 'trim|required'
            )
        ));
        $this->load->model('m_article');
        $article = $this->m_article->get($id);
        if( !$article){
            $this->template->build('article_edit_error');
            return;
        }
        if($this->form_validation->run() == FALSE){
            $this->template->build('article_add_form',array('article'=>$article));
        }else{
            preg_match_all('/src=\"data:image\/(\w+);base64,(.+?)\"/',$this->input->post('content'),$match,PREG_SET_ORDER);
            $this->load->helper('file');
            $content = $this->input->post('content');
            // echo $content;
            foreach($match as $d){
                $img = 'data/article/'.md5(microtime()).'.'.$d[1];
                write_file($img,base64_decode($d[2]));
                $content = preg_replace('/src=\"data:(.+?)\"/','src="'.base_url($img).'" class="img-responsive"',$content,1);
            }
            $_POST['content'] = $content;
            preg_match_all('/src=\"(.+?)\"/i',$content,$src,PREG_SET_ORDER);
            $imgs = array();
            foreach($src as $s){
                $imgs[] = $s[1];
            }
            $_POST['imgs'] = serialize($imgs);
            $this->m_article->update($this->input->post(NULL));
            redirect('article/lists');
        }
    }

    function ajaxGetListsByCid(){
        $id = $this->uri->segment('3');
        // $id = $this->uri->segment(4);
        $this->load->model('m_article');
        // if($type == 'list'){
            $lists = $this->m_article->ajaxListsByCid($id);
            echo json_encode($lists);
            return;
        // }elseif($type == 'article'){

        // }
    }
}

/* End of file article.php */
/* Location: ./application/controllers/article.php */