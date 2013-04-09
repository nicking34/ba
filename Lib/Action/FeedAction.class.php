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
	
	public function insertLstore(){
		//Lstore作为Sfeed的特殊形式，插入到Sfeed中
		$Sfeed = D('Sfeed');
		if($Sfeed->create()){
			$result = $Sfeed->add();
			if($result){
				$this->success('续写直播成功!');
			}else{
				$this->error('错误，请重新续写直播!');
			}
		}else{
			$this->error($Sfeed->getError());
		}
		//要在Lfeed中更新sfeednum//要在Lfeed中更新sfeednum
		$Lfeed = M('Lfeed');
		$map['lfeedid'] = $_POST['lfeedid'];
		$Lfeed->where($map)->setInc('sfeednum');
		//Lstore表负责连接该Sfeed以及其附属的Lfeed
		$Lstore = M('Lstore');
		$data['lfeedid'] = $_POST['lfeedid'];
		$data['sfeedid'] = $result;
		$data['floor']= $Lfeed->where($map)->getField('sfeednum');
		$Lstore->add($data);	
	}
	
	public function updateUserCount($uid,$udfield){
		$ucount = M('User_count');
		$ucount->where($uid)->setInc($udfield,1);
	}
	
	public function addLstore(){//输出直播的页面显示
		$lfeed = M('Lfeed');
		$map['uid'] = $_SESSION['uid'] ;
		$lfeedlist = $lfeed->where($map)->select();
		$this->assign('lfeedlist',$lfeedlist);
		$this->display();
	}
	

	
}
?>