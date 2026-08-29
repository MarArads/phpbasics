<?php require './layout/head.php'; ?>
<form action="function.php" method="GET">

<h1>REGISTER NOW!!!</h1>
<p>REGISTER TO phpbasics for free online and learn php programming and web development from scratch. You will be able to learn php programming and web development for free.</p>
<table>
    <tr>
        <td>Username</td>
            <td>
               <input type="text" name="uname" placeholder="Enter Username" required />
            </td>
    </tr>
    <tr>
        <td>Password</td>
            <td>
               <input type="password" name="password" placeholder="Enter Password" required />
            </td>
    </tr>
    <tr>
                <td></td>
                <td>
                    <input type="submit" value="Register">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
</table>
</form>
<a href="./">Home</a>
<br>
<a href="./index3.php">Log In</a>


<?php require './layout/foot.php'; ?>

<!-- require will produce a fatal error (E_COMPILE_ERROR) and stop the script -->