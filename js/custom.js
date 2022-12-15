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
        alertify.set('notifier','position', 'top-right');
        alertify.success("product added");
    
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


  $(document).on('click','.update_qty', function(){
    let product_id = $(this).parent('.form-group--number').siblings('#product_id').val();
    let product_qty = $(this).siblings('#product_qty').val();
    let oldPrice = $(this).parent('.form-group--number').siblings('.price_cal').val();
    let price = $(this).parent('.form-group--number').parent('.count').siblings('.price');
    
    $.ajax({
      method:"POST",
      url:"handleCart.php",
      data:{
        'product_qty': product_qty,
        'product_id': product_id,
        'scope' : 'cart'
      },
      success: function(response){
        if(response == 3000){
          
           price.text( '$' + product_qty * oldPrice );
          
        }
        
      }
    })


  })


  

});