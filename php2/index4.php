<?php require './layout/head.php'; ?>

<h1>Forgot Password</h1>
<form action="function3.php" method="POST">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="uname" placeholder="Enter Username" required /></td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td><input type="password" name="new_password" placeholder="Enter New Password" required /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Change Password" /></td>
        </tr>
    </table>
    </form>


<a href="./">Home</a>
<br>
<a href="./index3.php">Login In</a>

<?php require './layout/foot.php'; ?>

<!-- require will produce a fatal error (E_COMPILE_ERROR) and stop the script -->