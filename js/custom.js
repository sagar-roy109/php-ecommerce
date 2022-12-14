$(document).ready(function(){

  $('.addCart').click(function(e){
    e.preventDefault();
    let qty =$('#getQty').val();
    let product_id = $(this).attr('value');
    
    $.ajax({
      method : "POST",
      url: "handleCart.php",
      data:{
        "product_id" : product_id,
        "product_qty" : qty,
        "scope":"add",

      },
      dataType : 'text',
      

      
      
      success: function(response) {
        
        console.log(response.status);
      },
      error: function(response){
        console.log("ERR" + response.status);
      }

    })
  })

});