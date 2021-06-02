<?php


namespace Helper\Notification;


use Session\Notification;

class ErrorSuccessBuilder
{
    static function getErrorNotificationTemplate(): string
    {
        $notification = new Notification();

        $notificationTemplate = '';
        if ($notification->getErrorTitleNotification()) {
            $errors = '';

            for ($i=0; $i<count($notification->getErrorItemsNotifications()); $i++) {
                $errors .= '<p class="notification-message notification-message-error-item">&#8226; ' . $notification->getErrorItemsNotifications()[$i] . '</p>';
            }

            $notificationTemplate =  '
            <div class="notifications">
                <p class="notification-message notification-message-error-title">' . $notification->getErrorTitleNotification() . '</p>
                ' . $errors . '   
            </div> ';
        }

        return $notificationTemplate;
    }

    static function getSuccessNotificationTemplate(): string
    {
        $notification = new Notification();

        $notificationTemplate = '';
        if ($notification->getSuccessTitleNotification()) {
            $errors = '';

            for ($i=0; $i<count($notification->getSuccessItemsNotifications()); $i++) {
                $errors .= '<p class="notification-message notification-message-success-item">&#8226; ' . $notification->getSuccessItemsNotifications()[$i] . '</p>';
            }

            $notificationTemplate =  '
            <div class="notifications">
                <p class="notification-message notification-message-success-title">' . $notification->getSuccessTitleNotification() . '</p>
                ' . $errors . '   
            </div> ';
        }

        return $notificationTemplate;
    }
}