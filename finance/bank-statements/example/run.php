<?php

// Define STDIN
defined('STDIN') OR define('STDIN', fopen('php://stdin', 'r'));

// Get all data. Its is in JSON so we must decode it
$inputData = json_decode(fgets(STDIN), true);

if (!isset($inputData['path_to_file']) AND !file_exists($inputData['path_to_file'])) {
    return 'ERROR: no file found!';
}

// Get data
$data = file_get_contents($inputData['path_to_file']);

// Here we parsed our data. It this example we use simple format, like `customer_id;;date;;amount`.
$result = array();
$rows = explode("\n", $data);
foreach ($rows as $row) {
    list($customer_login, $invoice_number, $request_number, $date, $amount, $comment, $cancel) = explode(';;', trim($row));

    $result['data'][] = array(
        (string)$customer_login,
        (string)$invoice_number,
        (string)$request_number,
        (string)$date,
        (float)$amount,
        (string)$comment,
        (string)$cancel
    );
}

// Now we must send array of selected columns
$result['selected_columns'] = array('customer_login', 'invoice_number', 'request_number', 'date', 'amount', 'comment', 'cancel');

// Encode result
echo json_encode($result);
