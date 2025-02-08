<?php
$server_name = "localhost";
$username = "root";
$db_name = "jkl";
$password = "";


$conn = mysqli_connect('localhost', 'root', '', 'jkl');


if ($conn) {
    echo "connection successfully!";
} else {
    die("failed connection!" . mysqli_connect_error());
}


if (isset($_POST["submit1"])) {
    mysqli_query($conn, "insert into jkl values('$_POST[email]','$_POST[password]')");
    echo "Record inserted successfully!";
}
if (isset($_POST["submit2"])) {
    mysqli_query($conn, "delete from jkl where email='$_POST[email]'");
    echo "Record deleted successfully!";
}
if (isset($_POST["submit3"])) {
    mysqli_query($conn, "update jkl set email='$_POST[email]' where password='$_POST[password]'");
}
if (isset($_POST["submit4"])) {
    $res = mysqli_query($conn, "select * from jkl");
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>";
    echo "email";
    echo "</th>";
    echo "<th>";
    echo "password";
    echo "</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>";
        echo $row["email"];
        echo "</td>";
        echo "<td>";
        echo $row["password"];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_post["submit5"])) {
    $res = mysqli_query($conn, "select *from jkl where email='$_POST[email]'");
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>";
    echo "email";
    echo "</th>";
    echo "<th>";
    echo "password";
    echo "</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>";
        echo $row["email"];
        echo "</td>";
        echo "<td>";
        echo $row["password"];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}


?>

<html>

<head>
    <title>database operation</title>
</head>

<body>
    <form name="form1" action="connect.php" method="post">

        <table>
            <tr>
                <td>enter email:</td>
                <td><input type="text" name="email"></td>
            </tr>

            <tr>
                <td>enter password:</td>
                <td><input type="number" name="password"></td>
            </tr>

            <td colspan="2" align="center">
                <input type="submit" name="submit1" value="insert">
                <input type="button" name="submit2" value="delete">
                <input type="button" name="submit3" value="update">
                <input type="button" name="submit4" value="display">
                <input type="button" name="submit5" value="select"></button>
            </td>
        </table>
    </form>
</body>

</html>