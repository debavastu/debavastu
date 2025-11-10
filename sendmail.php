<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data safely
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $date = htmlspecialchars($_POST['date']);
    $message = htmlspecialchars($_POST['message']);

    // Email configuration
    $to = "contact@debavastu.com";
    $subject = "New Appointment Booking from $name";
    $headers = "From: noreply@debavastu.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email content
    $body = "
    <h2>New Appointment Request</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Service:</strong> $service</p>
    <p><strong>Date:</strong> $date</p>
    <p><strong>Time:</strong> $time</p>
    <p><strong>Message:</strong><br>$message</p>
    <hr>
    <p>Sent from: <a href='http://debavastu.com/'>debavastu.com</a></p>
    ";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='success'>Thank you, $name! Your appointment request has been sent successfully.</div>";
    } else {
        echo "<div class='error'>Sorry, there was an error sending your request. Please try again later.</div>";
    }
}
?>
