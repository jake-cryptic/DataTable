<?php
$dc = new DataTable();

$dc->connect_app();

$dc->declare_custom('temperature');

$dc->request('connectivity')
   ->reason('Lost connection to device, scanned network to find it again')
   ->data('Scan IPs in range 192.168.0.X')
   ->accessor(true, 'nmap port scanner');

$dc->request('temperature')
   ->reason('User requested to see current room temperature')
   ->data([29])
   ->accessor(true, 'Google LLC');
