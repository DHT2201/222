<?php 
    include_once('ConnectDatabase.php');

    class Feedback extends ConnectDatabase
    {
        private $conn;
        public function __construct()
        {
            parent::__construct(); 
            $this->conn = $this->getConnection(); 
        }
        //add feedback
        public function addFeedback($userId, $message)
        {
            $stmt = $this->conn->prepare("INSERT INTO feedbacks (user_id, content) VALUES (?,?)");

            $stmt->bind_param("is", $userId, $message);

            if (!$stmt->execute()) {
                die("Error: ". $stmt->error);
            }
            $stmt->close();
            return true;
        }
    }
?>