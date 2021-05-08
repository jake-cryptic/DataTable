<?php
$dc = new DataTable();

$dc->connect_app();

$dc->declare_custom('heart_rate');
$dc->declare_custom('sleep_score');

$dc->request('heart_rate')
   ->reason('Data was accessed when you woke up; heart rate is required to calculate your sleep score.')
   ->how('Historical sleep score data is used to determine the overall quality of your sleep.')
   ->data([109])
   ->accessor(false, 'Fitbit App');

$dc->request('sleep_score')
   ->reason('Data was accessed when you viewed your sleep score on your fitness app.')
   ->how('Heart rate is one of several measurements required to calculate your sleep score; the sleep score calculator uses a machine learning algorithm to calculate your sleep score.')
   ->data(76)
   ->accessor(false, 'Fitbit App');
