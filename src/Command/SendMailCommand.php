<?php
# src/Command/SendMailCommand.php
# php bin/console app:send-mail

namespace App\Command;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Mime\Address;
use App\Helper\ResponseHelper;
use App\Client\MailtrapClient;

#[AsCommand(name: 'app:send-mail')]
final class SendMailCommand
{
    public function __invoke(): int { // Available since Symfony 7.0. For earlier versions, use the execute() method instead.
        $email = (new \Symfony\Component\Mime\Email())->from('armandodapa10@gmail.com');

        $response = MailtrapClient::initSendingEmails(
            apiKey: '<YOUR_API_TOKEN>'
        )->send($email);

        var_dump(ResponseHelper::toArray($response));

        return Command::SUCCESS;
    }
}