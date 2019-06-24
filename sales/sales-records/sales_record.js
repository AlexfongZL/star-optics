
function total_earning(){

    $.ajax({
	    type: 'POST',
	    url: 'earning.php',
	    success: function (response) {
	    	$( '#content-div' ).html(response);
	    }
    });
}