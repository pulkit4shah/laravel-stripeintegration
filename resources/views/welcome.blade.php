<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content center">
    <div class="title m-b-md">
        Laravel + Stripe
    </div>
    <div class="links">
        <form action="http://localhost/aveo/aveo2/api/payment" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="pk_test_nRxxc9s5dpCSgiC6Y5aRo6gr00wKiKndyz"
                data-amount="10000"
                data-name="pulkit shah"
                data-description="Example Charge"
                data-address="a05 vasukanan apt."
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="usd">
            </script>
        </form>
        <br><br>
        <div class="col-md-12">
        <?php if(isset($data)){
            
           echo $data;
        }  
        ?>
        </div>
    </div>
</div>
</body>
</html>
