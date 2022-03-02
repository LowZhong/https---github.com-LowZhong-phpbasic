<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/array.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="circle">
        <?php
        $number = array("34, 4, 5, -23, 45, 100");

        for ($i = 0; $i < count($number); $i++) {
            echo $number[$i];
        }
        ?>

        <?php
        $a = array(34, 4, 5, -23, 45, 100);
            $x = array_reverse($a,true);
            $y = array_reverse($a);
            print_r($x);
            echo "</br>";
            print_r($y);
        ?>
    </div>
</body>

</html>