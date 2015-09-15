<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->assign('title','学生风采');
        $id = $_GET['id'];
        $resume = D('Resume');
        $resume_info = $resume->getResumeInfo($id);
        $user_info = D('UserInfo');
        $student_info = $user_info->getUserInfo($id);
        $user_info->addViews($id);
        $hot_students = $user_info->getHotStudentList();
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $this->assign('hot_news', $hot_news);
        $this->assign('resume_info', $resume_info);
        $this->assign('student_info', $student_info);
        $this->assign('hot_students', $hot_students);
        $this->display();
    }

}