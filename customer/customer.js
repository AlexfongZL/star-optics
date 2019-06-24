function loaddata(url)
{
   var name = document.getElementById("cus_name_search").value;
   var phone = document.getElementById("cus_phone_search").value;
   var address = document.getElementById("cus_addr_search").value;
   var lense = document.getElementById("cus_lense_search").value;

    $.ajax({
    type: 'post',
    url: url,
    data: {
     'name': name,
     'phone': phone,
     'address' : address,
     'lense' : lense
    },
    success: function (response) {
     $( '#content-div' ).html(response);
    }
    });
  }

  function deleteConfirmation(cus_id)
  {
    $.ajax({
      url:'delete_customer.php',
      type:'post',
      data:{cus_id:cus_id},
      success: function(response){
         window.location.reload();
      }
    })
  }

function search()
{
   var name = document.getElementById("cus_name_search").value;
   var phone = document.getElementById("cus_phone_search").value;
   var address = document.getElementById("cus_addr_search").value;
   var lense = document.getElementById("cus_lense_search").value;
    

    $.ajax({
    type: 'post',
    url: 'customer_list.php',
    data: {
     'name': name,
     'phone': phone,
     'address' : address,
     'lense' : lense
    },
    success: function (response) {
     $( '#content-div' ).html(response);

    }
    });
  }