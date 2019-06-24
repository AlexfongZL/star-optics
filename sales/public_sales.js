// this function is initiated to run main-interface.html
function intialLoad(url) {
    $.ajax({
    type: 'POST',
    url: url,
    success: function (response) {
     $( '#content-div' ).html(response);
    }
    });
}

