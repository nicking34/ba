<?php
class UserAction extends Action{
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
}