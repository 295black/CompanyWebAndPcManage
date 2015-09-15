<?php
namespace Home\Model;
use Think\Model;
class NewsModel extends Model {
    /**
     * 获得所有非通知的新闻列表
     */
    public function getAllNewsList(){
        return $this->where('type != 1')->select();//->order('nid desc')
    }

    /**
     * @return
     * mixed获得查看数前5的热门资讯
     */
    public function getHotNewsList(){
        return $this->order('views desc')->where('type != 1')->limit(10)->select();
    }

    /**
     * @return mixed
     * 获得所有通知列表
     */
    public function getAllNoticesList(){
        return $this->order('nid desc')->where('type = 1')->select();
    }

    /**
     * @param $query
     * @param $type
     * @return mixed
     * 模糊查找新闻或者通知
     */
    public function searchNewsByTitle($query, $type){
        return $this->where('type ='.$type.' and title like "%'.$query.'%" ')->select();
    }

    /**
     * @param $id
     * @return mixed
     * 根据id获得新闻或者通知详情
     */
    public function getNewsInfoById($id){
        return $this->where('nid = '.$id)->select();
    }

    /**
     * 添加新闻或者通知
     */
    public function addNews($data){
        return $this->add($data);
    }

    /**
     * 修改新闻或者通知
     */
    public function editNews($id,$data){
        return $this->where('nid='.$id)->save($data);
    }

    /**
     * 新闻或通知删除
     */
    public function delNews($id){
        return $this->where('nid='.$id)->delete();
    }

    /**
     * 获得所有最新的10条新闻列表
     */
    public function getToptenNewsList(){
        return $this->where('type != 1')->order('nid desc')->limit(10)->select();
    }

    /**
     * 获得所有最新的12条通知列表
     */
    public function getTopNotice(){
        return $this->where('type = 1')->order('nid desc')->limit(1)->select();
    }

    /**
     * 增加一次浏览
     */
    public function addViews($id){
        return $this->where('nid = '.$id)->setInc('views',1);
    }

}