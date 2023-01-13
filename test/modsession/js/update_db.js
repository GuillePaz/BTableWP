$(document).ready(function () {
    $("#options-form").submit(function (e) { 
        
        e.preventDefault();
        $.post(e.attr('action'), e.serialize(),);
        
    });
    
});

