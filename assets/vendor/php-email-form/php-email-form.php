<?php

class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp;
    public $message;
    public $headers;

    public function __construct() {
        $this->message = '';
        $this->headers = '';
    }

    public function add_message($message, $label = '') {
        if ($label) {
            $this->message .= "$label: $message<br>";
        } else {
            $this->message .= "$message<br>";
        }
    }

    public function send() {
        $this->headers .= "From: $this->from_name <$this->from_email>\r\n";
        $this->headers .= "Reply-To: $this->from_email\r\n";
        $this->headers .= "Content-type: text/html\r\n";

        if (!empty($this->smtp)) {
            $host = $this->smtp['host'];
            $username = $this->smtp['username'];
            $password = $this->smtp['password'];
            $port = $this->smtp['port'];
            ini_set("SMTP", $host);
            ini_set("smtp_port", $port);
            ini_set("sendmail_from", $this->from_email);
            ini_set("auth_username", $username);
            ini_set("auth_password", $password);
            $this->headers .= "MIME-Version: 1.0\r\n";
            $this->headers .= "Content-type: text/html\r\n";
        }

        return mail($this->to, $this->subject, $this->message, $this->headers);
    }
}

?>
