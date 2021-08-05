$( document ).ready(function() {
    $('.click').on('click', function(){
        let i = document.querySelectorAll('fieldset').length;
        console.log(i);
        $(this).before($(".upload_data:last").clone().attr('name', i++));
    });
});
