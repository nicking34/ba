<?php
class PublicAction extends CommonAction{
	public function checkLogin(){
		if(empty($_POST['uname'])) {
            $this->error('需要用户名');
        }elseif (empty($_POST['password'])){
            $this->error('需要密码');
        }
        
        $map['uname'] = $_POST['uname'];
        $map['password'] = $_POST['password'];
		$data = M("User")->where($map)->find();
		if($data){
			$this->success('正确',__APP__.'/Public/home');
		}else{
			$this->error('错误');
		}
		foreach ($data as $key => $value)
			$_SESSION[$key] = $value ;
		$_SESSION['islogin'] = 1;		       
	}
	
	public function home(){			
		$this->feedlist();
		$uid = $_SESSION['uid'];
		$this->rightbox($uid);
		$this->test();		
		$this->display();
	}

	/*
	public function test(){
		$this->assign('test1','1111111');
		//$this->display();
	}
	*/
	

	
	public function userlist($uid){
		$sfeed = M('Sfeed');
		$data['uid'] = $uid;
		return $sfeed->where($data)->order('ctime')->select();
	}

}




























