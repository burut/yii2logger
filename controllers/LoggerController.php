<?php

namespace app\controllers;

use app\factory\LoggerFactory;
use yii\web\Controller;
use Yii;

class LoggerController extends Controller
{
    public function actionIndex(): string
    {
        if ($form = Yii::$app->request->post()) {
            $this->processLog($form);
        }

        $loggerTypes = LoggerFactory::getLoggerTypes();
        $loggerDefaultType = LoggerFactory::getLoggerTypeDefault();

        return $this->render('index', compact('loggerTypes', 'loggerDefaultType'));
    }

    /**
     * Sends a log message to the default logger.
     */
    private function log(string $message): void
    {
        $defaultType = LoggerFactory::getLoggerTypeDefault();
        $logger = LoggerFactory::getLogger($defaultType);
        $logger->send($message);
    }

    /**
     * Sends a log message to a special logger.
     */
    private function logTo(int $type, string $message): void
    {
        $logger = LoggerFactory::getLogger($type);
        $logger->send($message);
    }

    /**
     * Sends a log message to all loggers.
     */
    private function logToAll(string $message): void
    {
        foreach (LoggerFactory::loggerTypesForAll() as $loggerType) {
            $logger = LoggerFactory::getLogger($loggerType);
            $logger->send($message);
        }
    }

    private function processLog(array $log): void
    {
        $type = (int) $log['type'];

        if ($type === LoggerFactory::getLoggerTypeAll()) {
            $this->logToAll($log['message']);
        } elseif (in_array($type, LoggerFactory::loggerTypesForAll(), true)) {
            $this->logTo($type, $log['message']);
        } else {
            $this->log($log['message']);
        }
    }
}
