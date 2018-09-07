<?php

namespace App\Core;

use Swift_SmtpTransport;

class Swift
{
    protected $transport;
    protected $mailer;
    protected $message;
    protected $email;
    protected $password;
    protected $idOrder;

    public function __construct()
    {
        $this->email = 'testgamail72@gmail.com';
        $this->password = 'Parabolika12345';
        $this->transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('testgamail72@gmail.com')
            ->setPassword('Parabolika12345');
        $this->mailer = new \Swift_Mailer($this->transport);
    }

    public function sendMessage($email, $infoOrder, $idOrder)
    {
        $this->idOrder = $idOrder;
        $message = (new \Swift_Message('Order'))
            ->setFrom(['testgamail72@gmail.com' => 'John Doe'])
            ->setTo([$email => 'svetlanaderiglazova87@gmail.com'])
            ->setBody($infoOrder);
        $this->mailer->send($message);
        $this->save($infoOrder);
    }

    public function save($message)
    {
        $fileName = MESSAGE . '№ ' . $this->idOrder . '.txt';
        file_put_contents($fileName, $message);
    }
}
