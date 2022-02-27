<form action="/task/<?=$data[2];?>">
    <div class="container px-0">
        <div class="row">
            <div class="col mb-3">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?=$data[1]['form']['name']??'';?>" required>
                <div class="text-danger"><?= $data[1]['e']['name'] ?? ''; ?></div>
            </div>
            <div class="col mb-3">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?=$data[1]['form']['email']??'';?>" required>
                <div class="text-danger"><?=$data[1]['e']['email']??'';?></div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="task">Task:</label>
                <textarea id="task" name="task" class="form-control" rows="15" cols="35"><?=$data[1]['form']['task']??'';?></textarea>
                <div class="text-danger"><?=$data[1]['e']['task']??'';?>
                </div>
            </div>
        </div>

        <?php if ($data[3]): ?>
        <div class="row">
            <div class="col mb-3">
                <div class="form-check">
                    <input type="checkbox" id="status" name="status" class="form-check-input">
                    <label for="status" class="form-check-label">Статус</label>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-outline-primary">Сохранить</button>
        <a href="/" class="btn btn-outline-secondary">Отмена</a>
    </div>
</form>