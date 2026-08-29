<?php require './layout/head.php'; ?>

<h1>LOG IN HERE</h1>
<form action="function2.php" method="POST">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="uname" placeholder="Enter Username" required /></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Enter Password" required /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Log In" /></td>
        </tr>
    </table>
</form>


<a href="./index2.php">Register</a>
<br>
<a href="./index4.php">Forgot Password</a>

<?php require './layout/foot.php'; ?>

<!-- require will produce a fatal error (E_COMPILE_ERROR) and stop the script -->