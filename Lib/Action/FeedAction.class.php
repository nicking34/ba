<?php 
class FeedAction extends Action{
	public  function insertSfeed(){
		$Sfeed = D('Sfeed');
		if($Sfeed->create()){
			$result = $Sfeed->add();
			if($result){
				$this->success('发布短篇成功!');
			}else{
				$this->error('错误，请重新发布短篇!');
			}
		}else{
			$this->error($Sfeed->getError());
		}
		$map['uid'] = $_POST['uid'];
		$this->updateUserCount($map, 'sfeed');
	}
	
	public  function  insertLfeed(){
		$Lfeed = D('Lfeed');
		if($Lfeed->create()){
			$result = $Lfeed->add();
			if($result){
				$this->success('创建直播成功!');
			}else{
				$this->error('错误，请重新创建直播!');
			}
		}else{
			$this->error($Lfeed->getError());
		}
		$map['uid'] = $_POST['uid'];
		$this->updateUserCount($map, 'lfeed');
	}
	
	public function updateUserCount($uid,$udfield){
		$ucount = M('User_count');
		$ucount->where($uid)->setInc($udfield,1);
	}
}
?>