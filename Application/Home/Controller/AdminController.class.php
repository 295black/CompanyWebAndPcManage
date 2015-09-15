<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class AdminController extends Controller{
    public function index(){
    	header("Content-Type: text/html;charset=utf8");
    	$user_name = $_POST['username'];
    	$pwd = $_POST['userpwd'];
    	$user = D('User');
    	$user_info = $user->getUserByName($user_name);
    	if($user_info['password'] == md5($pwd)){
    		$this->assign("title","实验室管理系统");
    		echo "<script>alert('登陆成功!');location.href='/home/admin/labinfo'</script>";
    		$this->display();
    	}
    	else
    	    echo "<script>alert('登陆失败!');location.href='/home/index'</script>";
    	
    }
    /**
     * 通知管理
     */
    public function notice(){
        $news = D('News');
        $notices_list = $news->getAllNoticesList();
        foreach ($notices_list as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
        }
        $this->assign('title', '通知管理');
        $this->assign('notices_list', $notices_list);
        $this->display();
    }


    /**
     * 通知添加页面
     */
    public function notice_add(){
        $this->assign('title', '通知管理');
        $this->display();
    }
/**
     * 通知修改页面
     */
	public function notice_edit(){
        $this->assign('title', '通知修改');
		
        $news = D('News');
        $nid = $_GET['nid'];
        $notice = $news->getNewsInfoById($nid);
        $this->assign('notice',$notice);
        $this->assign('nid',$nid);
        $this->display();
    }


    /**
     * 通知添加操作
     */
    public function notice_store(){
        header("Content-Type: text/html;charset=utf8");
        $news = D('News');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $source = $_POST['source'];
        if(empty($title) || empty($content) || empty($source)){
            echo "<script>alert('添加失败!');location.href='/home/admin/notice_add'</script>";
        }else{
            $data = array(
                'title' => $title,
                'content' => $content,
                'source' => $source,
                'type' => 1,
                'time' => time()
            );
            $nid = $news->addNews($data);
            if($nid){
                echo "<script>alert('添加成功!');location.href='/home/admin/notice'</script>";
            }else{
                echo "<script>alert('添加失败!');location.href='/home/admin/notice_add'</script>";
            }
        }
    }

    /**
     * 通知查看页面
     */
    public function notice_show(){
        $this->assign('title', '通知查看');
    	
        $news = D('News');
        $nid = $_GET['nid'];
        $notice = $news->getNewsInfoById($nid);
        $this->assign('notice',$notice);
        $this->assign('nid',$nid);
        $this->display();
    }

    /**
     * 通知修改操作
     */
    public function notice_update(){
        header("Content-Type: text/html;charset=utf8");
        $news = D('News');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $source = $_POST['source'];
        $nid = $_POST['nid'];
        if(empty($title) || empty($content) || empty($source)){
            echo "<script>alert('修改失败1!');location.href='/home/admin/notice'</script>";
        }else{
            $data = array(
                'title' => $title,
                'content' => $content,
                'source' => $source
            );
            $nid = $news->editNews($nid,$data);
            if($nid){
                echo "<script>alert('修改成功!');location.href='/home/admin/notice'</script>";
            }else{         	
                echo "<script>alert('修改失败!');location.href='/home/admin/notice'</script>";
            }
        }
    }


    /**
     * 通知删除操作
     */
    public function notice_delete(){
        header("Content-Type: text/html;charset=utf8");
        $news = D('News');
        $nid = $_GET['nid'];
        $act = $news->delNews($nid);
        if($act){
            echo "<script>alert('删除成功!');location.href='/home/admin/notice'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/notice'</script>";
        }
    }
    
    
     /**
     * 新闻管理
     */
    public function news(){
        $news = D('News');
        $notices_list = $news->getAllNewsList();
        foreach ($notices_list as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
            if($value['group'] == "1") 
      	 		$value['group'] = "实验室新闻";
      	 	elseif($value['group'] =="2")
      	 		$value['group'] = "杭电新闻";
      	 	else 
      	 		$value['group'] = "国内新闻";
        }
        $this->assign('title', '新闻管理');
        $this->assign('notices_list', $notices_list);
        $this->display();
    }
    
    /**
     * 新闻添加页面
     */
    public function news_add(){
        $this->assign('title', '新闻管理');
        $this->display();
    }
/**
     * 新闻修改页面
     */
	public function news_edit(){
        $this->assign('title', '新闻修改');
		$news = D('News');
        $nid = $_GET['nid'];
        $notice = $news->getNewsInfoById($nid);
        $this->assign('notice',$notice);
        $this->assign('nid',$nid);
        $this->display();
    }


    /**
     * 新闻添加操作
     */
    public function news_store(){
        header("Content-Type: text/html;charset=utf8");
        $news = D('News');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $source = $_POST['source'];
        $group = $_POST['group'];
        if(empty($title) || empty($content)){
            echo "<script>alert('添加失败!');location.href='/home/admin/news_add'</script>";
        }else{
            $data = array(
                'title' => $title,
                'content' => $content,
                'source' => $source,
                'type' => 2,
                'time' => time(),
            	'group' => $group
            
            );
            $nid = $news->addNews($data);
            if($nid){
                echo "<script>alert('添加成功!');location.href='/home/admin/news'</script>";
            }else{
                echo "<script>alert('添加失败!');location.href='/home/admin/news_add'</script>";
            }
        }
    }

    /**
     * 新闻查看页面
     */
    public function news_show(){
        $this->assign('title', '新闻查看');
        $news = D('News');
        $nid = $_GET['nid'];
        $notice = $news->getNewsInfoById($nid);
        $this->assign('notice',$notice);
        $this->assign('nid',$nid);
        $this->display();
    }

    /**
     * 新闻修改操作
     */
    public function news_update(){
        header("Content-Type: text/html;charset=utf8");
        $news = D('News');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $source = $_POST['source'];
        $nid = $_POST['nid'];
        $group = $_POST['group'];
        if(empty($title) || empty($content) || empty($source)|| empty($group)){
        	echo $group;
        	die();      	
            echo "<script>alert('修改失败!');location.href='/home/admin/news'</script>";
        }else{
            $data = array(
                'title' => $title,
                'content' => $content,
                'source' => $source,
            	'group' => $group
            );
            $nid = $news->editNews($nid,$data);
            if($nid){
                echo "<script>alert('修改成功!');location.href='/home/admin/news'</script>";
            }else{          	
                echo "<script>alert('修改失败!');location.href='/home/admin/news'</script>";

            }
        }
    }


    /**
     * 新闻删除操作
     */
    public function news_delete(){
        header("Content-Type: text/html;charset=utf8");
        $news = D('News');
        $nid = $_GET['nid'];
        $act = $news->delNews($nid);
        if($act){
            echo "<script>alert('删除成功!');location.href='/home/admin/news'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/news'</script>";
        }
    }


    /**
     * 人员管理
     */
    public function user(){
        $user_info = D('UserInfo');
        $resume = D('Resume');
        $user_list = $user_info->getAllUserList();
        //var_dump($user_list);
        //die;
        foreach($user_list as &$value){
            $resume_info = $resume->getResumeInfo($value['uid'])[0];
            $value['resume_content'] = $resume_info['content'];
            $value['resume_img'] = $resume_info['img'];
            $value['resume_email'] = $resume_info['email'];
            if($value['sex'] == "1") 
      	 		$value['sex'] = "女";
      	 	else
      	 		$value['sex'] = "男";
      	 		
      	 	if($value['type'] == "0") 
      	 		$value['type'] = "导师";
      	 	elseif($value['type'] =="1")
      	 		$value['type'] = "研究生";
      	 	else 
      	 		$value['type'] = "本科";		
        }

        $this->assign('title', '科研团队管理');
        $this->assign('user_list', $user_list);
        $this->display();
    }


    /**
     * 人员添加页面
     */
    public function user_add(){
        $this->assign('title', '科研团队管理');
        $this->display();
    }
/**
     * 人员修改页面
     */
	public function user_edit(){
		$this->assign('title', '科研团队修改');
        $user_info = D('UserInfo');
        $resume = D('Resume');
		$uid = $_GET['uid'];
        $resume_info = $resume->getResumeInfo($uid)[0];
        $user_list = $user_info->getAllUserInfo($uid)[0];
        $user_list['resume_content'] = $resume_info['content'];
        $user_list['resume_email'] = $resume_info['email'];
        //var_dump($user_list);
        //die;
        if($user_list['sex'] == "1") 
      	 		$user_list['sex'] = "女";
      	else
      	 		$user_list['sex'] = "男";
      	 		
      	if($user_list['type'] == "0") 
      	 		$user_list['type'] = "导师";
      	elseif($user_list['type'] =="1")
      	 		$user_list['type'] = "研究生";
      	else 
      	 		$user_list['type'] = "本科";
		$this->assign('user_list', $user_list);
		$this->assign('uid',$uid);
        $this->display();
    }


    /**
     * 通知添加操作
     */
    public function user_store(){
        header("Content-Type: text/html;charset=utf8");
        $user_info = D('UserInfo');
        $resume = D('Resume');
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $type1 = $_POST['type'];
        $resume_email = $_POST['email'];
        $resume_content = $_POST['content'];
        $time = $_POST['time'];
        if($_FILES['file']['size'] > 1000000){  
   			echo '文件过大！';  
   			exit;  
			}	  	
        if($_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif'){
        	 var_dump($_FILES);
        	 die;
  			 echo '文件不是JPG或者GIF图片！';  
  			 exit;  
			}
			$filetype = $_FILES['file']['type'];  
			if($filetype == 'image/jpeg'){  
  					$type = '.jpg';   		
				}  
			if($filetype == 'image/gif'){  
  					$type = '.gif';  
				}  
    	/*if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />"; //由表单file input的到$_FILES的值
			}else {
				echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Stored in: " . $_FILES["file"]["tmp_name"];
			}
			*/
        $today = date("YmdHis");
		$upfile = './Public/uploads/images/'.$today . $type;
		$upfile1 = '/Public/uploads/images/'.$today . $type;
		move_uploaded_file($_FILES['file']['tmp_name'], $upfile);
        if(empty($name) || (empty($sex)&& $sex != 0)  || (empty($type)&& $type != 0) || empty($resume_content)|| empty($_FILES['file']['tmp_name'])){
        	echo "<script>alert('添加失败!');location.href='/home/admin/user_add'</script>";    
        }else{
            $data = array(
                'name' => $name,
                'sex' => $sex,
            	'time' => $time,
                'type' => $type1,
                'img' => $upfile1
            );
            $uid = $user_info->addUsers($data);
            $data1 = array(
            	'email' => $resume_email,
            	'content' => $resume_content,
            	'uid' => $uid,
              	'img' => $upfile1
            
            );
            $resume->addResume($data1);
            if($uid){
                echo "<script>alert('添加成功!');location.href='/home/admin/user'</script>";
            }else{
                echo "<script>alert('添加失败!');location.href='/home/admin/user_add'</script>";

            }
        }
    }

    /**
     * 人员查看页面
     */
    public function user_show(){
        $this->assign('title', '科研团队查看');
        $user_info = D('UserInfo');
        $resume = D('Resume');
        $uid = $_GET['uid'];
        $resume_info = $resume->getResumeInfo($uid)[0];
        $user_list = $user_info->getAllUserInfo($uid)[0];
        $user_list['resume_content'] = $resume_info['content'];
        $user_list['resume_email'] = $resume_info['email'];
        //var_dump($user_list);
        //die;
        if($user_list['sex'] == "1") 
      	 		$user_list['sex'] = "女";
      	else
      	 		$user_list['sex'] = "男";
      	 		
      	if($user_list['type'] == "0") 
      	 		$user_list['type'] = "导师";
      	elseif($user_list['type'] =="1")
      	 		$user_list['type'] = "研究生";
      	else 
      	 		$user_list['type'] = "本科";
		$this->assign('user_list', $user_list);
		$this->assign('uid',$uid);
        $this->display();
    }

    /**
     * 人员修改操作
     */
    public function user_update(){
    header("Content-Type: text/html;charset=utf8");
        $user_info = D('UserInfo');
        $resume = D('Resume');
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $type1 = $_POST['type'];
        //echo $type1;
        //die;
        $resume_email = $_POST['email'];
        $resume_content = $_POST['content'];
        $time = $_POST['time'];
        $uid = $_POST['uid'];
        $user_list = $user_info->getAllUserInfo($uid)[0];        
        $upfile = $user_list['img'];
        //var_dump($_FILES);
        //die;
        if(!empty($_FILES['file']['name']))
        {
	        if($_FILES['file']['size'] > 1000000){  
	   			echo '文件过大！';
	   			exit;  
				}  
	        if($_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif'|| $_FILES['file']['type'] = ''){
	  			 echo '文件不是JPG或者GIF图片！';  
	  			 exit;  
				}
			$filetype = $_FILES['file']['type'];  
				if($filetype == 'image/jpeg'){  
	  					$type = '.jpg';  
					}  
				if($filetype == 'image/gif'){  
	  					$type = '.gif';  
					}  
	        $today = date("YmdHis");
			$upfile = './Public/uploads/images/'.$today . $type;
			move_uploaded_file($_FILES['file']['tmp_name'], $upfile);
			$upfile = '/Public/uploads/images/'.$today . $type;
        }
        if(empty($name) || (empty($sex)&& $sex != 0)  || (empty($type)&& $type != 0) || empty($resume_content)){
        	echo "<script>alert('修改失败!');location.href='/home/admin/user'</script>";    
        }else{
            $data = array(
                'name' => $name,
                'sex' => $sex,
            	'time' => $time,
                'type' => $type1,
                'img' => $upfile
            );
			$i = $user_info->editUsers($uid,$data);
            $data1 = array(
            	'email' => $resume_email,
            	'content' => $resume_content,
              	'img' => $upfile
            
            );
            $i1 =$resume->editResume($uid,$data1);          
            if($i1 || $i){
                echo "<script>alert('修改成功!');location.href='/home/admin/user'</script>";
            }else{
                echo "<script>alert('修改失败!');location.href='/home/admin/user'</script>";

            }
        }
    }


    /**
     * 人员删除操作
     */
    public function user_delete(){
        header("Content-Type: text/html;charset=utf8");
        $user_info = D('UserInfo');
        $resume = D('Resume');
        $uid = $_GET['uid'];
        $act = $resume->delResume($uid);
        $act1 = $user_info->delUsers($uid);
        if($act&&$act1){
            echo "<script>alert('删除成功!');location.href='/home/admin/user'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/user'</script>";
        }
    }
    /*
     * 实验室信息
     */
	public function labinfo(){
		$this->assign('title', '实验室信息');
        $labinfo = D('Labinfo');
        $labinfo_list = $labinfo->getInfo()[0];
        $this->assign('labinfo_list', $labinfo_list);

        $this->display();
    }
    /*
     * 实验室信息修改
     */
	public function labinfo_edit(){
        $this->assign('title', '实验室信息修改');
		
        $labinfo = D('Labinfo');
        $labinfo_list = $labinfo->getInfo()[0];
        $this->assign('labinfo_list', $labinfo_list);

        $this->display();
    }
    /*
     * 实验室信息修改操作
     */
    public function labinfo_update(){
        header("Content-Type: text/html;charset=utf8");
        $labinfo = D('Labinfo');
        $info = $_POST['info'];
        $today = date("YmdHis");
        $nid = 1;
        if(empty($info)){
            echo "<script>alert('修改失败!');location.href='/home/admin/labinfo'</script>";
        }else{
            $data = array(
                'info' => $info,
            	'time' => time()
            );
            $nid = $labinfo->editInfo($nid,$data);
            if($nid){
                echo "<script>alert('修改成功!');location.href='/home/admin/labinfo'</script>";
            }else{
                echo "<script>alert('修改失败!');location.href='/home/admin/labinfo'</script>";
            }
        }
    }
 
 
    /**
     * 项目管理
     */
    public function projects(){
        $projects = D('Projects');
        $projects_list = $projects->getAllProjectsList();
        $this->assign('title', '项目管理');
        $this->assign('projects_list', $projects_list);
        $this->display();
    }
 
  	/**
     * 项目添加页面
     */
    public function projects_add(){
        $this->assign('title', '项目新增');
        $this->display();
    }
/**
     * 项目修改页面
     */
	public function projects_edit(){
        $this->assign('title', '项目修改');
		
        $projects = D('Projects');
        $id = $_GET['id'];
        $projects_list = $projects->getProjectsInfoById($id);
        $this->assign('projects_list',$projects_list);
        $this->assign('id',$id);
        $this->display();
    }


    /**
     * 项目添加操作
     */
    public function projects_store(){
    	header("Content-Type: text/html;charset=utf8");
        $projects = D('Projects');
        $amount = $_POST['amount'];
        $director = $_POST['director'];
        $name = $_POST['name'];
        $content = $_POST['content'];
        $source = $_POST['source'];
        $id = $_POST['id'];
        if(empty($amount) || empty($director) || empty($name)|| empty($content) || empty($source)){
            echo "<script>alert('新增失败!');location.href='/home/admin/projects_add'</script>";
        }else{
            $data = array(
                'name' => $name,
                'content' => $content,
                'source' => $source,
            	'amount' => $amount,
            	'director' => $director,
            	'id' => $id
            );
            $nid = $projects->addProjects($data);
            if($nid){
                echo "<script>alert('新增成功!');location.href='/home/admin/projects'</script>";
            }else{
                echo "<script>alert('新增失败!');location.href='/home/admin/projects_add'</script>";
            }
        }
    }

    /**
     * 项目查看页面
     */
    public function projects_show(){
        $this->assign('title', '项目查看');
    		
        $projects = D('Projects');
        $id = $_GET['id'];
        $projects_list = $projects->getProjectsInfoById($id);
        $this->assign('projects_list',$projects_list);
        $this->assign('id',$id);
        $this->display();
    }

    /**
     * 项目修改操作
     */
    public function projects_update(){
        header("Content-Type: text/html;charset=utf8");
        $projects = D('Projects');
        $amount = $_POST['amount'];
        $director = $_POST['director'];
        $name = $_POST['name'];
        $content = $_POST['content'];
        $source = $_POST['source'];
        $id = $_POST['id'];
        if(empty($amount) || empty($director) || empty($name)|| empty($content) || empty($source)){
            echo "<script>alert('修改失败!');location.href='/home/admin/projects'</script>";
        }else{
            $data = array(
                'name' => $name,
                'content' => $content,
                'source' => $source,
            	'amount' => $amount,
            	'director' => $director
            );
            $id = $projects->editProjects($id,$data);
            if($id){
                echo "<script>alert('修改成功!');location.href='/home/admin/projects'</script>";
            }else{
                echo "<script>alert('修改失败!');location.href='/home/admin/projects'</script>";
            }
        }
    }


    /**
     * 项目删除操作
     */
    public function projects_delete(){
        header("Content-Type: text/html;charset=utf8");
        $projects = D('Projects');
        
        $id = $_GET['id'];
        $act = $projects->delProjects($id);
        if($act){
            echo "<script>alert('删除成功!');location.href='/home/admin/projects'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/projects'</script>";
        }
    }
    

    
        /**
     * 研究热点管理
     */
    public function study(){
        $study = D('Study');
        $study_list = $study->getAllStudyList();
        $this->assign('title', '研究热点管理');
        $this->assign('study_list', $study_list);
        $this->display();
    }
 
  	/**
     * 研究热点添加页面
     */
    public function study_add(){
        $this->assign('title', '研究热点新增');
        $this->display();
    }
/**
     * 研究热点修改页面
     */
	public function study_edit(){
        $this->assign('title', '研究热点修改');
        $study = D('Study');
        $id = $_GET['id'];
        $study_list = $study->getStudyInfoById($id);
        $this->assign('study_list',$study_list);
        $this->assign('id',$id);
        $this->display();
    }


    /**
     * 研究热点添加操作
     */
    public function study_store(){
    	header("Content-Type: text/html;charset=utf8");
        $study = D('Study');
        $title = $_POST['title'];
        $content = $_POST['content'];
        if(empty($title) || empty($content)){
            echo "<script>alert('新增失败!');location.href='/home/admin/study_add'</script>";
        }else{
            $data = array(
                'title' => $title,
                'content' => $content
            );
            $nid = $study->addStudy($data);
            if($nid){
                echo "<script>alert('新增成功!');location.href='/home/admin/study'</script>";
            }else{
                echo "<script>alert('新增失败!');location.href='/home/admin/study_add'</script>";
            }
        }
    }

    /**
     * 研究热点查看页面
     */
    public function study_show(){
        $this->assign('title', '研究热点查看');
    		
        $study = D('Study');
        $id = $_GET['id'];
        $study_list = $study->getStudyInfoById($id);
        $this->assign('study_list',$study_list);
        $this->assign('id',$id);
        $this->display();
    }

    /**
     * 研究热点修改操作
     */
    public function study_update(){
        header("Content-Type: text/html;charset=utf8");
        $study = D('Study');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_POST['id'];
        if( empty($title)|| empty($content)){
            echo "<script>alert('修改失败!');location.href='/home/admin/study'</script>";
        }else{
            $data = array(
                'title' => $title,
                'content' => $content,
            );
            $id = $study->editStudy($id,$data);
            if($id){
                echo "<script>alert('修改成功!');location.href='/home/admin/study'</script>";
            }else{
                echo "<script>alert('修改失败!');location.href='/home/admin/study'</script>";
            }
        }
    }


    /**
     * 研究热点删除操作
     */
    public function study_delete(){
        header("Content-Type: text/html;charset=utf8");
        $study = D('Study');
        
        $id = $_GET['id'];
        $act = $study->delStudy($id);
        if($act){
            echo "<script>alert('删除成功!');location.href='/home/admin/study'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/study'</script>";
        }
    }
  
    
     /**
     * 友情链接管理
     */
    public function links(){
        $links = D('Links');
        $links_list = $links->getAllLinksList();
        $this->assign('title', '友情链接管理');
        $this->assign('links_list', $links_list);
        $this->display();
    }
 
  	/**
     * 友情链接添加页面
     */
    public function links_add(){
        $this->assign('title', '友情链接新增');
        $this->display();
    }
	/**
     * 友情链接修改页面
     */
	public function links_edit(){
        $this->assign('title', '友情链接修改');
        $links = D('Links');
        $id = $_GET['id'];
        $links_list = $links->getLinksInfoById($id);
        $this->assign('links_list',$links_list);
        $this->assign('id',$id);
        $this->display();
    }


    /**
     * 友情链接添加操作
     */
    public function links_store(){
    	header("Content-Type: text/html;charset=utf8");
        $links = D('Links');
        $link = $_POST['link'];
        $url = $_POST['url'];
    	if($_FILES['file']['size'] > 1000000){  
   			echo '文件过大！';  
   			exit;  
			}
		  	
        if($_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif'){
  			 echo '文件不是JPG或者GIF图片！';  
  			 exit;  
			}
			$filetype = $_FILES['file']['type'];  
			if($filetype == 'image/jpeg'){  
  					$type = '.jpg';  
				}  
			if($filetype == 'image/gif'){  
  					$type = '.gif';  
				}  
        $today = date("YmdHis");
		$upfile = './Public/uploads/images/'.$today . $type;
		move_uploaded_file($_FILES['file']['tmp_name'], $upfile);
		$upfile = '/Public/uploads/images/'.$today . $type;
        if(empty($link)|| empty($url)|| empty($_FILES['file']['tmp_name'])){
        	echo "<script>alert('添加失败!');location.href='/home/admin/links_add'</script>";    
        }else{
            $data = array(
                'link' => $link,
                'url' => $url,
            	'logo' => $upfile
            );
            $uid = $links->addLinks($data);
            if($uid){
                echo "<script>alert('添加成功!');location.href='/home/admin/links'</script>";
            }else{
                echo "<script>alert('添加失败!');location.href='/home/admin/links_add'</script>";

            }
        }
    }

    /**
     * 友情链接查看页面
     */
    public function links_show(){
        $this->assign('title', '友情链接查看');
    		
        $links = D('Links');
        $id = $_GET['id'];
        $links_list = $links->getLinksInfoById($id);
        $this->assign('links_list',$links_list);
        $this->assign('id',$id);
        $this->display();
    }

    /**
     * 友情链接修改操作
     */
    public function links_update(){
        header("Content-Type: text/html;charset=utf8");
        $links = D('Links');
        $link = $_POST['link'];
        $url = $_POST['url'];
        $id = $_POST['id'];
        $links_list = $links->getLinksInfoById($id);
        $upfile = $links_list[0]['logo'];
        if(!empty($_FILES['file']['tmp_name']))
        {
	        if($_FILES['file']['size'] > 1000000){  
	   			echo '文件过大！';
	   			exit;  
				}  
	        if($_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif'){
	        	 var_dump($_FILES);
	  			 echo '文件不是JPG或者GIF图片！';  
	  			 exit;  
				}
			$filetype = $_FILES['file']['type'];  
				if($filetype == 'image/jpeg'){  
	  					$type = '.jpg';  
					}  
				if($filetype == 'image/gif'){  
	  					$type = '.gif';  
					}  
	        $today = date("YmdHis");
			$upfile = './Public/uploads/images/'.$today . $type;
			move_uploaded_file($_FILES['file']['tmp_name'], $upfile);
			$upfile = '/Public/uploads/images/'.$today . $type;
			
        }
        if(empty($link)|| empty($url)){
        	echo "<script>alert('修改失败!');location.href='/home/admin/links'</script>";    
        }else{
            $data = array(
                'link' => $link,
                'url' => $url,
            	'logo' => $upfile
            );
			$uid = $links->editLinks($id,$data);
            if($uid){
                echo "<script>alert('修改成功!');location.href='/home/admin/links'</script>";
            }else{
            	die;
                echo "<script>alert('修改失败!');location.href='/home/admin/links'</script>";

            }
        }
    }


    /**
     * 友情链接删除操作
     */
    public function links_delete(){
        header("Content-Type: text/html;charset=utf8");
        $links = D('Links');
        
        $id = $_GET['id'];
        $act = $links->delLinks($id);
        if($act){
            echo "<script>alert('删除成功!');location.href='/home/admin/links'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/links'</script>";
        }
    } 
   /**
     * 成果管理
     */
    public function result(){
        $Result = D('Result');
        $result_list = $Result->getAllResultsList();
        foreach ($result_list as &$value) {
            $value['time'] = date('Y-m-d' , $value['time']);
            $value['type'] = $value['type'] > 0?"其他":"论文";
        }
        $this->assign('title', '成果管理');
        $this->assign('result_list', $result_list);
        $this->display();
    }


    /**
     * 通知添加页面
     */
    public function result_add(){
        $this->assign('title', '成果添加');
        $this->display();
    }
	/**
     * 通知修改页面
     */
	public function result_edit(){
        $this->assign('title', '成果修改');
        $result = D('Result');
        $id = $_GET['id'];
        $result_list = $result->getResultInfoById($id);
        $this->assign('result_list',$result_list);
        $this->assign('id',$id);
        $this->display();
    }


    /**
     * 通知添加操作
     */
    public function result_store(){
        header("Content-Type: text/html;charset=utf8");
        $result = D('Result');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $type1 = $_POST['type'];
        if($_FILES['file']['size'] > 20*1024*1024){  
   			echo '文件过大！';  
   			exit;  
			}	  	
    	/*if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />"; //由表单file input的到$_FILES的值
			}else {
				echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Stored in: " . $_FILES["file"]["tmp_name"];
			}*/
			
        $today = date("YmdHis");
       	$upfile = './Public/uploads/files/'.$_FILES["file"]["name"];
		move_uploaded_file($_FILES['file']['tmp_name'], iconv("UTF-8","gb2312",$upfile));
		$upfile = $_FILES["file"]["name"];
        if(empty($title) || empty($author) || (empty($type1)&& $type1 != 0) || empty($content)|| empty($_FILES['file']['tmp_name'])){
        	echo "<script>alert('添加失败!');location.href='/home/admin/result_add'</script>";    
        }else{
            $data = array(
                'title' => $title,
                'author' => $author,
            	'content' => $content,
                'type' => $type1,
                'file' => $upfile,
            	'time' => $today
            );
            $id = $result->addResult($data);
            if($id){
                echo "<script>alert('添加成功!');location.href='/home/admin/result'</script>";
            }else{
                echo "<script>alert('添加失败!');location.href='/home/admin/result_add'</script>";
            }
        }
    }

    /**
     * 通知查看页面
     */
    public function result_show(){
        $this->assign('title', '成果显示');
        $result = D('Result');
        $id = $_GET['id'];
        $result_list = $result->getResultInfoById($id);
        $this->assign('result_list',$result_list);
        $this->assign('id',$id);
        $this->display();
    }

    /**
     * 通知修改操作
     */
    public function result_update(){
        header("Content-Type: text/html;charset=utf8");
        $result = D('Result');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $type1 = $_POST['type'];
        $id = $_POST['id'];
        $result_list = $result->getResultInfoById($id);        
        $upfile = $result_list[0]['file'];
        if(!empty($_FILES['file']['tmp_name'])){
        if($_FILES['file']['size'] > 20*1024*1024){  
   			echo '文件过大！';  
   			exit;  
			}	  	
    	/*if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />"; //由表单file input的到$_FILES的值
			}else {
				echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Stored in: " . $_FILES["file"]["tmp_name"];
			}*/
			
        $today = date("YmdHis");
       	$upfile = './Public/uploads/files/'.$_FILES["file"]["name"];
		move_uploaded_file($_FILES['file']['tmp_name'], iconv("UTF-8","gb2312",$upfile));
		$upfile = $_FILES["file"]["name"];
        }
        if(empty($title) || empty($author) || (empty($type1)&& $type1 != 0) || empty($content)){
        	die;
        	echo "<script>alert('修改失败!');location.href='/home/admin/result'</script>";    
        }else{
            $data = array(
                'title' => $title,
                'author' => $author,
            	'content' => $content,
                'type' => $type1,
                'file' => $upfile,
            );
            $id = $result->editResult($id,$data);
            if($id){
                echo "<script>alert('修改成功!');location.href='/home/admin/result'</script>";
            }else{
                echo "<script>alert('修改失败!');location.href='/home/admin/result'</script>";
            }
        }
    }


    /**
     * 通知删除操作
     */
    public function result_delete(){
        header("Content-Type: text/html;charset=utf8");
        $Result = D('Result');
        $id = $_GET['id'];
        $act = $Result->delResult($id);
        if($act){
            echo "<script>alert('删除成功!');location.href='/home/admin/result'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='/home/admin/result'</script>";
        }
    }
    
    
    
}