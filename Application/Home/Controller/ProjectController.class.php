<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {
    public function index(){
        $this->assign('title','项目详情');
        $pid = $_GET['id'];
        $projects = D('Projects');
        $info = $projects->getProjectsInfoById($pid);
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