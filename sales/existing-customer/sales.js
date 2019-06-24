/*
1.  To perform CRUD (create, read, update, and delete) on the customer(s) records.
2.  To record and transact the daily sales of the business.
3.  To perform inventory checking and notify optician on which item is low in stock.

*/

(function(){
    /*This function will call itself every 1 second*/
    $.ajax({
        url: '../check.php',
        success: function (response) {

            if ($.trim(response)){
                fillInTheForm(response);
            }
        },
        error: function(){
            console.log('Contact Alex!');
        }
    });

    setTimeout(arguments.callee, 1000);
})();

function fillInTheForm(response){

    var inv_info = jQuery.parseJSON(response);

    $('.product-id').each(function(){

        if($(this).val().length==0){
            var row_id= this.id.replace('prod_id_', '');
                
            $(this).val(inv_info[0]);
            $(this).closest('td').siblings().find('#prod_type_'+row_id).val(inv_info[1]);
            $(this).closest('td').siblings().find('#prod_colour_'+row_id).val(inv_info[2]);
            $(this).closest('td').siblings().find('#prod_price_'+row_id).val(inv_info[3]);

            $(this).closest('td').siblings().find('#prod_qty_'+row_id).val(1);
            $(this).closest('td').siblings().find('#prod_disct_'+row_id).val(0);

            return false;
        }
    });

    ajaxRemove(inv_info[0]);
}

function ajaxRemove(codeID){
        $.ajax({
            type: 'POST',
            data: {codeID : codeID},
            url: '../remove.php',
            success: function (response) {
                console.log(response);
            },
            error: function(){
            }
    });
}

// this function is initiated to run customer-form.html
function intialLoad(url) {

    $.ajax({
    type: 'POST',
    url: url,
    success: function (response) {
     $( '#content-div' ).html(response);
    }
    });
}

function salesLoad() {

    //show the sales table for scanning
    $('#content-div').hide();
    $('#content-div2').show();

    $.ajax({
    type: 'POST',
    url: '../sales-form.html',
    success: function (response) {
     $( '#content-div2' ).html(response);
    }
    });
}

function cusLoad() {

    $('#content-div2').hide();
    $('#content-div').show();

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById("sales-form-button").className += " active";
}

var num_of_row = 0;
var current_row = 0;

function sumPrice(){

    var sum = 0;
    var converted = 0;

    current_row = 1;

    $('.prod_price').each(function(){

        var this_product_id = $(this).closest('td').siblings().find('#prod_id_'+current_row).val();
        var this_quantity = $(this).closest('td').siblings().find('#prod_qty_'+current_row).val();
        var this_discount = $(this).closest('td').siblings().find('#prod_disct_'+current_row).val();
        var discount = 1 - parseInt(this_discount) / 100;

        calculate(this_product_id,this_quantity,discount,current_row);
        var this_sum = parseInt($('#prod_price_'+current_row).val());
        sum = sum + this_sum;
        current_row++;
     });
    sum = sum.toFixed(2);
    $('#total-price').val(sum);
}

function calculate(this_product_id,this_quantity,discount,current_row){
    $.ajax({
        type: 'POST',
        data: {term:this_product_id},
        url: '../autocomplete_inv.php',
        success: function (response) {
            var inv_info = jQuery.parseJSON(response);

            var this_price = inv_info[3];

            var multiplication = parseInt(this_price) * discount.toFixed(2) * parseInt(this_quantity);
            $('#prod_price_'+current_row).val(multiplication);
        },
        error: function(){
            console.log('Contact Alex!');
        }
    });
}


var isValid;

function checkEmpty(){
    $(".product-id").each(function(){
        var element = $(this);

        if(element.val()==""){
            isValid = false; 
        }
        else{
            isValid = true;
        }
    })
}


var prod_id = [];
var prod_quantity = [];
var prod_discount = [];

function submit(){
    
    checkEmpty();

    if(isValid == true){
        var cus_id = $('#cus_id').val();
        console.log('cus_id: ',cus_id);
        num_of_row = $('.prod_price').length;
        
        for(var x = 0; x < num_of_row; x++){
            var y = x + 1;
            prod_id[x] = $('#prod_id_'+y).val();
            prod_quantity[x] = $('#prod_qty_'+y).val();
            prod_discount[x] = $('#prod_disct_'+y).val();
        }

        $.ajax({
            type: 'POST',
            data:
            {// here i forgot to submit customer id
                'cus_id' : cus_id,
                'prod_id' : prod_id,
                'prod_quantity' : prod_quantity,
                'prod_discount' : prod_discount,
                'num_of_row' : num_of_row
            },
            url: 'submit_sales.php',
            success: function (response) {
                $( '#test-div' ).html(response);
            },
            error: function(){
                console.log('Contact Alex!');
            }
        });

    }
    else{
        alert("Fill in all the form.");
    }
}

