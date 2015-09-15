<?php

/**
 * 分页函数
 * @param $page 当前页
 * @param $pageSize 每一页显示数
 * @param $totalCount 总数
 * @param $showPageNum 要显示的页码数 默认-1表示显示全部
 * @param $half 当前突出显示的页码位于所有显示页码的位置,0为第一个,默认-1为居中
 * @return array 包含分页信息
 */
function setPager($page, $pageSize, $totalCount, $showPageNum = -1, $half = -1)
{
    $page = (int)$page;
    $pageSize = (int)$pageSize;
    $totalCount = (int)$totalCount;
    if ($totalCount < 1) {
        return false;
    }
    $totalPage = ceil($totalCount / $pageSize);
    $page = min(intval(max($page, 1)), $totalPage);
    $pageSart = 1;
    $pageEnd = $totalPage;
    if ($showPageNum != -1) {
        if ($half == -1) {
            $half = floor($showPageNum / 2);
        }
        $pageSart = max($page - $half, 1);
        $pageEnd = min($pageSart + $showPageNum - 1, $totalPage);
        if ($pageEnd - $pageSart < $showPageNum - 1) {
            if ($pageSart == 1) {
                $pageEnd = min($pageSart + $showPageNum - 1, $totalPage);
            } elseif ($pageEnd == $totalPage) {
                $pageSart = max($pageEnd - $showPageNum + 1, 1);
            }
        }
    }
    $pageData = array(
        "totalCount" => $totalCount, // 总记录数
        "pageSize" => $pageSize, // 分页大小
        "totalPage" => $totalPage, // 总页数
        "firstPage" => 1, // 第一页
        "prevPage" => ((1 == $page) ? 1 : ($page - 1)), // 上一页
        "nextPage" => (($page == $totalPage) ? $totalPage : ($page + 1)), // 下一页
        "lastPage" => $totalPage, // 最后一页
        "currentPage" => $page, // 当前页
        "pageStart" => $pageSart,
        "pageEnd" => $pageEnd
    );
    return $pageData;
}


/**
 * 创建默认分页区域
 */
function createPage($url, $page, $pageSize, $totalCount, $showPageNum = -1, $half = -1, $flPage = true)
{
    $pageData = setPager($page, $pageSize, $totalCount, $showPageNum, $half);
    $firstPage = '';
    $lastPage = '';
    if ($flPage) {
        if ($pageData['pageStart'] > $pageData['firstPage']) {
            $firstPage = '<li><a href="' . $url . $pageData['firstPage'] . '">首页</a></li>';
        }
        if ($pageData['pageEnd'] < $pageData['lastPage']) {
            $lastPage = '<li><a href="' . $url . $pageData['lastPage'] . '">尾页</a></li>';
        }
    }
    $prevPage = '';
    if ($pageData['currentPage'] == $pageData['firstPage']) {
        $prevPage = '<li class="disabled"><a>&laquo;</a></li>';
    } else {
        $prevPage = '<li><a href="' . $url . $pageData['prevPage'] . '">&laquo;</a></li>';
    }
    $nextPage = '';
    if ($pageData['currentPage'] == $pageData['lastPage']) {
        $nextPage = '<li class="disabled"><a>&raquo;</a></li>';
    } else {
        $nextPage = '<li><a href="' . $url . $pageData['nextPage'] . '">&raquo;</a></li>';
    }
    $page = '<ul>' . $firstPage . $prevPage;
    for ($i = $pageData['pageStart']; $i <= $pageData['pageEnd']; $i++) {
        if ($pageData['currentPage'] == $i) {
            $page .= '<li class="active"><a>' . $i . '</a></li>';
        } else {
            $page .= '<li><a href="' . $url . $i . '">' . $i . '</a></li>';
        }
    }
    $page .= $nextPage . $lastPage . '</ul>';
    return $page;
}

/**
 * 上传文件
 */
function upload($file){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->savePath  =      '/uploads/'; // 设置附件上传目录
    // 上传文件
    $info   =   $upload->uploadOne($file);
    if(!$info) {// 上传错误提示错误信息
        echo "上传失败";
    }else{// 上传成功
        return $info['savepath'].$info['savename'];;
    }
}

/**
 * @param $uid
 * @return bool
 * 根据用户id获得是否经过验证
 */
function checkVerify($uid){
    $verify = D("Verify");
    $status = $verify->getVerify($uid)['status'];
    if($status == 1){
        return true;
    }else{
        return false;
    }
}