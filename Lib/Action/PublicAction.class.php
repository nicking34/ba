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
		$this->rightbox();
		$this->test();		
		$this->display();
	}

	/*
	public function test(){
		$this->assign('test1','1111111');
		//$this->display();
	}
	*/
	
	public  function feedlist($uid){//信息流读取输出
		//显示sfeed
		$sfeed = M('Sfeed');
		$user = M('User');
		$lfeed = M('Lfeed');
		$lstore = M('Lstore');
		
		if($uid == NULL){
		$slist = $sfeed->limit(20)->order('ctime')->select();
		}
		
		foreach($slist as $key => $map){
			$data['uid'] = $map['uid'];
			$slist[$key]['uname'] = $user->where($data)->getField('uname');
				
			if($slist[$key]['status'] == 2){
				$data1['sfeedid'] = $map['sfeedid'] ;
				$lstore_data = $lstore->where($data1)->find();
				$slist[$key]['floor'] = $lstore_data['floor'];
				$data2['lfeedid'] = $lstore_data['lfeedid'];
				$slist[$key]['title'] = $lfeed->where($data2)->getField('title');
			}
		}
		$this->assign('slist',$slist);
	}
	
	public function userlist($uid){
		$sfeed = M('Sfeed');
		$data['uid'] = $uid;
		return $sfeed->where($data)->order('ctime')->select();
	}

}




























