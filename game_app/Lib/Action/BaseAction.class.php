<?php
class BaseAction extends Action {
	
	protected	$m_uid = 0;//操作者uid
	protected	$v_uid = 0;//被查看人uid
	protected   $muidInfo = '';
	protected   $needLogin = true;
	
	public function _initialize() {
		$this->initUser();
	}
	
	//用户信息初始化
	private function initUser(){
		
		if($this->needLogin && intval($_SESSION['m_uid']) <= 0){
			//跳转到登陆页
		}
		
		$this->m_uid = intval($_SESSION['m_uid']);
		$this->v_uid = intval($_REQUEST['v_uid'] == 0 ? $this->m_uid : $_REQUEST['v_uid']);
		$UserLoginModel = M('UserLogin');
		$this->muidInfo = !empty($this->m_uid) ? $UserLoginModel->find($this->m_uid) : array();
	
	}
	
}