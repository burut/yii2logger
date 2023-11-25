<?php

namespace app\loggers;

use app\factory\LoggerFactory;
use app\interface\LoggerInterface;
use app\models\Log;

class LoggerDb implements LoggerInterface
{
    public function send(string $message): void
    {
        $phone = new Log();
        $phone->created_at = date('Y-m-d H:i:s');
        $phone->message = $message;
        $phone->save();
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        // TODO need to ask for more details how it should work????
    }

    public function getType(): int
    {
        return LoggerFactory::getLoggerTypeDb();
    }

    public function setType(string $type): void
    {
        // TODO need to ask for more details how it should work????
    }
}