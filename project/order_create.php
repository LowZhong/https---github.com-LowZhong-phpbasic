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
        // include database connection
        include 'database/connection.php';
        include 'database/function.php';
        // define variables and set to empty values
        $orderID = $username = $product1 = $qty1 = $product2 = $qty2 = $product3 = $qty3 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // posted values
            $username = $_POST['username'];
            $product1 = $_POST['product1'];
            $qty1 = $_POST['qty1'];
            $product2 = $_POST['product2'];
            $qty2 = $_POST['qty2'];
            $product3 = $_POST['product3'];
            $qty3 = $_POST['qty3'];
            //$error['username'] = validateUsername($username);
            //$error = array_filter($error);

            try {
                // insert query
                $query = "INSERT INTO 'order_summary' ('username') VALUES(?)";
                // prepare query for execution
                $stmt = $con->prepare($query);
                // bind the parameters
                $stmt->bindParam(1, $username);
                // Execute the query
                if ($stmt->execute()) {
                    $last_order_id = $con->lastInsertId();
                    if ($last_order_id > 0) {
                    }
                }
            } catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
            try {
                $query = "INSERT INTO 'order_details' ('orderID', 'product', 'quantity') VALUES(?,?,?)";

                //prepare query for execute
                $stmt = $con->prepare($query);
                //posted values
                $stmt->bindParam(1, $last_order_id);
                $stmt->bindParam(1, $product1);
                $stmt->bindParam(1, $qty1);
                //execute the query
                if ($stmt->execute()) {
                    $query = "INSERT INTO 'order_details' ('orderID', 'product', 'quantity') VALUES(?,?,?)";

                    //prepare query for execute
                    $stmt = $con->prepare($query);
                    //posted values
                    $stmt->bindParam(1, $last_order_id);
                    $stmt->bindParam(1, $product2);
                    $stmt->bindParam(1, $qty2);
                    //execute the query
                    if ($stmt->execute()) {
                        $query = "INSERT INTO 'order_details' ('orderID', 'product', 'quantity') VALUES(?,?,?)";

                        //prepare query for execute
                        $stmt = $con->prepare($query);
                        //posted values
                        $stmt->bindParam(1, $last_order_id);
                        $stmt->bindParam(1, $product3);
                        $stmt->bindParam(1, $qty3);
                        //execute the query
                        if ($stmt->execute()) {
                        }
                    }
                }
            } catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        }

        ?>

        <!-- html form here where the product information will be entered -->
        <table class='table table-hover table-responsive table-bordered'>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table class='table table-hover table-responsive table-bordered'>

                    <tr>
                        <td>Username</td>
                        <td><input type='text' name='username' class='form-control' value="<?php echo $username; ?>" /></td>
                    </tr>

                    <?php
                    for ($x = 1; $x <= 3; $x++) {
                        try {
                            // prepare select query
                            $query = "SELECT * FROM products";
                            $stmt = $con->prepare($query);
                            // execute our query
                            $stmt->execute();
                            echo '<tr>
                                <td>Select Product ' . $x . '</td>
                                <td>
                                <div class="col">';
                            echo "<select class='form_select' name='product" . $x . "' value='" . $product1 . "'>";
                            echo '<option selected>Product ' . $x . '</option>';
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                echo "<option value='" . $id . "'>" . $name . "</option>";
                            }
                            echo "</select>
                            </div>
                                Quantity
                                <input type='number' name='qty" . $x . "' class='form-control' value='" . $qty1 . "' />";
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