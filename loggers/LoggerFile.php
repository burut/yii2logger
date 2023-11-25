<?php

namespace app\loggers;

use app\factory\LoggerFactory;
use app\interface\LoggerInterface;

class LoggerFile implements LoggerInterface
{
    public function send(string $message): void
    {
        $file = LoggerFactory::getLoggerFilePath();
        $message = date('Y-m-d [H:i:s] ') . $message . PHP_EOL;

        file_put_contents($file, $message, FILE_APPEND);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        // TODO need to ask for more details how it should work????
    }

    public function getType(): string
    {
        return LoggerFactory::getLoggerTypeFile();
    }

    public function setType(string $type): void
    {
        // TODO need to ask for more details how it should work????
    }
}