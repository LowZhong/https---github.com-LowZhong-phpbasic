<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .circle {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            padding: 3px;
            background: #fff;
            border: 3px solid #000;
            color: #000;
            text-align: center;
            font: 23px Arial, sans-serif;
        }
    </style>
</head>

<body>
    <?php $array = array(41, 52, 33, 54, 65); ?>
    <div class="container mt-5">
        <div class="row text-center">
            <?php for ($i = 0; $i <= count($array) - 1; $i++) { ?>
                <div class="col">
                    <div class="circle">
                        <?php echo $array[$i]; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    $array = array(41, 52, 33, 54, 65);
    $temp = $array[0];
    $array[0] = $array[4];
    $array[4] = $temp;
    ?>

    <div class="container mt-5">
        <div class="row text-center">
            <?php for ($i = 0; $i <= count($array) - 1; $i++) { ?>
                <div class="col">
                    <div class="circle">
                        <?php echo $array[$i]; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>