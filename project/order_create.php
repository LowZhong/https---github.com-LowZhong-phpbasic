<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Order Create</h1>
        </div>

        <?php
        include 'database/connection.php';
        // define variables and set to empty values
        $orderIDErr = $userNameErr = $orderTimeErr = $product1Err = $qty1Err = $product2Err = $qty2Err = $product3Err = $qty3Err = "";
        $orderID = $userName = $orderTime = $product1 = $qty1 = $product2 = $qty2 = $product3 = $qty3 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // include database connection
            
            include 'database/function.php';
            // posted values
            
            $userName = $_POST['userName'];
            
            $product1 = $_POST['product1'];
            $qty1 = $_POST['qty1'];
            $product2 = $_POST['product2'];
            $qty2 = $_POST['qty2'];
            $product3 = $_POST['product3'];
            $qty3 = $_POST['qty3'];

            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }



            $error['userName'] = validateOrderusername($userName);

            $error = array_filter($error);
            if (empty($error)) {

                try {
                    // insert query
                    $query = "INSERT INTO order_summary ('userName') VALUES(?)";
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    // bind the parameters
                    //$stmt->bindParam(':orderID', $orderID);
                    $stmt->bindParam(1, $userName);
                    /*$stmt->bindParam(':product1', $product1);
                    $stmt->bindParam(':product2', $product2);
                    $stmt->bindParam(':product3', $product3);
                    $stmt->bindParam(':qty1', $qty1);
                    $stmt->bindParam(':qty2', $qty2);
                    $stmt->bindParam(':qty3', $qty3);*/
                    // specify when this record was inserted to the database
                    /*date_default_timezone_set("Asia/Kuala_Lumpur");
                    $orderTime = date('Y-m-d H:i:s');
                    $stmt->bindParam(':orderTime', $orderTime);*/

                    // Execute the query
                    if ($stmt->execute()) {
                        $last_order_id = $con->lastInsertId();
                        if ($last_order_id > 0) {
                        }
                    }
                }

                // show error
                catch (PDOException $exception) {
                    die('ERROR: ' . $exception->getMessage());
                }
            } else {
                foreach ($error as $value) {
                    echo "<div class='alert alert-danger'>$value <br/></div>"; //start print error msg
                }
            }
        }

        
        ?>
        <!-- html form here where the product information will be entered -->
        <table class='table table-hover table-responsive table-bordered'>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table class='table table-hover table-responsive table-bordered'>

                    <tr>
                        <td>Username</td>
                        <td><input type='text' name='userName' class='form-control' value="<?php echo $userName; ?>" /></td>
                    </tr>

                 
                                

                    <?php

                    for($x=1 ; $x<=3 ; $x++){
                        try {
                            // prepare select query
                            $query = "SELECT * FROM products";
                            $stmt = $con->prepare($query);
                            // execute our query
                            $stmt->execute();
                            echo '<tr>
                                <td>Select Product '.$x.'</td>
                                <td>
                                <div class="col">';
                            echo "<select class='form_select' name='product".$x."'' value='" .$product1. "'>";
                            echo '<option selected>Product '.$x.'</option>';
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                echo "<option value='".$id."'>".$name."</option>";
                            }
                            echo "</select>
                            </div>
                                Quantity
                                <input type='number' name='qty".$x."' class='form-control' value='". $qty1 ."' />
                            </td>
                            </tr>
                            
                            ";
                        }
                        // show error
                        catch (PDOException $exception) {
                            die('ERROR: ' . $exception->getMessage());
                        }
                    }

                    ?>
                                
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value='Save' class='btn btn-primary' />
                            <a href='index.php' class='btn btn-danger'>Back</a>
                        </td>
                    </tr>

                </table>


            </form>

    </div>
    <!-- end .container -->
</body>

</html>