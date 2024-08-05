<?php
include_once("lib/GoogleAuthenticator.php");

$secret = 'XVQ2UIGO75XRUKJO';
$code = "846474";

$g = new GoogleAuthenticator();

print "Current Code is: ";
print $g->getCode($secret);

print "\n";

print "Check if $code is valid: ";

if ($g->checkCode($secret, $code)) {
    print "YES \n";   
} else {
    print "NO \n";
}

$secret = $g->generateSecret();
print "Get a new Secret: $secret \n";

print "The QR Code for this secret (to scan with the Google Authenticator App: \n";
$otpUrl = $g->getUrl('chregu', 'example.org', $secret);
$qrUrl = $g->getQrImageFromQrServer($otpUrl);
print "<img src='{$qrUrl}' />";

print "\n";