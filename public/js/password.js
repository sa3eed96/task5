const root = document.currentScript.getAttribute('root');

$(function(){
    $('#passwordForm').submit(function(e){
        e.preventDefault();
        clearErrors();

        const formData = new FormData($('form')[0]);
        $.ajax({
            url: `${root}api/password.php`,
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
        })
        .done(function(){
            window.location.replace(root);
        })
        .fail(function(err){
            if(err === 'redirect'){
                window.location.replace(root);
            }else{
                const errors = $.parseJSON(err.responseText);
                for(err in errors){
                    $(`#${err}Error`).text(errors[err]);
                };
            }
        });
    });

    const clearErrors = ()=>{
        $(`#passwordError`).text('');
    };
});