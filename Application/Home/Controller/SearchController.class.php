<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function index(){
        $this->assign('title','搜索页');
        $query = $_GET['query'];
        $type = $_GET['type'];
        $news = D('news');
        if($type == '通知公告')
            $type = 1;
        elseif($type == '新闻中心')
            $type = 2;
        $result = $news->searchNewsByTitle($query,$type);
        foreach ($result as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $this->assign('result_list', $result);
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