<?php

class Router
{
	function start() {
		$request_uri = $_SERVER['REQUEST_URI'];
		$url = parse_url($request_uri);
		$routes = explode('/', $url['path']);
		
		$query = $url['query'] ?? '';
		$params = [];
		if ($query) {
			parse_str($query, $params);
		}		

		$resource = ucwords(!empty($routes[1]) ? $routes[1] : 'task');
		$action_name = !empty($routes[2]) ? $routes[2] : 'index';
		
		$params['id'] = !empty($routes[3]) ? $routes[3] : 0;
		if (isset($_SERVER['PHP_AUTH_USER'])) {
			$params['user'] =  $_SERVER['PHP_AUTH_USER'];
		}

		if (isset($_SERVER['PHP_AUTH_PW'])) {
			$params['pass'] =  $_SERVER['PHP_AUTH_PW'];
		}
		
		foreach ($_COOKIE as $key => $value) {
			$params[$key] = $value;
		}

		$model_name = 'Model_'.$resource;
		$controller_name = 'Controller_'.$resource;

		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if (file_exists($model_path)) {
			require_once "app/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if (!file_exists($controller_path)) {
			$this->redirect('/not_found');
		} else {
			require_once "app/controllers/".$controller_file;
			$controller = new $controller_name;
			$action = $action_name;	
			if (method_exists($controller, $action)) {
				$controller->$action($params);			
			} else {
				$this->redirect('/not_found');
			}
	    }
	}

	function redirect($path) {
		header('Location: '.$path);
	}
}
