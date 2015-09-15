<?php
namespace Home\Model;
use Think\Model;
class ResultModel extends Model {
    /**
     * 获得所有成果列表
     */
    public function getAllResultList(){
        return $this->where('type != 0')->select();
    }
	public function getAllResultsList(){
        return $this->select();
    }

     /**
     * @param $id
     * @return mixed
     * 根据id获得成果详情
     */
    public function getResultInfoById($id){
        return $this->where('id = '.$id)->select();
    }
    
    

    /**
     * 添加
     */
    public function addResult($data){
        return $this->add($data);
    }

    /**
     * 修改
     */
    public function editResult($id,$data){
        return $this->where('id='.$id)->save($data);
    }

    /**
     * 新闻
     */
    public function delResult($id){
        return $this->where('id='.$id)->delete();
    }

    /**
     * 获得所有论文列表
     */
    public function getAllPaperList(){
        return $this->where('type = 0')->select();
    }

}