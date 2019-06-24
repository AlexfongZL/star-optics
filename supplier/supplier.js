function loaddata(url)
{
   var name = document.getElementById("supp_name_search").value;
   var phone = document.getElementById("supp_phone_search").value;
   var address = document.getElementById("supp_addr_search").value;
    

    $.ajax({
    type: 'post',
    url: url,
    data: {
     'name': name,
     'phone': phone,
     'address': address
    },
    success: function (response) {
     // We get the element having id of display_info and put the response inside it
     $( '#content-div' ).html(response);
    }
    });
  }

function search()
{
   var name = document.getElementById("supp_name_search").value;
   var phone = document.getElementById("supp_phone_search").value;
   var address = document.getElementById("supp_addr_search").value;
    

    $.ajax({
    type: 'post',
    url: 'supplier_list.php',
    data: {
     'name': name,
     'phone': phone,
     'address' : address
    },
    success: function (response) {
     $( '#content-div' ).html(response);

    }
    });
  }

  function deleteConfirmation(supp_id)
  {
    $.ajax({
      url:'delete_supplier.php',
      type:'post',
      data:{supp_id:supp_id},
      success: function(response){
         window.location.reload();
      }
    })
  }