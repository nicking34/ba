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
			$this->success('正确',__APP__.'/User/home');
		}else{
			$this->error('错误');
		}
		foreach ($data as $key => $value)
			$_SESSION[$key] = $value ;
		$_SESSION['islogin'] = 1;		       
	}
}