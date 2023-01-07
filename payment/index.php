<!DOCTYPE html>
<html>
<head>
<title>PHP Razorpay Payment Gateway Integration</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<style>
</style>
<body>

<a href="javascript:void(0)" class="btn m-2 btn-primary buy_now" data-amount="90" data-id="2">Pay Now</a> 
<!--container.//-->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
console.log(totalAmount)
var product_id =  $(this).attr("data-id");
console.log(product_id)
var options = {
"key": "rzp_test_QGh72gWY9LEcF6",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "Admission Payment",
"description": "Payment",
"image": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmMmF4zW-k2QbWwZVJwQaNl72Z5G2Yce77svzogniUrA&s",//mku icon
"handler": function (response){
    console.log(response)
$.ajax({
url: 'payment-proccess.php',
type: 'post',
dataType: 'json',
data: {
razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
}, 
success: function (msg) {
window.location.href = 'success.php';
}
});
},
"theme": {
"color": "#528FF0" //color theme change
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
</script>
</body>
</html>