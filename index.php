<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merchant_password = "Z9Egvsni9b96cb7";
// transaction info
    $amount = $_POST['amount'];
    $fee = $_POST['fee'];
    $total = $_POST['total'];
    $currency = $_POST['currency'];
    $payer = $_POST['payer'];
    $receiver = $_POST['receiver'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $id_transfer = $_POST['id_transfer'];
// Merchant info
    $merchant_name = $_POST['merchant_name'];
    $merchant_id = $_POST['merchant_id'];
    $balance = $_POST['balance'];
// Purchase Information
    $item_name = $_POST['item_name'];
    $custom = $_POST['custom'];
// Verification of the transaction
    $hash = strtolower($_POST['hash']);

    $hash_string = $total . ':' . $merchant_password . ':' . $date . ':' . $id_transfer;

    $user_hash = strtolower(md5($hash_string));

    if ($hash === $user_hash) {
        echo "Confirmed!";
    } else {
        echo "Disabled!";
    }
}
?>
<form method="POST" action="https://e-khalti.com/sci/form" target="_blank">
    <input type="hidden" name="merchant" value="11">
    <input type="hidden" name="item_name" value="Testing payment">
    <input type="hidden" name="amount" value="10">
    <input type="hidden" name="currency" value="debit_base">
    <input type="hidden" name="custom" value="comment">
    <button type="submit">Pay with e-Khalti</button>
</form>
