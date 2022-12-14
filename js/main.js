$(function(){
    $('#addNewAnswer').click(function (){
        $('.answers-cont').append("<div class='form-group d-flex justify-content-between add-answer-cont align-items-end'><div class='w-50'><label for='answerField' class='d-block'>Answer</label><input type='text' class='form-control text-align-left' id='answerField' name='answer[]' placeholder='Write answer'></div><div class='d-block'><label for='numberField' class='d-block'>Number of votes</label><input type='text' class='form-control text-align-left' id='numberField' required name='votesNumber[]' placeholder='Votes'></div><div class='profile-head h-100'><img class='remove-answer my-2' src='/images/remove.png' alt=''></div></div>");
    })
    $(document).on('click', '.remove-answer',function (){
        let parent = $(this).parent();
        $(parent).parent().remove();
    })
})
