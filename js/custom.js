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
  
      success: function(response) {
        // alertify.set('notifier','position', 'top-right');
        // alertify.success(response);
    
          console.log(response);
        if(response == 1000){
          window.location.href='login.php';
        }else{
          $('#cart_items').text(response);
        }
        },
      error: function(response){
        
      }

    })
  })

});