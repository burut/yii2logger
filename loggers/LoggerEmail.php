<?php

namespace app\loggers;

use app\factory\LoggerFactory;
use app\interface\LoggerInterface;
use Yii;

class LoggerEmail implements LoggerInterface
{
    public function send(string $message): void
    {
        Yii::$app->mailer->compose()
            ->setFrom(LoggerFactory::geSendersMailbox())
            ->setTo(LoggerFactory::getRecipientsMailbox())
            ->setSubject('New Log')
            ->setTextBody($message)
            ->setHtmlBody(nl2br($message))
            ->send();
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        // TODO need to ask for more details how it should work????
    }

    public function getType(): int
    {
        return LoggerFactory::getLoggerTypeEmail();
    }

    public function setType(string $type): void
    {
        // TODO need to ask for more details how it should work????
    }
}