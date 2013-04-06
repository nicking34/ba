<?php
class PublicAction extends Action{
	protected function checkLogin(){
		if(empty($_POST['uname'])) {
            $this->error('帐号错误！');
        }elseif (empty($_POST['password'])){
            $this->error('密码必须！');
        }
	}
}