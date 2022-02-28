<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-grid">
            <span class="fs-5">#<?=$item["id"];?></span>
            <span class="text-secondary"><?=$item["status"]?'Выполнено':'Не выполнено';?></span>
        </div>
        <div class="d-grid float-end">
            <span class="fs-5"><?=$item["name"];?></span>
            <span class="text-secondary"><?=$item["email"];?></span>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text"><?=$item["task"];?></p>
        <div class="list-group list-group-horizontal float-end">    
            <a class="list-group-item" href="/task/show/<?=$item['id'];?>">Show</a>
            <?php if ($data[3]): ?>
                <a class="list-group-item" href="/task/edit/<?=$item['id'];?>">Edit</a>
                <a class="list-group-item" href="/task/delete/<?=$item['id'];?>">Delete</a>
            <?php endif; ?>
        </div>
    </div>
</div>
