<?php
namespace Home\Model;
use Think\Model;
class LabinfoModel extends Model {
    public function getInfo(){
        return $this->field('info')->select();
    }
	public function editInfo($id,$data){
        return $this->where('id='.$id)->save($data);
    }
}