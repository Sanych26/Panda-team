$(function(){
    let count = 0;
    $('#button').click(function (){
        count = count+1;
        $('#button span').text(count);
    })
})
