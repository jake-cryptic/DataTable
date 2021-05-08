<?php

include('DataTable.php');

$dc = new DataTable();

$dc->connect_app();

$dc->declare_custom('heart_rate');

$dc->request('location')->reason('User clicked start workout');
$dc->request('heart_rate');

print_r($dc->get_data());
