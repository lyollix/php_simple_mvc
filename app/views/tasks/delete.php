<h1>Delete Page</h1>

<form action="/task/destroy/<?=$data;?>">
    <p>Вы действительно хотите удалить запись #<?=$data;?>?</p>

    <button type="submit" class="btn btn-outline-danger">Да</button>
    <a href="/" class="btn btn-outline-secondary">Отмена</a>
</form>