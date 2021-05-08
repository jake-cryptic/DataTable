<?php
$dc = new DataTable();

$dc->connect_app();

$dc->declare_custom('temperature');

$dc->request('connectivity')
   ->reason('Lost connection to device, scanned network to find it again')
   ->how('IPs on local network were port scanned for port 443, results of the scan were discarded')
   ->data('Scan IPs in range 192.168.0.X')
   ->accessor(true, 'nmap port scanner');

$dc->request('connectivity')
   ->reason('Connection to 3rd party server: server-422-voice.in.google.com')
   ->how('Temperature was transmitted over a secure connection, your ISP may be able to see the DNS lookup for this')
   ->data('Secure HTTPS tunnel')
   ->accessor(true, 'Internet Service Provider')
   ->accessor(true, 'Google');

$dc->request('temperature')
   ->reason('User requested to see current room temperature from their Google Home smart speaker')
   ->how('Data was sent to Google to be spoken in response to user query')
   ->data([29])
   ->accessor(true, 'Google LLC');
