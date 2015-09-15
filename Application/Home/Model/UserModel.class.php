<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

    public function getUserById($id){
        return $this->where( 'id='.$id.'')->find();
    }

    /**
     * @param $name
     * @return mixed
     * 根据用户名获得用户信息
     */
    public function getUserByName($name){
        return $this->where('name="'.$name.'"')->find();
    }

    /**
     * @param $name
     * @return mixed
     * 判断用户是否重名
     */
    public function checkName($name){
        $num = $this->where('name = "'.$name.'"')->count();
        if($num <= 0 ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return mixed
     * 获得用户数量
     */
    public function getUserCount(){
        return $this->count();
    }

    /**
     * @param $page
     * @param $pageSize
     * @return mixed
     * 获得用户列表
     */
    public function getUserList($page, $pageSize){
        return $this->limit(($page-1)*$pageSize.','.$pageSize)->order('id desc')->select();
    }

    /**
     * @param $uid
     * 删除用户
     */
    public function delUser($uid){
        $this->where('id='.$uid)->delete();
    }

    /**
     * @param $uid
     * @param $pwd
     * 修改密码
     */
    public function setPassword($uid, $pwd){
        $data['password'] = md5($pwd);
        $this->where('id='.$uid)->save($data);
    }

    /**
     * @param $uid
     * @param $data
     * 修改用户信息
     */
    public function setInfo($uid, $data){
        $this->where('id='.$uid)->save($data);
    }
}