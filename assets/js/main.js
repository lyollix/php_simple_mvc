document.addEventListener("DOMContentLoaded", function(event) {

    const login_form = document.getElementById('login_form');

    login_form && login_form.addEventListener('submit', e => {
        e.preventDefault();

        const name = document.querySelector('#name').value;
        const pass = document.querySelector('#password').value;
        const str = `${name}:${pass}`;
        const base64 = btoa(str);

        const xhr = new XMLHttpRequest();
        xhr.open("GET", '/auth/login_check');
        xhr.setRequestHeader("Authorization", `Basic ${base64}`);
        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) { 
            if (xhr.status === 200) {
                window.location.href = '/';
            } else if (xhr.status === 400) {
                const error_el = document.getElementById('error');
                error_el.innerHTML = '<div class="alert alert-danger mb-3">Реквизиты доступа неверны!</div>';
            }
        }};

        if (xhr.status !== 400) xhr.send();  
    });

    const select_el = document.getElementById('order_by');
    select_el && select_el.addEventListener('change', e => {
        document.cookie = `order_by=${e.target.value}; expires=Sun, 1 Jan 2023 00:00:00 UTC; path=/`
        const xhr = new XMLHttpRequest();
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page') || 1;
        xhr.open("GET", '/');
        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            window.location.href = `/?page=${page}`;
        }};
        xhr.send();
        
    });
});
