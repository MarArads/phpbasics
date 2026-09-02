<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output 1</title>
    <style>
        body {
            font-family: "Arial";
        }
    </style>
</head>
<body>
    <h1>PHP Output No. 3</h1>
    
    <fieldset style="margin-top: 20px">
        <legend><b>This form uses POST request</b></legend>
        <form action="redirect.php" method="POST">
        <table>
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="fname" placeholder="Enter First Name" required />
                </td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td>
                    <input type="text" name="mname" placeholder="Enter Middle Name" required />
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="lname" placeholder="Enter Last Name" required />
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td>
                    <input type="number" name="Age" placeholder="Enter Age" required />
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="Gender" id="Gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" placeholder="Enter Email" required />
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="address" placeholder="Enter Address" required />
                </td>
            </tr>
            <tr>
                <td>Contact Number</td>
                <td>
                    <input type="number" name="Contact" placeholder="Enter Contact Number" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit Data">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
        </table>
        </form>
    </fieldset>


    <?php
require_once 'dbcontroller.php';
$dbhandler = new DBController();

if(isset($_GET["submit"])) {
    $where = array();
    $query = "SELECT * FROM student WHERE ";

    if(($_GET["fname"]))   {$where[] = "fname LIKE '{$_GET["fname"]}%'"; }
    if(($_GET["mname"]))   {$where[] = "mname LIKE '{$_GET["mname"]}%'"; }
    if(($_GET["lname"]))   {$where[] = "lname LIKE '{$_GET["lname"]}%'"; }
    if(($_GET["Age"]))     {$where[] = "Age LIKE '{$_GET["Age"]}%'"; }
    if(!empty($_GET["student_gender"])) {$where[] = "Gender LIKE '{$_GET["student_gender"]}%'"; }
    if(($_GET["email"]))   {$where[] = "email LIKE '{$_GET["email"]}%'"; }
    if(($_GET["address"])) {$where[] = "address LIKE '{$_GET["address"]}%'"; }
    if(($_GET["Contact"])) {$where[] = "Contact LIKE '{$_GET["Contact"]}%'"; }

    if(!(count($where) === 0)) {
        $query .= implode(" AND ", $where);
        $query .= " ORDER BY lname";
    
        $result = $dbhandler->executeQuery($query);
        $where = array();
    } else {
        $query = "SELECT * FROM student ORDER BY lname";
        $result = $dbhandler->executeQuery($query);
    }
} else {
    $query = "SELECT * FROM student ORDER BY lname";
    $result = $dbhandler->executeQuery($query);
}
?>


    <link href="DataTables/datatables.min.css" rel="stylesheet"/>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial;
        }
        table {
            border-collapse: collapse;
            margin-block: 20px;
        }
        thead, tbody, th, td {
            border: 1px solid black;
        }
        table input[type="text"], table input[type="submit"], table select{
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form action="index.php" method="GET">
    <h2>List Student's Information</h2>
    <p>This output connects to the database, retrieves data and allows user to filter and search records.</p>
    <table id="example">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <tr>
                <th>
                    <input type="text" name="fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : "";?>">
                </th>
                <th>
                    <input type="text" name="mname" value="<?php echo isset($_GET['mname']) ? $_GET['mname'] : "";?>">
                </th>
                <th>
                    <input type="text" name="lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : "";?>">
                </th>
                <th>
                    <input type="text" name="Age" value="<?php echo isset($_GET['Age']) ? $_GET['Age'] : "";?>">
                </th>
                <th>
                    <select name="student_gender" id="student_gender">
                        <option value="">Select All</option>
                        <option value="Male" <?php echo (isset($_GET['student_gender']) && $_GET['student_gender'] == "Male") ? "selected" : "";?>>Male</option>
                        <option value="Female" <?php echo (isset($_GET['student_gender']) && $_GET['student_gender'] == "Female") ? "selected" : "";?>>Female</option>
                    </select>
                </th>
                <th>
                    <input type="text" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : "";?>">
                </th>
                <th>
                    <input type="text" name="address" value="<?php echo isset($_GET['address']) ? $_GET['address'] : "";?>">
                </th>
                <th>
                    <input type="text" name="Contact" value="<?php echo isset($_GET['Contact']) ? $_GET['Contact'] : "";?>">
                </th>
                <th>
                    <input type="submit" name="submit" value="Filter">
                </th>
            </tr>
        </thead>
 
        <tbody>


            <?php 
                if($result) {
                    foreach ($result as $key => $value) {
                        echo '
                            <tr>
                                <td>'. $value['fname'] .'</td>
                                <td>'. $value['mname'] .'</td>
                                <td>'. $value['lname'] .'</td>
                                <td>'. $value['Age'] .'</td>
                                <td>'. $value['Gender'] .'</td>
                                <td>'. $value['email'] .'</td>
                                <td>'. $value['address'] .'</td>
                                <td>'. $value['Contact'] .'</td>
                                <td></td>
                            </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
    </form>

    <script src="DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>

    <script>
        $(document).ready( () => {
            $('#example').DataTable({
                order: [],
                bFilter: false,
                bSortCellsTop: true,
                pageLength: 25
            });
        });
    </script>
</body>
</html>

</body>
</html>