<?php

class Controller_Not_found extends Controller
{
	function index($params) {
		$this->view->render('404_view.php', 'template_view.php');
	}

}
