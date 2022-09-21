<html>

<body>

    <table border="1">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Department</td>
            <td>Action</td>
        </tr>

        <?php
        $db = mysqli_connect("localhost", "root", "", "phpproject") or die(mysqli_errno(($db)));
        $result = mysqli_query($db, "select * from user");

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><input type="button" value="Delete">&nbsp;<input type="button" value="Edit"></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>