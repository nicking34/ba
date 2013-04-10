<?php
class PublicAction extends Action{
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
		//显示USER_COUNT信息
		$usercount = M('User_count');
		$map['uid'] = $_SESSION['uid'];
		$countlist = $usercount->where($map)->find();
		$this->assign('cdata',$countlist);
		
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$slist = $sfeed->limit(10)->order('ctime')->select();
		foreach($slist as $key => $map){
			$data['uid'] = $map['uid'];
			$slist[$key]['uname'] = $user->where($data)->getField('uname');
		}
		$this->assign('slist',$slist);
		
		$this->display();
	}
}




























