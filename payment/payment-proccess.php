<?php
$data = [ 
'user_id' => '1',
'payment_id' => $_POST['razorpay_payment_id'],
'amount' => $_POST['totalAmount'],
'product_id' => $_POST['product_id'],
];
$id=100;
$amount=$_POST['totalAmount'];
$pid=$_POST['razorpay_payment_id'];


// you can write your database insertation code here
// after successfully insert transaction in database, pass the response accordingly
$con = mysqli_connect("localhost", "root", "", "payment");//db name

$sql="insert into razorpay(id,amount,pid) values($id,'$amount','$pid')";//table name
$result = mysqli_query($con, $sql);

$arr = array('msg' => 'Payment successfully credited', 'status' => true);  
echo json_encode($arr);
?>