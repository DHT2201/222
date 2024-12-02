<?php 
    include_once('model/Feedback.php');

    class FeedbackController {
        private $feedbackModel;
        public function __construct(){
            $this->feedbackModel = new Feedback();
        }
        //add feedback
        public function addFeedbackController($userId, $message) {
            if (empty($message)) {
                $_SESSION['add_contact_error'] = "Vui lòng nhập thông tin đầy đủ!";
                echo '<script>alert("Vui lòng nhập đủ thông tin!")</script>';
                return false; 
            }
        
            $result = $this->feedbackModel->addFeedback($userId, $message);
        
            if ($result) {
                $_SESSION['add_contact_success'] = "Liên hệ được gửi thành công";
                echo '<script>alert("Liên hệ được gửi thành công!")</script>';
                return true;
            } else {
                $_SESSION['add_contact_error'] = "Lỗi khi gửi liên hệ: " . $this->feedbackModel->getConnection()->error;
                return false;
            }
        }
        
    }
?>