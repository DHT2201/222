<?php 
    include_once('model/Notification.php');

    class NotificationController {
        private $notification;
        public function __construct(){
            $this->notification = new Notification();
        }
        //count notifcation by user_id
        public function countNotificationByUserId($userId){
            return $this->notification->countNotificationByUserId($userId);
        }
    }
?>