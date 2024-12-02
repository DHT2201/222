<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

class EmailController
{
    function sendEmailUpdateInfo($emailAuthu, $userNameAuthu)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnUpdateInfoUser'])) {

            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'phongnguyen.050503@gmail.com';
                $mail->Password = 'cdid nsce ywzl wskm';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';

                $mail->setFrom('phongnguyen.050503@gmail.com', 'Hệ Thống');
                $mail->addAddress($emailAuthu);

                $template = file_get_contents('view/page/email/otp_updateinfo.html');
                $template = str_replace('{{ user_name }}', $userNameAuthu, $template);
                $template = str_replace('{{ otp }}', $_SESSION['otp'], $template);

                $mail->isHTML(true);
                $mail->Subject = 'Thông báo từ hệ thống';
                $mail->Body = $template;

                $mail->send();

            } catch (Exception $e) {
                echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
            }
        }
    }
    function sendEmailContactSuccess($emailAuthu, $userNameAuthu, $message)
    {
        $mail = new PHPMailer(true);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateTimeContact = date("d/m/Y H:i:s");

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'phongnguyen.050503@gmail.com';
            $mail->Password = 'cdid nsce ywzl wskm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('phongnguyen.050503@gmail.com', 'Hệ Thống');
            $mail->addAddress($emailAuthu);

            $template = file_get_contents('view/page/email/success_contact.html');
            $template = str_replace('{{ user_name }}', $userNameAuthu, $template);
            $template = str_replace('{{ message }}', $message, $template);
            $template = str_replace('{{ dateTimeContact }}', $dateTimeContact, $template);

            $mail->isHTML(true);
            $mail->Subject = 'Thông báo từ hệ thống';
            $mail->Body = $template;

            $mail->send();

        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    }
    function sendEmailUpdateInfoSuccess($emailAuthu, $userNameUpdate, $emailUpdate, $numberPhoneUpdate, $addressUpdate )
    {
        $mail = new PHPMailer(true);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateTimeUpdateInfo = date("d/m/Y H:i:s");

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'phongnguyen.050503@gmail.com';
            $mail->Password = 'cdid nsce ywzl wskm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('phongnguyen.050503@gmail.com', 'Hệ Thống');
            $mail->addAddress($emailAuthu);

            $template = file_get_contents('view/page/email/success_updateinfo.html');
            $template = str_replace('{{ dateTimeUpdateInfo }}', $dateTimeUpdateInfo, $template);
            $template = str_replace('{{ userNameUpdate }}', $userNameUpdate, $template);
            $template = str_replace('{{ emailUpdate }}', $emailUpdate, $template);
            $template = str_replace('{{ numberPhoneUpdate }}', $numberPhoneUpdate, $template);
            $template = str_replace('{{ addressUpdate }}', $addressUpdate, $template);

            $mail->isHTML(true);
            $mail->Subject = 'Thông báo từ hệ thống';
            $mail->Body = $template;

            $mail->send();

        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    }
    function sendEmailUpdateInfoImageSuccess($emailAuthu, $userNameUpdate, $emailUpdate, $numberPhoneUpdate, $addressUpdate, $imageUpdate )
    {
        $mail = new PHPMailer(true);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateTimeUpdateInfo = date("d/m/Y H:i:s");

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'phongnguyen.050503@gmail.com';
            $mail->Password = 'cdid nsce ywzl wskm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('phongnguyen.050503@gmail.com', 'Hệ Thống');
            $mail->addAddress($emailAuthu);

            $template = file_get_contents('view/page/email/success_updateinfo_image.html');
            $template = str_replace('{{ dateTimeUpdateInfo }}', $dateTimeUpdateInfo, $template);
            $template = str_replace('{{ userNameUpdate }}', $userNameUpdate, $template);
            $template = str_replace('{{ emailUpdate }}', $emailUpdate, $template);
            $template = str_replace('{{ numberPhoneUpdate }}', $numberPhoneUpdate, $template);
            $template = str_replace('{{ addressUpdate }}', $addressUpdate, $template);
            $template = str_replace('{{ imageUpdate }}', $imageUpdate, $template);

            $mail->isHTML(true);
            $mail->Subject = 'Thông báo từ hệ thống';
            $mail->Body = $template;

            $mail->send();

        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    }
}
