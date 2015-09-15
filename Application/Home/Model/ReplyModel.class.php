<?php
namespace Home\Model;
use Think\Model;
class ReplyModel extends Model {

    /**
     * @param $data
     * @return mixed
     * 添加回复
     */
    public function addReply($data){
        return $this->add($data);
    }

    /**
     * @param $tid
     * @return mixed
     * 获得帖子回复的数量
     */
    public function getReplyCount($tid){
        return $this->where('tid = '.$tid.'')->count();
    }

    /**
     * @param $tid
     * @param $page
     * @param $pageSize
     * @return mixed
     * 根据分页情况获得回复列表
     */
    public function getReplyList($tid, $page, $pageSize){
        return $this->limit(($page-1)*$pageSize.','.$pageSize)->order('id desc')->where('tid='.$tid.'')->select();
    }
}