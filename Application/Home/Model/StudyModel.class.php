<?php
namespace Home\Model;
use Think\Model;
class StudyModel extends Model {
    /**
     * 获得研究热点列表
     */
    public function getAllStudyList(){
        return $this->select();
    }
    public function getStudyInfoById($id){
        return $this->where('id = '.$id)->select();
    }


    public function addStudy($data){
        return $this->add($data);
    }


    public function editStudy($id,$data){
        return $this->where('id='.$id)->save($data);
    }


    public function delStudy($id){
        return $this->where('id='.$id)->delete();
    }

}