<?php 
    include_once('ConnectDatabase.php');

    class Notification extends ConnectDatabase{
        private $conn;
        public function __construct()
        {
            parent::__construct(); 
            $this->conn = $this->getConnection(); 
        }
        //count notifcation by user_id
        public function countNotificationByUserId($userId){
            $query = "SELECT COUNT(*) as total_notification FROM notifications WHERE user_id = '$userId'";
            $result = $this->conn->query($query);
            $row = $result->fetch_assoc();
            return $row['total_notification'];
        }
    }
?>