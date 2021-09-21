var showLoading = function () {
    $('body').loading({
        zIndex : 10000
    });
};

var hideLoading = function () {
    $('body').loading('stop');
};

var setToastMessage = function (message) {
    localStorage.setItem('action', JSON.stringify({
        success: true,
        message: message
    }));
};

var showToastSuccess = function (message) {
    $.toast({
        heading: 'Success',
        text: message,
        showHideTransition: 'slide',
        icon: 'success'
    })
};

var showToastError = function (message) {
    $.toast({
        heading: 'Error',
        text: message,
        showHideTransition: 'slide',
        icon: 'error'
    })
};

$(function () {
    let alert = localStorage.getItem('action');
    if (alert) {
        alert = JSON.parse(alert);
        if (alert.success == true) {
            $.toast({
                heading: 'Success',
                text: alert.message,
                showHideTransition: 'slide',
                icon: 'success'
            })
        }
        localStorage.setItem('action', '');
    }
});

var showAlertError = function (messages) {
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