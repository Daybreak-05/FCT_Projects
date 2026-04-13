<?php

use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Mime\Address;

require __DIR__ . '/vendor/autoload.php';

$mailtrap = MailtrapClient::initSendingEmails(
    apiKey: getenv('14b7885ec939b7b93967f9ae50215640') // your API key here https://mailtrap.io/api-tokens
);

$email = (new MailtrapEmail())
    ->from(new Address('sender@example.com'))
    ->to(new Address('pablopiconsanchez28@gmail.com'))
    ->subject('Hello from Mailtrap PHP')
    ->text('Plain text body');

$response = $mailtrap->send($email);

// Access response body as array (helper optional)
var_dump(ResponseHelper::toArray($response));
?>