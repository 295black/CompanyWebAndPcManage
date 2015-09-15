<?php
namespace Home\Model;
use Think\Model;
class ProjectsModel extends Model {
    /**
     * 获得研究热点列表
     */
    public function getAllProjectsList(){
        return $this->select();
    }
    

    public function getProjectsInfoById($id){
        return $this->where('id = '.$id)->select();
    }


    public function addProjects($data){
        return $this->add($data);
    }


    public function editProjects($id,$data){
        return $this->where('id='.$id)->save($data);
    }


    public function delProjects($id){
        return $this->where('id='.$id)->delete();
    }

}