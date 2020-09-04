
$(function(){

    $('#gitauthBtn').click(function(){
        $.ajax(`${root}api/github.php`)
        .done(function(data){
            window.location=data;
        });
    });

});