<?php
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $req_type = '$_GET';
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $req_type = '$_POST';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASSWORD CHANGED</title>
    <style>
        body {
            font-family: "Arial";
        }
        background-color { #2e0083;
        }  
    </style>
</head>
<body>
    <h2>Password Changed Successfully!</h2>
    <table>
        <tr>
            <td width="120">Username:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['uname'] : $_POST['uname']; ?>
            </td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['new_password'] : $_POST['new_password']; ?>
            </td>
        </tr>
    </table>
    <br><br>
    <a href="./index3.php">Return to Log in Page</a>
</body>
</html>