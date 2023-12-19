
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Set up email parameters
    $to = 'rajatjosh2323@gmail.com'; // Replace with your email address
    $subject = "New Contact Form Submission: $subject";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    $success = mail($to, $subject, $message, $headers);

    // Check if the email was sent successfully
    if ($success) {
        http_response_code(200); // OK
        echo "Your message has been sent. Thank you!";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(400); // Bad Request
    echo "Oops! There was a problem with your submission. Please try again.";
}
?>
