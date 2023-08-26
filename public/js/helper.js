var showLoading = function () {
    Swal.fire({
        title: 'Loading ...',
        onBeforeOpen () {
          Swal.showLoading ()
        },
        
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
    })
};

var hideLoading = function () {
    Swal.hideLoading ()
    Swal.close()
};

var setToastMessage = function (message) {
    localStorage.setItem('action', JSON.stringify({
        success: true,
        message: message
    }));
};
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});


function showToastSuccess (message) {
    Toast.fire({
        type: 'success',
        title: message
      })
};

function showToastError (message) {
    Toast.fire({
        type: 'error',
        title: message
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
