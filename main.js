function initialLoad(url) {
    $.ajax({
    type: 'POST',
    url: url,
    success: function (response) {
     $( '#data-div' ).html(response);
    }
    });
}

function initialLoad2(url) {
    $.ajax({
    url: url,
    success: function (response) {
     $( '#data-div2' ).html(response);
    }
    });
}

function footnoteLoad(){
    var currentTime = new Date()
    var year = currentTime.getFullYear()

    document.write("<footer class='footer'>Copyright © Star Optics AS 2018-" +year+". All rights reserved.</footer>");
}

$(document).ready(function(){
  $(".positive-int").inputFilter(function(value) {
    return /^-?\d*$/.test(value); });

  $(".currency_input").inputFilter(function(value) {
    return /^-?\d*[.,]?\d{0,2}$/.test(value); });
});

(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  };
}(jQuery));