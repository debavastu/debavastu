<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receiving Form Data
    $name     = htmlspecialchars($_POST['name']);
    $email    = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $service  = htmlspecialchars($_POST['service']);
    $date     = htmlspecialchars($_POST['date']);
    $message  = htmlspecialchars($_POST['message']);

    // Email where data will be received
    $to = "contact@debavastu.com";

    // Email Subject
    $subject = "New Appointment Booking - DeBaVastu";

    // Email Body
    $body = "
New Appointment Booking Received:

Name: $name
Email: $email
Phone: $phone
Service: $service
Preferred Date: $date
Message: $message
    ";

    // Email Headers
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";

    // Sending Email
    if (mail($to, $subject, $body, $headers)) {

        // Optional: Send confirmation to the user
        $confirm_subject = "Your Appointment Request Received";
        $confirm_body = "
Dear $name,

Thank you for booking an appointment with DeBaVastu.
We have received your request and will contact you shortly.

Details Submitted:
Service: $service
Date: $date

Regards,
DeBaVastu Team
        ";
        mail($email, $confirm_subject, $confirm_body, "From: contact@debavastu.com");

        // Redirect after success
        echo "<h2 style='text-align:center;color:green;'>✅ Appointment Request Sent Successfully!</h2>";
    } else {
        echo "<h2 style='text-align:center;color:red;'>❌ Error sending appointment request. Please try again.</h2>";
    }
}
?>
