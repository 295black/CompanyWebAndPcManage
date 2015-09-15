<?php
namespace Home\Model;
use Think\Model;
class UserInfoModel extends Model {
    /**
     * 获得所有学生的列表
     */
	public function getAllUsersList(){
        return $this->where('type != 0')->select();
    }

    /**
     * 获得所有导师的列表
     */
    public function getAllTeachersList(){
    	return $this->order('uid desc')->where('type = 0')->select();
    }

    /*
     * 获得所有人员的列表
     */
	public function getAllUserList(){
        return $this->select();
    }
    public function getAllUserInfo($id){
    	return $this->where('uid = '.$id)->select();
    }
    /*
     * 增加人员
     */
	public function addUsers($data){
        return $this->add($data);
    }
    /*
     * 修改人员
     */
	public function editUsers($id,$data){
        return $this->where('uid='.$id)->save($data);
    }

    /**
     * 人员删除
     */
    public function delUsers($id){
        return $this->where('uid='.$id)->delete();
    }

    /**
     * 增加一次浏览
     */
    public function addViews($id){
        return $this->where('uid = '.$id)->setInc('views',1);
    }

    /**
     * 获得人气之星，views最高的3人
     */
    public function getHotStudentList(){
        return $this->order('views desc')->where('type != 0')->limit(4)->select();
    }

    public function getUserInfo($id){
        return $this->where('uid = '.$id)->select();
    }

}