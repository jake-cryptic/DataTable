<?php
$dc = new DataTable();

$dc->connect_app();

$dc->declare_custom('heart_rate');
$dc->declare_custom('connection');

$dc->request('location')->reason('User clicked start workout')->data([51.22235, -3.2343]);
$dc->request('heart_rate')->reason('User clicked start workout')->data([123, 123, 123, 124, 140])->how('Statistical analysis performed on bpm values');

$dc->request('connection')->reason('Contacted server to sync information');