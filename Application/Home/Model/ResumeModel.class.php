<?php
namespace Home\Model;
use Think\Model;
class ResumeModel extends Model {
    /**
     * 获得简历详情
     */
	
	public function getResumeList(){
        return $this->select();
    }
    public function getResumeInfo($id){
    	return $this->where('uid = '.$id)->select();
    }
    /*
     * 增加简历
     */
	public function addResume($data){
        return $this->add($data);
    }
    /**
     *修改简历
     */
	public function editResume($id,$data){
        return $this->where('uid='.$id)->save($data);
    }

    /**
     * 删除简历
     */
    public function delResume($id){
        return $this->where('uid='.$id)->delete();
    }
}