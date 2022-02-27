<?php

class Controller_Auth extends Controller
{
	function login($params) {
		$this->view->render('auth/login_view.php', 'template_view.php');
	}
	
	function login_check($params) {
		
		if ($params['user'] == 'admin' && $params['pass'] == '123') {
			setcookie('is_admin', true, (time() + 31536000) , '/');
			$this->router->redirect('/');
		} else {
			header("HTTP/1.1 400 Bad Request");
		}
	}

	function logout($params) {		
		unset($_COOKIE['is_admin']);
		setcookie('is_admin', null, -1, '/'); 
		$this->router->redirect('/');
	}
}
