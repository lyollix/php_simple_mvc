<?php

class Model_Task extends Model
{
    private $tasks;
    
    function __construct() {
        parent::__construct();
	}

	function all($page, $per_page, $order_by) {
        $sql = 'select * from tasks order by '.$order_by.' limit ? offset ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$per_page, ($page - 1) * $per_page]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

    function count() {
        $stmt = $this->db->prepare('select count(*) as n from tasks');
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['n'];
    }

    function at($id) {	
		$stmt = $this->db->prepare('select * from tasks where id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
	}

    function add($params) {
        return $this->db->prepare("insert into tasks(name, email, task) values(?,?,?)")
            ->execute([$params['name'], $params['email'], $params['task']]);
    }

    function update($params) {
		return $this->db->prepare("update tasks set name=?, email=?, task=?, status=? where id=?")
            ->execute([$params['name'], $params['email'], $params['task'], $params['status'], $params['id']]);
    }

    function delete($id) {
		return $this->db->prepare("delete from tasks where id=?")
            ->execute([$id]);
    }
}
