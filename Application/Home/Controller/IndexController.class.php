<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->assign('title','杭州电子科技大学');
        $this->assign('index_active','active');
        $news = D('News');
        $news_list = $news->getToptenNewsList();
        foreach ($news_list as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $notice = $news->getTopNotice();
        $studys = D('Study');
        $study_list = $studys->getAllStudyList();
        $users = D('UserInfo');
        $users_list = $users->getAllUsersList();
        $link = D('Links');
        $links = $link->getAllLinksList();
        $this->assign('news_list', $news_list);
        $this->assign('study_list', $study_list);
        $this->assign('notice', $notice);
        $this->assign('users_list', $users_list);
        $this->assign('links', $links);
        $this->display();
    }

    /**
     * 实验室介绍
     */
    public function info(){
        $this->assign('title','实验室介绍');
        $this->assign('info_active','active');
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $this->assign('hot_news', $hot_news);
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $this->assign('hot_students', $hot_students);
        $labinfo = D('Labinfo');
        $info = $labinfo->getInfo();
        $this->assign('lab_info',$info[0]['info']);
        $this->display();
    }



    /**
     * 科研团队
     */
    public function member(){
        $this->assign('title','科研团队');
        $member = D('UserInfo');
        $teachers_list = $member->getAllTeachersList();
        $students_list = $member->getAllUsersList();
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $this->assign('hot_students', $hot_students);
        $this->assign('hot_news', $hot_news);
        $this->assign('member_active','active');
        $this->assign('teachers_list',$teachers_list);
        $this->assign('students_list',$students_list);
        $this->display();
    }


    /**
     * 新闻中心
     */
    public function news(){
        $this->assign('title','新闻中心');
        $news = D('News');
        $news_list = $news->getAllNewsList();
        foreach ($news_list as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $this->assign('hot_students', $hot_students);
        $this->assign('news_list', $news_list);
        $this->assign('hot_news', $hot_news);
        $this->assign('news_active','active');
        $this->display();
    }



    /**
     * 论文
     */
    public function paper(){
        $this->assign('title','发表论文');
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $result = D('Result');
        $count      = $result->where('type = 0')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $result->order('id')->where('type = 0')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result_list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->assign('hot_news', $hot_news);
        $this->assign('paper_active','active');
        $this->display();
    }


    /**
     * 科研项目
     */
    public function projects(){
        $this->assign('title','科研项目');
        $projects = D('projects');
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $count      = $projects->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $projects->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('projects_list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->assign('hot_students', $hot_students);
        $this->assign('hot_news', $hot_news);
        $this->assign('projects_active','active');
        $this->display();
    }


    /**
     * 成果展示
     */
    public function result(){
        $this->assign('title','成果展示');
        $result = D('Result');
        $this->assign('result_active','active');
        $count      = $result->where('type = 1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $result->order('id')->where('type = 1')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result_list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
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

    /**
     * 常用链接
     */
    public function link(){
        $this->assign('title','常用链接');
        $link = D('Links');
        $news = D('News');
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $this->assign('hot_students', $hot_students);
        $this->assign('hot_news', $hot_news);
        $links = $link->getAllLinksList();
        $this->assign('links', $links);
        $this->assign('link_active','active');
        $this->display();
    }



    /**
     * 通知公告
     */
    public function notice(){
        $this->assign('title','通知公告');
        $this->assign('notice_active','active');
        $news = D('News');

        $count      = $news->where('type = 1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $news->order('nid')->where('type = 1')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result_list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        foreach ($list as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $hot_news = $news->getHotNewsList();
        foreach ($hot_news as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $user_info = D('UserInfo');
        $hot_students = $user_info->getHotStudentList();
        $this->assign('hot_students', $hot_students);
        $this->assign('notice_list', $list);
        $this->assign('hot_news', $hot_news);
        $this->display();
    }

}