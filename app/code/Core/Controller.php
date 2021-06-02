<?php

namespace Core;

use Session\Notification;

class Controller
{
    public function render($template, $data)
    {
        include_once PROJECT_ROOT . '/app/template/page/header.php';
        include_once PROJECT_ROOT . '/app/template/'. $template .'.php';
        include_once PROJECT_ROOT . '/app/template/page/footer.php';

        $notification = new Notification();
        $notification->unsetErrorTitleNotification();
        $notification->unsetErrorItemsNotifications();
        $notification->unsetSuccessTitleNotification();
        $notification->unsetSuccessItemsNotifications();
    }
}