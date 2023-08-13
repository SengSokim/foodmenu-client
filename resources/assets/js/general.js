window.showLoading = function () {
    if($('body').is(':loading')) {
        return;
    }

    $('body').loading({
        zIndex : 10000
    });
}

window.hideLoading = function () {
    $('body').loading('stop');
}

window.showAlertError = function (messages) {
    let error_message = messages;
    if(Array.isArray(messages) || typeof(messages) === 'object') {
        error_message = '';
        for (let key in messages) {
            error_message = error_message + messages[key] + '<br>';
        }
    }
    error_message = error_message ? error_message : "Something went wrong";
    $.alert({
        title: 'Message!',
        content: error_message,
        type: 'orange',
        typeAnimated: true,
        escapeKey: 'close',
        buttons: {
            close: function () {
            }
        }
    });
}

// window.onload = function () {
    // $('table > thead .sorting, table > thead .sorting_asc, table > thead .sorting_desc').on('click', function() {
    //     window.location.href = $(this).data('url');
    // })
// }
