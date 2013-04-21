<?php
class UserAction extends CommonAction{
	public function insert(){
		$User = D('User');
		if($User->create()){
			$result = $User->add();
			if($result){
				$this->success('success!');
			}else{
				$this->error('Error!');
			}
		}else{
			$this->error($User->getError());
		}
		$ucount = M('User_count');
		$data['uid'] = $result;
		$ucount->add($data);
	}
	
	public function showUser(){
		$uid = $this->_param(2);
		$this->assign("uid",$uid);
		$this->feedlist($uid);
		$this->rightbox($uid);
		$this->display();
	}
	
	public function addfriend(){
		$uid = $_POST['uid'];
		$myid = $_SESSION['uid'];
		$data['uid'] = $uid;
		$data['fansid'] = $myid;
		
		$friend = M('Friend');
		$friend->add($data);
		
		$cnt = "<p>已关注</p>";
		$this->ajaxReturn($cnt,'JSON');
	}
	
	public function delfriend(){
		$uid = $_POST['uid'];
		$myid = $_SESSION['uid'];
		$data['uid'] = $uid;
		$data['fansid'] = $myid;
		
		$friend = M('Friend');
		$friend->where($data)->delete();
		
		$cnt = "已取消关注";
		$this->ajaxReturn($cnt,'JSON');
	}
	
	
	
	
}