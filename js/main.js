$(function () {
    $('#addNewAnswer').click(function () {
        $('.answers-cont').append("<div class='form-group d-flex justify-content-between add-answer-cont align-items-end'><div class='w-50'><label for='answerField' class='d-block'>Answer</label><input type='text' class='form-control text-align-left' id='answerField' name='answer[]' placeholder='Write answer'></div><div class='d-block'><label for='numberField' class='d-block'>Number of votes</label><input type='text' class='form-control text-align-left' id='numberField' required name='votesNumber[]' placeholder='Votes'></div><div class='profile-head h-100'><img class='remove-answer my-2' src='/images/remove.png' alt=''></div></div>");
    });
    $(document).on('click', '.remove-answer', function () {
        let parent = $(this).parent();
        $(parent).parent().remove();
    });

    /**
     *
     * getting GET params
     */
    function getUrlParams() {
        let params = [], hash;
        let hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (let i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            params.push(hash[0]);
            params[hash[0]] = hash[1];
        }
        return params;
    }

    let statusGetParam = getUrlParams()['status'];
    let titleGetParam = getUrlParams()['title'];
    let dateGetParam = getUrlParams()['date'];

    /**
     * Filter
     */
    let filterTitle = $('#filter-title');
    let filterDate = $('#filter-date');
    filterTitle.keypress(function (e) {
        if (e.which === 13) {
            $(this).parent().parent().submit();
        }
    });
    $("#filter-status option[value='" + statusGetParam + "']").attr('selected', 'selected');
    filterTitle.val(titleGetParam);
    filterDate.val(dateGetParam);

    $("#clear-filter").click(function () {
        let currentUrl = window.location.href;
        currentUrl = currentUrl.split('?')[0];
        window.location.replace(currentUrl);
    })
})
