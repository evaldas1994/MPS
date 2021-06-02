<?php

namespace Session;

use Core\Session;

class Notification extends Session
{

    public const ERROR_TITLE = 'error-title-message';
    public const ERROR_ITEMS = 'error-items-messages';
    public const SUCCESS_TITLE = 'success-title-message';
    public const SUCCESS_ITEMS = 'success-items-messages';

    public function setErrorTitleNotification(string $message): void
    {
        $this->set(self::ERROR_TITLE, $message);
    }

    public function getErrorTitleNotification(): string
    {
        return $this->get(self::ERROR_TITLE);
    }

    public function unsetErrorTitleNotification()
    {
        $this->unset(self::ERROR_TITLE);
    }

    public function setErrorItemsNotifications(array $messages): void
    {
        $this->set(self::ERROR_ITEMS, $messages);
    }

    public function getErrorItemsNotifications(): array
    {
        return $this->get(self::ERROR_ITEMS);
    }

    public function unsetErrorItemsNotifications()
    {
        $this->unset(self::ERROR_ITEMS);
    }

    public function setSuccessTitleNotification(string $message): void
    {
        $this->set(self::SUCCESS_TITLE, $message);
    }

    public function getSuccessTitleNotification(): string
    {
        return $this->get(self::SUCCESS_TITLE);
    }

    public function unsetSuccessTitleNotification()
    {
        $this->unset(self::SUCCESS_TITLE);
    }

    public function setSuccessItemsNotifications(array $messages): void
    {
        $this->set(self::SUCCESS_ITEMS, $messages);
    }

    public function getSuccessItemsNotifications(): array
    {
        return $this->get(self::SUCCESS_ITEMS);
    }

    public function unsetSuccessItemsNotifications()
    {
        $this->unset(self::SUCCESS_ITEMS);
    }


}