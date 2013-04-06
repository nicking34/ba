<?php
class UserModel extends Model{
	protected $_auto = array(
		array('ctime','time',1,'function'),
	);
}