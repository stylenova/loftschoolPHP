<?php
/**
 * Created by PhpStorm.
 * User: style
 * Date: 11.03.2019
 * Time: 23:00
 */

require_once '../vendor/autoload.php';

$emailUser = $_POST['email'];

try {
    // Create the SMTP Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('loftschol2019@gmail.com')
        ->setPassword('999nxt2a');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = new Swift_Message();

    // Set a "subject"
    $message->setSubject('Новое письмо по домашнему заданию №5');

    // Set the "From address"
    $message->setFrom(['loftschol2019@gmail.com' => 'Осипенко Сергей']);

    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
    $message->addTo($emailUser);

    // Set a "Body"
    $message->addPart('Ваш заказ принят');

    // Send the message
    $result = $mailer->send($message);

    header('Location: register.php');
} catch (Exception $e) {
    echo $e->getMessage();
}

