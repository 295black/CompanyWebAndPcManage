<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index(){

    }

    public function news_info(){
        $type = $_GET['type']; 
        if($type == 1)
            $this->assign('title','通知详情');
        elseif($type == 2)
            $this->assign('title','新闻详情');
        $nid = $_GET['nid'];
        $news = D('News');
        $news->addViews($nid);
        $info = $news->getNewsInfoById($nid);
        foreach ($info as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $this->assign('info',$info);
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