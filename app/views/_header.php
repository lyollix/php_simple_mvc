<nav class="navbar navbar-light bg-light mb-3">
	<div class="container">
		<a class="navbar-brand" href="/">
		<img src="/assets/i/logo.png" alt="" width="60" height="53" class="d-inline-block">
		<span class="fw-light ps-2">TASKS</span>
		</a>
		<div>
            <?php if (!isset($_COOKIE['is_admin'])) {
                echo '<a href="/auth/login" class="btn btn-outline-primary">Вход</a>';
            } else {
                echo '<a href="/auth/logout" class="btn btn-outline-primary">Выход</a>';
            } ?>
            
		</div>
	</div>
</nav>