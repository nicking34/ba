<?php 
class FeedAction extends CommonAction{
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
	
	
	public function islike(){
		$uid = $_POST['uid'];
		$sfeedid = $_POST['sfeedid'];
		$islike = $_POST['islike'];
		$sfeedop = M('Sfeedop');
		$sfeed = M('Sfeed');
		$data['uid'] = $uid;
		$data['sfeedid'] = $sfeedid;
		$data4['sfeedid'] = $sfeedid;
		
		$op = $sfeedop->where($data)->find();
		if($op){
			if($op['status']==0){
				$data1['status'] = 1;
				$sfeedop->where($data)->save($data1);
				$data2['islike'] = $islike+1;
				$sfeed->where($data4)->setInc('islike');
			}else{
				$data2['islike'] = '已评价';
			}
		}else{
			$sfeed->where($data4)->setInc('islike');
			$data['status'] = 1 ;
			$sfeedop->add($data);
			$data2['islike'] = $islike+1;
		}

		$this->ajaxReturn($data2['islike'],'JSON');
		
	}
	
	public function unlike(){
		$uid = $_POST['uid'];
		$sfeedid = $_POST['sfeedid'];
		$unlike = $_POST['unlike'];
		$sfeedop = M('Sfeedop');
		$sfeed = M('Sfeed');
		$data['uid'] = $uid;
		$data['sfeedid'] = $sfeedid;
		$data4['sfeedid'] = $sfeedid;
		
		$op = $sfeedop->where($data)->find();
		if($op){
			if($op['status']==0){
				$data1['status'] = 2;
				$sfeedop->where($data)->save($data1);
				$data2['unlike'] = $unlike+1;		
				$sfeed->where($data4)->setInc('unlike');
			}else{
				$data2['unlike'] = '已评价';
			}
		}else{
			$sfeed->where($data4)->setInc('unlike');
			$data['status'] = 2 ;
			$sfeedop->add($data);
			$data2['unlike'] = $unlike+1;
		}
	
		$this->ajaxReturn($data2['unlike'],'JSON');
	
	}
	
	public function store(){
		$uid = $_POST['uid'];
		$sfeedid = $_POST['sfeedid'];
		$storenum = $_POST['storenum'];
		$sfeedop = M('Sfeedop');
		$sfeed = M('Sfeed');
		$data['uid'] = $uid;
		$data['sfeedid'] = $sfeedid;
		$data4['sfeedid'] = $sfeedid;
		
		$op = $sfeedop->where($data)->find();
		if($op){
			if($op['store']==0){
				$data1['store'] = 1;
				$sfeedop->where($data)->save($data1);
				$data2['store'] = $storenum+1;
				$sfeed->where($data4)->setInc('store');
			}else{
				$data2['store'] = "已收藏";
			}
		}else{
			$sfeed->where($data4)->setInc('store');
			$data['store'] = 1;
			$sfeedop->add($data);
			$data2['store'] = $storenum + 1 ;
		}
		
		$this->ajaxReturn($data2['store'],'JSON');
	}
	
	public function sub(){
		$uid = $_POST['uid'];
		$lfeedid = $_POST['lfeedid'];
		$lstorenum = $_POST['lstorenum'];
		$lfeedop = M('Lfeedop');
		$lfeed = M('Lfeed');
		$data['uid'] = $uid;
		$data['lfeedid'] = $lfeedid;
		$data4['lfeedid'] = $lfeedid;
		
		$op = $lfeedop->where($data)->find();
		if($op){
			if($op['store']==0){
				$data1['store'] = 1;
				$lfeedop->where($data)->save($data1);
				$data2['store'] = $lstorenum+1;
				$lfeed->where($data4)->setInc('store');
			}else{
				$data2['store'] = "已订阅";
			}
		}else{
			$lfeed->where($data4)->setInc('store');
			$data['store'] = 1;
			$lfeedop->add($data);
			$data2['store'] = $lstorenum + 1 ;
		}
		
		$this->ajaxReturn($data2['store'],'JSON');
	}
	
	public function comment(){
		$fid = $this->_param("sfeedid");
		$comment = M('Comment');
		$user = M('User');
		$map['fid'] = $fid;
		
		
		$list = $comment->where($map)->order('floor')->select();

		foreach($list as $key => $map){
			$data['uid'] = $map['uid'];
			$list[$key]['uname'] = $user->where($data)->getField('uname');
		}
	
		$this->assign('clist',$list);
		$this->assign('fid',$fid);
		$this->display();
	}
	
	public function insertComment(){
		
		$Comment = M('Comment');
		$Sfeed = M('Sfeed');
		$data['uid'] = $_POST['uid'];
		$data['fid'] = $_POST['fid'];
		$data['content'] = $_POST['content'];
		$data['ctime'] = time();
		$map['sfeedid'] = $_POST['fid'];
		
		$Sfeed->where($map)->setInc('comment');
		$data['floor'] = $Sfeed->where($map)->getField('comment');
		
		$Comment->add($data);
		$this->ajaxReturn($data,'JSON');
		
	}
	
	public function showlstore(){
		$lfeedid = $this->_param(3);
		$uid = $this->_param(4);
		$this->assign("lfeedid",$lfeedid);
		$this->assign("uid",$uid);
		$this->lstorelist($uid,$lfeedid);
		$this->rightbox($uid);
		$this->display();
	}
	
	public function showsop(){
		$uid = $_SESSION['uid'];
		$this->soplist($uid);
		$this->rightbox($uid);
		$this->display();
	}
	
	public function showlop(){
		$uid = $_SESSION['uid'];
		$this->loplist($uid);
		$this->rightbox($uid);
		$this->display();
	}
	
	public function showfriends(){
		$uid = $_SESSION['uid'];
		$this->friendlist($uid);
		$this->rightbox($uid);
		$this->display();
	}
}
?>








































