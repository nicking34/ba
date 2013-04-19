<?php 
class CommonAction extends Action{
	public function test(){
		$this->assign('test1','1111111');
		//$this->display();
	}
	
	public function rightbox($uid){
		$usercount = M('User_count');
		$user = M('User');
		$map['uid'] = $uid;
		$countlist = $usercount->where($map)->find();
		$countlist['uname'] = $user->where($map)->getField('uname');
		$this->assign('cdata',$countlist);
		//$this->display('User:rightbox');
	}
	
	public  function feedlist($uid){//信息流读取输出
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$lfeed = M('Lfeed');
		$lstore = M('Lstore');
	
		if($uid == NULL){
			$slist = $sfeed->limit(20)->order('ctime')->select();
		}else{
			$data3['uid'] = $uid;
			$slist = $sfeed->where($data3)->order('ctime')->select();
		}
	
		foreach($slist as $key => $map){
			$data['uid'] = $map['uid'];
			$slist[$key]['uname'] = $user->where($data)->getField('uname');
	
			if($slist[$key]['status'] == 2){
				$data1['sfeedid'] = $map['sfeedid'] ;
				$lstore_data = $lstore->where($data1)->find();
				$slist[$key]['floor'] = $lstore_data['floor'];
				$data2['lfeedid'] = $lstore_data['lfeedid'];
				$llist = $lfeed->where($data2)->find();
				$slist[$key]['title'] = $llist['title'];
				$slist[$key]['lfeedid'] = $lstore_data['lfeedid'];
				$slist[$key]['lstorenum'] = $llist['store'] ;
			}
		}
		$this->assign('slist',$slist);
	}
}
?>