<?php

// The version number (9_5_0) should match version of the Chilkat extension used, omitting the micro-version number.
// For example, if using Chilkat v9.5.0.48, then include as shown here:
include("chilkat_9_5_0.php");

//  The mailman object is used for sending and receiving email.
$mailman = new CkMailMan();

//  Any string argument automatically begins the 30-day trial.
$success = $mailman->UnlockComponent('30-day trial');
if ($success != true) {
    print $mailman->lastErrorText() . "\n";
    exit;
}

//  To connect through an HTTP proxy, set the HttpProxyHostname
//  and HttpProxyPort properties to the hostname (or IP address)
//  and port of the HTTP proxy.  Typical port numbers used by
//  HTTP proxy servers are 3128 and 8080.
$mailman->put_HttpProxyHostname('10.10.127.3');
$mailman->put_HttpProxyPort(3128);

//  Important:  Your HTTP proxy server must allow non-HTTP
//  traffic to pass.  Otherwise this does not work.

//  Set the SMTP server.
$mailman->put_SmtpHost('smtp.chilkatsoft.com');

//  Set the SMTP login/password (if required)
$mailman->put_SmtpUsername('myUsername');
$mailman->put_SmtpPassword('myPassword');

//  Create a new email object
$email = new CkEmail();

$email->put_Subject('This is a test');
$email->put_Body('This is a test');
$email->put_From('Chilkat Support <support@chilkatsoft.com>');
$success = $email->AddTo('Chilkat Admin','admin@chilkatsoft.com');

//  Call SendEmail to connect to the SMTP server via the HTTP proxy and send.
//  The connection (i.e. session) to the SMTP server remains
//  open so that subsequent SendEmail calls may use the
//  same connection.
$success = $mailman->SendEmail($email);
if ($success != true) {
    print $mailman->lastErrorText() . "\n";
    exit;
}

//  Some SMTP servers do not actually send the email until
//  the connection is closed.  In these cases, it is necessary to
//  call CloseSmtpConnection for the mail to be  sent.
//  Most SMTP servers send the email immediately, and it is
//  not required to close the connection.  We'll close it here
//  for the example:
$success = $mailman->CloseSmtpConnection();
if ($success != true) {
    print 'Connection to SMTP server not closed cleanly.' . "\n";
}

print 'Mail Sent!' . "\n";

?>