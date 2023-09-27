<?php 
    include 'includes/session.php';
    include 'includes/header.php';
    include 'includes/scripts.php';
?>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<link rel="stylesheet" type="text/css" href="datetimepicker/jquery.datetimepicker.css"/ >
<script src="datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_XkTimsK2SvrPHS6uktjtb6H300ngZTrCJ4');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" 
+ token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>

<body>

    <?php
        $conn = $pdo->open();
        try{
            $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user");
            $stmt->execute(['user'=>$user['id']]);
            $crow = $stmt->fetch();

            if($crow['numrows'] == 0){
                echo"
                <script type='text/javascript'>
                window.alert('Cart is empty. You are redirected back to your cart.');
                window.location.href='cart_view.php';
                </script>
                            ";
            }
        }
          catch(PDOException $e){
            $output['message'] = $e->getMessage();
            } 

            $pdo->close();    
    ?>       

<div class="container pt-2">
    <h1 class="mt-3 pt-5">Checkout</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Order Summary</span>
                        <span class="badge badge-secondary badge-pill cart_count"></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        $conn = $pdo->open();
                        try{
                                


                                $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
                                $stmt->execute(['user_id'=>$user['id']]);

                                $total = 0;
                                foreach($stmt as $item){
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                    $grand = number_format($item["price"],2);
                                    echo "
                                    <li class='list-group-item d-flex justify-content-between lh-condensed'>
                                    <div>
                                        <h6 class='my-0'>".$item['name']."</h6>
                                        <small class='text-muted'>RM ".$grand."(".$item['quantity'].")</small>
                                    </div>                            
                                    <span class='text-muted'>RM ".$subtotal."</span>
                                </li>";
                                }
                            
                            }
                        catch(PDOException $e){
                            $output['message'] = $e->getMessage();
                        } 

                        $pdo->close();

                        ?>

                        
                        <?php   ?>
                        <li class="list-group-item d-flepax justify-content-between">
                            <span>Total (RM)</span>
                            <strong><?php echo 'RM'.$total; ?></strong>
                        </li>
                    </ul>
                    <a href="cart_view.php" class="btn btn-block btn-info">Return to Cart</a>                
                </div>

                <div class="col-md-8 order-md-1">
                    <!-- display errors returned by createToken -->
                    <span class="payment-errors alert-danger"></span>
                    <h4 class="mb-3">Pay using Card</h4>
                    <form action="stripe_process.php" method="POST" id="paymentFrm">
                         <div class="row col-md-8 mb-3">
                            <h5 class="mb-3">Pickup Date & Time</h5>
                            <input type="text" id="datetimepicker" class="form-control" name="date" value="<?php echo !empty($postData['date'])?$postData['date']:''; ?>" required>
                        </div>
                        <div class="row col-md-8 mb-3">
                            <div>
                                <label class="mb-3">Card number</label>
                                <input type="text" name="card_num" size="20" autocomplete="off" class="card-number" />
                            </div>
                            <div>
                                <label>CVC</label>
                                <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc" />
                            </div>
                            <div>
                                <label>Expiration (MM/YYYY)</label>
                                <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
                                <span> / </span>
                                <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
                            </div>
                            <input type="hidden" name="payment" value="Pay using Card">
                            <input type="hidden" name="amount" value="<?php echo $total; ?>">
                        </div>
                        <input class="btn btn-success btn-lg" type="submit" name="checkoutSubmit" value="Place Order">
                        <a href="cancel_order.php" class="btn btn-danger btn-lg cart_delete">Cancel Order</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php
      include ("includes/footer.php");
?>
<script type="text/javascript"> 
    
 var checkPastTime = function(currentDateTime) {

    var d = new Date();
    var todayDate = d.getDate();

    // 'this' is jquery object datetimepicker
    if (currentDateTime.getDate() == todayDate) { // check today date
        if (d.getHours() < 10){
             this.setOptions({
                minTime: '10:00'
            });
        } else{
             if (d.getMinutes() < 30){
                this.setOptions({
                    minTime: d.getHours() + ':00' //here pass current time hour
                });
            } else{
                 this.setOptions({
                    minTime: d.getHours() + 1 + ':00' //here pass current time hour
                });
            }        
       }       
    } else 
        this.setOptions({
            minTime: '10:00'
        });
    };           
                            jQuery('#datetimepicker').datetimepicker({                            
                             format: 'Y-m-d H:i:00',
                             minDate:'-1970/01/01',//yesterday is minimum date(for today use 0 or -1970/01/01)
                             maxDate:'+1970/01/07',//tomorrow is maximum date calendar
                             step: 30,                            
                             onChangeDateTime: checkPastTime,
                             onShow: checkPastTime,
                             maxTime: '22:00',
                             startTime: '10:00'
                            })
</script>   
</html>
