<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ResultController extends Controller {
    public function index(){

    }

    public function result_info(){
        $this->assign('title','成果详情');
        $rid = $_GET['rid'];
        $result = D('Result');
        $info = $result->getResultInfoById($rid);
        $info[0]['time'] = date('Y-m-d H:i:s',$info[0]['time']);
        $this->assign('info',$info);
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $this->assign('hot_students', $hot_students);
        $this->assign('hot_news', $hot_news);
        $this->display();
    }

}