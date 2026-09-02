<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "phpbasics";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}

$isSuccess = false; 

if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $Contact = $_POST['Contact']; 

    $sql = "INSERT INTO student(fname,mname,lname,Age,Gender,email,address,Contact) VALUES('$fname', '$mname', '$lname', $Age, '$Gender', '$email', '$address', $Contact)";

    if($conn->query($sql) === TRUE) {
        $isSuccess = true;
    } else {
        echo $sql." ".$conn->error;
    }
}
?>

<?php include './layout/head.php'; ?>
    
    <?php if($isSuccess): ?>
        <h3>Record Successfully Inserted to Database</h3>
    <?php endif; ?>
    
    <a href="./">Back to Main Form</a>
<?php include './layout/foot.php'; ?>



