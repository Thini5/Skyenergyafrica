<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Destination email
    $to = "monitoring@skyenergyafrica.com";

    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Check if email is valid
    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    // Build email content
    $email_message = "You received a new message from your website contact form:\n\n";
    $email_message .= "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message\n";

    // Email headers
    $from = "webform@skyenergyafrica.com"; // Placeholder, can be any valid-looking address
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Send mail
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "There was a problem sending your message.";
    }
}
?>
