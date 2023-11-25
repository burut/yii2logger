<?php

namespace app\factory;

use app\interface\LoggerInterface;
use app\loggers\LoggerDb;
use app\loggers\LoggerEmail;
use app\loggers\LoggerFile;

class LoggerFactory
{
    // TODO need to ask where these parameters can be placed ****
    private const LOGGER_TYPE_ALL   = 0;
    private const LOGGER_TYPE_EMAIL = 1;
    private const LOGGER_TYPE_FILE  = 2;
    private const LOGGER_TYPE_DB    = 3;

    private const LOGGER_DEFAULT_TYPE = self::LOGGER_TYPE_EMAIL;

    private const LOGGER_CONFIG = [
        'sendersMailbox'    => 'logger1@logger.com',
        'recipientsMailbox' => 'logger2@logger.com',
        'loggerFilePath'    => '/tmp/log.txt',
        'types' => [
            self::LOGGER_TYPE_ALL   => 'ALL',
            self::LOGGER_TYPE_EMAIL => 'Email',
            self::LOGGER_TYPE_FILE  => 'File',
            self::LOGGER_TYPE_DB    => 'DB',
        ],
        'defaultType' => self::LOGGER_DEFAULT_TYPE,
    ];

    private const LOGGER_TYPES = [
        self::LOGGER_TYPE_EMAIL,
        self::LOGGER_TYPE_FILE,
        self::LOGGER_TYPE_DB,
    ];
    // TODO end ******************************************************

    public static function getLogger(int $loggerType): LoggerInterface
    {
        switch ($loggerType) {
            case self::LOGGER_TYPE_EMAIL:
            {
                return new LoggerEmail();
            }
            case self::LOGGER_TYPE_FILE:
            {
                return new LoggerFile();
            }
            case self::LOGGER_TYPE_DB:
            {
                return new LoggerDb();
            }
            default:
            {
                throw new \Exception('undefined logger type: ' . $loggerType);
            }
        }
    }

    public static function loggerTypesForAll(): array
    {
        return self::LOGGER_TYPES;
    }

    public static function getLoggerConfig(): array
    {
        return self::LOGGER_CONFIG;
    }

    public static function getLoggerTypes(): array
    {
        $loggerConfig = self::getLoggerConfig();

        return $loggerConfig['types'];
    }

    public static function getLoggerTypeDefault(): int
    {
        return self::LOGGER_DEFAULT_TYPE;
    }

    public static function getLoggerTypeAll(): int
    {
        return self::LOGGER_TYPE_ALL;
    }

    public static function getLoggerTypeEmail(): int
    {
        return self::LOGGER_TYPE_EMAIL;
    }

    public static function getLoggerTypeFile(): int
    {
        return self::LOGGER_TYPE_FILE;
    }

    public static function getLoggerTypeDb(): int
    {
        return self::LOGGER_TYPE_DB;
    }

    public static function getLoggerFilePath(): string
    {
        $loggerConfig = self::getLoggerConfig();

        return $loggerConfig['loggerFilePath'];
    }

    public static function geSendersMailbox(): string
    {
        $loggerConfig = self::getLoggerConfig();

        return $loggerConfig['sendersMailbox'];
    }

    public static function getRecipientsMailbox(): string
    {
        $loggerConfig = self::getLoggerConfig();

        return $loggerConfig['recipientsMailbox'];
    }
}
