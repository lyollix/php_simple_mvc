<?php $s = $data[2]['order_by'] ?? 'id'; ?>

<div class="d-flex justify-content-between align-items-center">
    <h1>Index Page</h1>
    <form>
        <label for="order_by">Сортировка:</label>
        <select name="order_by" id="order_by">
            <option value="id" <?= $s=='id' ? 'selected' : ''; ?>>id</option>
            <option value="name" <?= $s=='name' ? 'selected' : ''; ?>>name</option>
            <option value="email" <?= $s=='email' ? 'selected' : ''; ?>>email</option>
            <option value="status" <?= $s=='status' ? 'selected' : ''; ?>>status</option>
        </select>
    </form>
    <a href="/task/new" class="btn btn-success">Добавить задачу</a>
</div>

<?php  
    foreach($data[1] as $item) {
        include 'app/views/tasks/_item.php';
    }
    include 'app/views/tasks/_paginate.php';
?>
