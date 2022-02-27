<?php

class View
{	
	function render($content_view, $template_view, $data = NULL)
	{
		include 'app/views/'.$template_view;
	}
}
