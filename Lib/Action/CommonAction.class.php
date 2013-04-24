<?php 
class CommonAction extends Action{
	public function test(){
		$this->assign('test1','1111111');
	}
	
	public function rightbox($uid){
		$usercount = M('User_count');
		$user = M('User');
		$friend = M('Friend');
		
		$map['uid'] = $uid;
		$countlist = $usercount->where($map)->find();
		$countlist['uname'] = $user->where($map)->getField('uname');
		
		
		$myid = $_SESSION['uid'];
		$map['fansid'] = $myid;
		
		if ($map['uid'] == $map['fansid']){
			$isfriend = 0 ;//用户看到自己的名片，不显示关注按钮
		}else{
			$result = $friend->where($map)->find();
			if($result){
				$isfriend = 1;//两人已经是好友关系
			}else{
				$isfriend = 2;//未关注
			}
		}
		$countlist['isfriend'] = $isfriend;
		
		$this->assign('cdata',$countlist);
	}
	
	public  function feedlist($uid){//信息流读取输出
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$lfeed = M('Lfeed');
		$lstore = M('Lstore');
	
		if($uid == NULL){
			$slist = $sfeed->limit(20)->order('sfeedid')->select();
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
	
	public  function lstorelist($uid,$lfeedid){
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$lfeed = M('Lfeed');
		$lstore = M('Lstore');
		
		$data['lfeedid'] = $lfeedid;
		$list = $lstore->where($data)->order('floor')->select();
		$ldata = $lfeed->where($data)->find();
		
		foreach ($list as $key => $map){		
			$data1['sfeedid'] = $map['sfeedid'];
			$slist = $sfeed->where($data1)->find();
			
			foreach ($slist as $skey => $smap){
				$list[$key][$skey] = $smap;
			}				
		}
		
		
		
		$this->assign('slist',$list);
		$this->assign('ldata',$ldata);
	}
	
	public function soplist($uid){
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$sfeedop = M('Sfeedop');
		
		$data['uid'] = $uid;
		$data['store'] = 1 ;
		
		$slist = $sfeedop->where($data)->select();

		foreach ($slist as $key => $map){	
			$data1['sfeedid'] = $map['sfeedid'];
			$list = $sfeed->where($data1)->find();
				
			foreach ($list as $skey => $smap){
				$slist[$key][$skey] = $smap;
			}
			
			$data2['uid'] = $slist[$key]['uid'];
			$slist[$key]['uname'] = $user->where($data2)->getField('uname');
			
		}
	
		$this->assign('slist',$slist);
	}
	
	public function loplist($uid){
		$lfeed = M('Lfeed');
		$user = M('User');
		$lfeedop = M('Lfeedop');
		
		$data['uid'] = $uid;
		$data['store'] = 1 ;
		
		$slist = $lfeedop->where($data)->select();
		
		foreach ($slist as $key => $map){
			$data1['lfeedid'] = $map['lfeedid'];
			$list = $lfeed->where($data1)->find();
			
			foreach ($list as $skey => $smap){
				$slist[$key][$skey] = $smap;
			}
			
			$data2['uid'] = $slist[$key]['uid'];
			$slist[$key]['uname'] = $user->where($data2)->getField('uname');
						
		}
		
		$this->assign('slist',$slist);
	}
	
	public function friendlist($uid){
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$lfeed = M('Lfeed');
		$lstore = M('Lstore');
		$friend = M('Friend');
		
		$data4['fansid'] = $uid;
		$friendlist = $friend->where($data4)->select();

		$i = 0;
		foreach ($friendlist as $key => $map){
			$data3['uid'] = $map['uid'];
			$flist = $sfeed->where($data3)->select();
			foreach ($flist as $fkey => $fmap){
				foreach ($fmap as $skey => $smap){
					$slist[$i][$skey] = $smap;
				}
				$i++;
			}	
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