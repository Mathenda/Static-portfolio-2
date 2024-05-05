<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    $to = 'Mathendam@gmail.com';
    $subject = 'New message from your website';
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (!mail($to, $subject, $message, $headers)) {
        // If mail() fails, it will return false
        $errorInfo = error_get_last();
        echo json_encode([
            'result' => 'error',
            'message' => 'Could not send email. ' . $errorInfo['message']
        ]);
    } else {
        echo json_encode([
            'result' => 'success',
            'message' => 'Email sent successfully'
        ]);
    }
} else {
    echo json_encode([
        'result' => 'error',
        'message' => 'Invalid request method'
    ]);
}
?>