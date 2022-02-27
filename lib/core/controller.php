<?php

class Controller {
	
	public $router;
	public $model;
	public $view;
	
	function __construct() {
		$this->view = new View();
		$this->router = new Router();
	}
	
}
