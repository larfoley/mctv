<?php

# Include the Autoloader (see "Libraries" for install instructions)
require_once $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';
use MailgunMailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-4746b2279f7957553918d62e73332749');
$domain = "sandboxfe20b3c3a1f44e1097900e212f1ca772.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandboxfe20b3c3a1f44e1097900e212f1ca772.mailgun.org>',
                'to'      => 'Laurence <larfoley@yahoo.com>',
                'subject' => 'Hello Laurence',
                'text'    => 'Congratulations Laurence, you just sent an email with Mailgun!  You are truly awesome! '));
echo "result: ";
var_dump($result);
