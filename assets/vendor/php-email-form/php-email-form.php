<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "nghiadu03@gmail.com"; // Địa chỉ email người nhận
    $subject = "Tiêu đề email"; // Tiêu đề email
    $message = "Nội dung email"; // Nội dung email

    // Các thông tin cần thiết để gửi email
    $headers = "From: sender@example.com" . "\r\n" .
        "Reply-To: sender@example.com" . "\r\n" .
        "Content-type: text/html; charset=UTF-8" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Gửi email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email đã được gửi đi thành công.";
    } else {
        echo "Có lỗi xảy ra trong quá trình gửi email.";
    }
}
?>