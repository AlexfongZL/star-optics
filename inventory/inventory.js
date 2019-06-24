function loaddata(url)
{
   var id = document.getElementById("prod_id").value;
   var brand = document.getElementById("prod_brand").value;
   var type = document.getElementById("prod_type").value;

    $.ajax({
    type: 'post',
    url: url,
    data: {
     'id': id,
     'brand': brand,
     'type' : type
    },
    success: function (response) {
     $( '#content-div' ).html(response);
    }
    });
  }

function search()
{
   var id = document.getElementById("prod_id").value;
   var brand = document.getElementById("prod_brand").value;
   var type = document.getElementById("prod_type").value;

    $.ajax({
    type: 'post',
    url: 'inventory_list.php',
    data: {
     'id': id, 
     'brand': brand,
     'type' : type
    },
    success: function (response) {
     $( '#content-div' ).html(response);
    }
    });
  }

function deleteConfirmation(prod_id)
{
  $.ajax({
    url:'delete_inventory.php',
    type:'post',
    data:{id:prod_id},
    success: function(response){
       window.location.reload();
    }
  })
}

  $(document).on("keyup input", "#product-id", function(){
      var inputVal = $(this).val();
      var resultDropdown = $('#result2').css({"display":"block"});

      // if inputVal has some string
      if(inputVal.length){
           $.ajax({
              type: 'POST',
              data: {term:inputVal},
              url: 'backend-search-inv.php',
              success: function(data){
                  resultDropdown.html(data);
              }
          });
      }
      else{
          resultDropdown.empty();
      }
  });

$(document).ready(function(){

      $('.supp-search').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        //var resultDropdown = $(".result");
        if(inputVal.length){
            $.get("backend-search-supplier.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                $(".result").html(data);
            });
        } else{
            $(".result").empty();
        }
    });

   $(document).on("click", ".result p", function(){        
        var name = $(this).text();
        $.get("autocomplete_supplier.php", {term: name}).done(function(data){
                // Display the returned data in browser
                var cus_info = jQuery.parseJSON(data);
                $('#item_supp_id').val(cus_info[0]);
            });
        //this will remove the result list
        $(this).parent(".result").empty();
    });

  $(".positive-int").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });

  $(".currency_input").inputFilter(function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });

/* Jquery part that only allows one checkbox button to be clicked*/
  $('input[type="checkbox"]').on('change', function() {
    $(this).siblings('input[type="checkbox"]').prop('checked', false);

    if($('#check_single').is(':checked'))
    {
        $('#check_single_div').show();
        //$('#check_single_div input[type="text"]').prop('required',true);
        $('#check_single_div input[type="text"]').attr('required','required');

        $('#check_boxed_div input[type="text"]').val('');
        //$('#check_boxed_div input[type="text"]').prop('required',false);
        $('#check_boxed_div input[type="text"]').removeAttr('required');
        $('#check_boxed_div').hide();
    }

    if($('#check_boxed').is(':checked'))
    {
        $('#check_single_div input[type="text"]').val('');
        //$('#check_single_div input[type="text"]').prop('required',false);
        $('#check_single_div input[type="text"]').removeAttr('required');
        $('#check_single_div').hide();

        $('#check_boxed_div').show();
        //$('#check_boxed_div input[type="text"]').prop('required',true);
        $('#check_boxed_div input[type="text"]').attr('required','required');
    }
    
  });

  if($('#check_single').is(':checked')){
      $('#check_single_div').show();
      $('#check_single_div input[type="text"]').prop('required',true);

      $('#check_boxed_div input[type="text"]').val('');
      $('#check_boxed_div input[type="text"]').prop('required',false);
      $('#check_boxed_div').hide();
    }

    if($('#check_boxed').is(':checked')){
      $('#check_single_div input[type="text"]').val('');
      $('#check_single_div input[type="text"]').prop('required',false);
      $('#check_single_div').hide();

      $('#check_boxed_div').show();
      $('#check_boxed_div input[type="text"]').prop('required',true);
    }

    $('#check_boxed_div').on('change',function(){
      $('#item_quantity_box').val($('#item_box_num').val() * $('#item_num_per_box').val());
    })

    $('#add_item_submit').on('click',function(){
      
    })

    $("#back").click(function()
    {
       window.location = 'inventory.html'
    });
    
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

