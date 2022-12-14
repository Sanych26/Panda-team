$(function(){
    let input = jQuery('<input name="answer">');
    jQuery('#formID').append(input);
    $('#button').click(function (){
        count = count+1;
        $('#button span').text(count);
    })
})
