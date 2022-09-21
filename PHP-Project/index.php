<html>

<head>
    <title>Registration Form</title>
</head>

<body>
    <?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "phpproject") or die(mysqli_errno(($db)));


    if (isset($_REQUEST["btnSubmit"])) {
        if ($_SESSION["captcha"] == $_REQUEST["txtCaptcha"]) {
            $txtUsername = $_REQUEST["txtUsername"];
            $department = $_REQUEST["department"];
            $txtDOB = $_REQUEST["txtDOB"];
            $txtPhone = $_REQUEST["txtPhone"];
            $txtEmail = $_REQUEST["txtEmail"];
            $txtCity = $_REQUEST["txtCity"];

            $query = "INSERT INTO `user` (`userId`, `username`, `department`, `dob`, `phone`, `email`, `city`) VALUES (NULL,'" . $txtUsername . "', '" . $department . "', '" . $txtDOB . "', '" . $txtPhone . "', '" . $txtEmail . "', '" . $txtCity . "')";

            $result = mysqli_query($db, $query) or die(mysqli_error($db));
        } else {
            echo "Not matched";
        }
    }
    ?>
    <center>
        <h1>Registration Form</h1>
        <form action="" method="post">
            <table border="1">
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="txtUsername"></td>
                </tr>
                <tr>
                    <td>Department: </td>
                    <td>
                        <select name="department" id="department">
                            <option value="Department of ICT">Department of ICT</option>
                            <option value="Department of Computer Science">Department of Computer Science</option>
                            <option value="Department of Management">Department of Management</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth: </td>
                    <td>
                        <input type="date" name="txtDOB" id="txtDOB">
                    </td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="txtPhone">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="txtEmail" id="txtEmail">
                    </td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td>
                        <input type="text" name="txtCity">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <img src="./libs/captcha.php" alt="CAPTCHA" class="captcha-image">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="text" name="txtCaptcha">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" value="Register" name="btnSubmit">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>