<?php 
class CommonAction extends Action{
	public function test(){
		$this->assign('test1','1111111');
		//$this->display();
	}
	
	public function rightbox(){
		$usercount = M('User_count');
		$map['uid'] = $_SESSION['uid'];
		$countlist = $usercount->where($map)->find();
		$this->assign('cdata',$countlist);
		//$this->display('User:rightbox');
	}
}
?>