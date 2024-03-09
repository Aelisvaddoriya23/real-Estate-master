<?php 
    session_start();
    session_destroy();
    header('location: ./login.php');

    // Start the session
//     try {
//     session_start();

// // Generate a unique token for this tab or window
// $token = md5(uniqid(mt_rand(), true));
// echo "1";
// // Store the token in a separate cookie
// setcookie('tab_token', $token);
// echo "2";
// // Store the token in the session data

// $_SESSION['tab_token'] = $token;
// echo "3";

// // Check if the user has clicked the logout button
// if (isset($_POST['logout'])) {
// echo "4";
//     // Get the token for this tab or window
//     $tab_token = isset($_COOKIE['tab_token']) ? $_COOKIE['tab_token'] : '';
//     echo "5";
//     echo "</br>";
//     echo $tab_token;
//     echo "</br>";
//     // Get the token from the session data
//     $session_token = isset($_SESSION['tab_token']) ? $_SESSION['tab_token'] : '';
//     echo "6";
//     echo $session_token;
//     // Check if the tokens match
//     if ($tab_token === $session_token) {
//         echo "7";
//         // Remove the token from the cookie
//         setcookie('tab_token', '', time() - 3600);
//         echo "8";
//         // Remove the token from the session data
//         unset($_SESSION['tab_token']);
//         echo "9";
//         // Redirect the user to the login page
//         header("Location: ./login.php");
//         echo "10";
//         exit();
//     }
// }}
// catch(Exception $e) {
//     echo 'Message: ' .$e->getMessage();
//   }
?>