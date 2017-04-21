<?php

// Define STDIN
defined('STDIN') OR define('STDIN', fopen('php://stdin', 'r'));

// Get all data. Its is in JSON so we must decode it
$data = fgets(STDIN);
$data = json_decode($data, true);

// Structure of $data
// $data = array(
//    'type' => 'call',
//    'categories' => array(
//          1 => 'Usual',
//          2 => 'Premium'
//          3 => 'Others'
//      ),
//    'rows' => array(
//          array('789574', '781114', '2016-03-01 16:00:00', '158', '228.25')
//     ),
//     'column_names_from_first_row' => array('source', 'destination', etc..)
// );
//
// `type` - Voice type. Can be 'call', 'message' or 'data'
// `categories` - Array with categories for current voice type
// `rows` - Array with rows from import file
// `column_names_from_first_row` - Array with column names in first row

include_once 'SampleParser.php';

$parser = new SampleParser();
$parser->data = $data['rows'];

$result['rows'] = $parser->run();

// You can add info about selected columns (if yours import always keep the same columns order)
// Just to $result array with key 'selected_columns'.
// Example:
//      $result['selected_columns'] = array(
//          'source', 'destination', 'datetime', 'duration', 'price_without_vat', 'none', 'comment', 'none', 'category'
//      );
// You can use:
// 'none': to skip import column
// 'destination': for "Destination" (in Calls)
// 'duration': for "Duration" (in Calls)
// 'amount': for "Amount" (in Messages or Data)
// 'datetime': for "Datetime"
// 'date': for "Date"
// 'time': for "Time"
// 'price_with_vat': for "Price (with VAT)"
// 'price_without_vat': for "Price (without VAT)"
// 'category': for "Comment"
// 'comment': for "Category"

// Encode result
echo json_encode($result);
