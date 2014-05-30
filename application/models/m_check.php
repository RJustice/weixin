<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_check extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    function check($data){
        $user = $data['FromUserName'];
        $this->load->helper('file');
        $content = read_file('data/'.$user.'.txt');
        $content = json_decode($content,TRUE);
        if($content){
            if($content['step'] == 3){
                write_file('data/'.$user.'_tag.txt','');
                return "签到信息:\n姓名:{$content['name']}\n校园园区:{$content['school']}\n宿舍:{$content['sushe']}\n电话:{$content['phone']}";
            }elseif($content['step'] == 2){
                $text = explode('+',$data['Content']);
                if(count($text) < 4){
                    return "输入的信息有误,请注意格式:\n姓名+校园园区+宿舍+电话\n如: 张三+常州大学+北区2-304+1478954621";
                }
                $user_info = array(
                        'step' => 3,
                        'name' => $text[0],
                        'school' => $text[1],
                        'sushe' => $text[2],
                        'phone' => $text[3]
                    );
                write_file('data/'.$user.'.txt',json_encode($user_info));
                write_file('data/'.$user.'_tag.txt','');
                return "签到成功";
            }
        }else{
            //return '没有签到过';
            write_file('data/'.$user.'.txt',json_encode(array('step'=>'2')));
            return "签到请输入信息:\n姓名+校园园区+宿舍+电话";
        }
    }

}

/* End of file m_check.php */
/* Location: ./application/models/m_check.php */