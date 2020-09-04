const root = document.currentScript.getAttribute('root');

$(function(){
    $('#logoutBtn').click(function(){
        $.ajax(`${root}api/logout.php`)
        .done(function(){
            window.location.replace(`${root}login.php`);
        });
    });
});