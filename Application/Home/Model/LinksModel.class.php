<?php
namespace Home\Model;
use Think\Model;
class LinksModel extends Model {
    /**
     * 获得所有的友情链接
     */
    public function getAllLinksList(){
        return $this->select();
    }
	public function getLinksInfoById($id){
        return $this->where('id = '.$id)->select();
    }


    public function addLinks($data){
        return $this->add($data);
    }


    public function editLinks($id,$data){
        return $this->where('id='.$id)->save($data);
    }


    public function delLinks($id){
        return $this->where('id='.$id)->delete();
    }
}