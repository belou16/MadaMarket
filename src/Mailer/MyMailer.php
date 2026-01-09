<?php
<?php

namespace App\Mailer;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class MyMailer
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(string $toEmail, string $toName, string $subject, string $htmlBody): void
    {
        $email = (new Email())
            ->from(new Address('noreply@example.com', 'MadaMarket'))
            ->to(new Address($toEmail, $toName))
            ->subject($subject)
            ->html($htmlBody);

        $this->mailer->send($email);
    }
}