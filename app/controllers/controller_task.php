<?php

class Controller_Task extends Controller
{
	function __construct() {
        parent::__construct();
		$this->model = new Model_Task();
	}

    function index($params) {
        $per_page = 3;

        $page = $params['page'] ?? 1;
        $order_by = $params['order_by'] ?? 'id';
        $items = $this->model->all($page, $per_page, $order_by);
        $total_pages = ceil($this->model->count() / $per_page);

        $this->view->render('tasks/index.php', 'template_view.php', [$total_pages, $items, $params]);
    }

    function show($params) {   
        $this->view->render('tasks/show.php', 'template_view.php', $this->get_item($params['id']));
    }

    function new($params) {   
        $data=[[], ['form'=>[], 'e'=>[]], 'create', $params['is_admin'] ?? 0];
        $this->view->render('tasks/new.php', 'template_view.php', $data);
    }

    function create($params) {
        $e = $this->task_validate($params);
        if ( count($e) == 0) {
            if ($this->model->add($params)) {
                $this->router->redirect('/');
            }
        } else {
            $data=['form'=>$params, 'e'=>$e, 'action'=>'create'];
            $this->router->redirect('/task/new?'.http_build_query($data));
        }
    }

    function edit($params) {
        $item = $this->get_item($params['id']);
        $data=[[], ['form'=>$item, 'e'=>[]], 'update/'.$params['id'], $params['is_admin'] ?? 0];
        $this->view->render('tasks/edit.php', 'template_view.php', $data);
    }

    function update($params) {
        $e = $this->task_validate($params);
        if ( count($e) == 0) {
            if ($this->model->update($params)) {
                $this->router->redirect('/');
            }
        } else {
            $this->view->render('tasks/edit.php', 'template_view.php', [$params, $e, 'update/'.$params['id']]);
        }        
    }

    function delete($params) {
        $this->view->render('tasks/delete.php', 'template_view.php', $params['id']);
    }

    function destroy($params) {
        if ($this->model->delete($params['id'])) {
            $this->router->redirect('/');
        } else {
            throw new Exception('Запись #'.$params['id'].' не может быть удалена.');
        }
    }

    private function get_item($id) {
        return is_numeric($id) ? $this->model->at($id) : [];
    }

    private function task_validate($params) {
        $e = [];
        if (strlen($params['name']) < 3) { $e['name'] = 'len >= 3'; }
        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) { $e['email'] = 'incorrect e-mail'; }
        if (strlen($params['task']) < 5) { $e['task'] = 'len >= 5'; }
        return $e;
    }
}
