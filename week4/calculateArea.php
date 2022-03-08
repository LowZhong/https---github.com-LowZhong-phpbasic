<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CalculateArea</title>
</head>

<body>
    <form method="post">
        <table border="0">
            <tr>
                <td><input type="text" name="num1" value="" placeholder="Enter the radius of a circle" /></td>
            </tr>
            <tr>
                <td> <input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $r = $_POST['num1'];
        $pi = 3.14;
        $area = $pi * $r * $r;
        echo "Area of a Circle is: " . $area;
        $cir = 2 * $pi * $r;
        echo "Circumference of a circle is: " . $cir;
        return 0;
    }
    ?>
</body>

</html>