/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ JQUERY PART @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/

//$(document).ready(function(){

    //################################################################ CUSTOMER PART ################################################################//
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search-cus.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
		$('#cus-form2').show();        
        var name = $(this).text();
        $.get("autocomplete_cus.php", {term: name}).done(function(data){
                // Display the returned data in browser
                var cus_info = jQuery.parseJSON(data);
                $('#cus_name').val(cus_info[0]);
                $('#cus_address').val(cus_info[1]);
                $('#cus_phone').val(cus_info[2]);
                $('#cus_remarks').val(cus_info[3]);
                $('#cus_id').val(cus_info[4]);

                $('#next-button').show();
            });
        //this will remove the result list
        $(this).parent(".result").empty();
    });
    //############################################################## END OF CUSTOMER PART ##############################################################//

    /**
        * For the brave souls who get this far: You are the chosen ones,
        * the valiant knights of programming who toil away, without rest,
        * fixing our most awful code. To you, true saviors, kings of men,
        * I say this: never gonna give you up, never gonna let you down,
        * never gonna run around and desert you. Never gonna make you cry,
        * never gonna say goodbye. Never gonna tell a lie and hurt you.
    */

    //################################################################ INVENTORY PART ################################################################//
    //DECLARE id_prod as a global variable...
    var id_prod = 0;

    $(document).on("keyup input", ".product-id", function(){

        id_prod = this.id.replace('prod_id_', '');
        var inputVal = $(this).val();
        var resultDropdown = $('#result2').css({"display":"block"});

        if(inputVal.length){
             $.ajax({
                type: 'POST',
                data: {term:inputVal},
                url: '../backend-search-inv.php',
                success: function(data){
                    resultDropdown.html(data);
                }
            });
        }
        else{
            resultDropdown.empty();
        }
    });

    // WHEN RESULT BEING CLICKED...
    $(document).on("click", "#result2 p", function(){
        var inv_id = $(this).text();

        $.ajax({
            type: 'POST',
            data: {term:inv_id},
            url: '../autocomplete_inv.php',
            success: function (response) {
                var inv_info = jQuery.parseJSON(response);

                $('#prod_id_'+id_prod).val(inv_info[0]);
                $('#prod_qty_'+id_prod).val(1);
                $('#prod_disct_'+id_prod).val(0);
                $('#prod_type_'+id_prod).val(inv_info[1]);
                $('#prod_colour_'+id_prod).val(inv_info[2]);
                $('#prod_price_'+id_prod).val(inv_info[3]);

                $('#result2').empty();

                sumPrice();
            },
            error: function(){
                console.log('Unable to access database.');
            }
        });

});//end of result being clicked

    $(document).on("keyup", ".prod_qty", function(){
        sumPrice();
    });

    $(document).on("keyup", ".prod_disct", function(){
        sumPrice();
    });


    //used for add new row for table
    $('#add-row-button').on("click", function(){
        var row_num = $('#sales-table tr').length;
        //row_num = row_num + 1;
        $('#sales-table tr:last')
            .after('<tr id="row_'+row_num+'"><td><input type="text" id="prod_id_'+row_num+'" class="product-id" size="23"></td><td><input type="text" id="prod_qty_'+row_num+'" class="prod_qty" size="7"></td><td><input type="text" id="prod_disct_'+row_num+'" class="prod_disct"></td><td><input type="text" id="prod_type_'+row_num+'" disabled="disabled"></td><td><input type="text" id="prod_colour_'+row_num+'" disabled="disabled"></td><td><input type="text" id="prod_price_'+row_num+'" disabled="disabled" class="prod_price"></td><td><input type="button" id="delete-'+row_num+'" value="Remove" class="delete-row"></td></tr>');
    });

    //this function is used to show product dropdown
    $(document).on("click", ".delete-row", function(){
        var row_id= this.id.replace('delete-', '');
        $('#row_'+row_id).remove();
        sumPrice();
    });
//################################################################ END OF INVENTORY PART ################################################################//

//});//end of document ready function

