<?php

defined('STDIN') OR define('STDIN', fopen('php://stdin', 'r'));

$data = fgets(STDIN);
$data = json_decode($data, true);

include_once 'AirAmg.php';

$parser = new AirAmg();
$parser->data = $data['rows'];

$result['rows'] = $parser->run();


     $result['selected_columns'] = array(
         'none', 'datetime', 'source', 'destination', 'comment', 'duration', 'price_without_vat'
     );


echo json_encode($result);
