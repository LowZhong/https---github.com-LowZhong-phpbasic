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
        if ($_POST) {
            // include database connection
            include 'database/connection.php';
            include 'database/function.php';
            // posted values
            $orderID = $_POST['orderID'];
            $userName = $_POST['userName'];
            $orderTime = $_POST['orderTime'];
            $product1 = $_POST['product1'];
            $qty1 = $_POST['qty1'];
            $product2 = $_POST['product2'];
            $qty2 = $_POST['qty2'];
            $product3 = $_POST['product3'];
            $qty3 = $_POST['qty3'];
            

            $error[''] = validatename($);
            $error[''] = validatePrice($);

            $error = array_filter($error);
            if (empty($error)) {

                try {
                    // insert query
                    $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    // bind the parameters
                    $stmt->bindParam(':orderID', $orderID);
                    $stmt->bindParam(':userName', $userName);
                    // specify when this record was inserted to the database
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $created = date('Y-m-d H:i:s');
                    $stmt->bindParam(':orderTime', $orderTime);

                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Create Completed.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to create.</div>";
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

        <form action="order_create.php" method="post">
            <table class='table table-hover table-responsive table-bordered'>

                <tr>
                    <td>UserName</td>
                    <td><input type='text' name='userName' class='form-control' /></td>
                </tr>

                <tr>
                    <td>Select Product</td> 
                    <td>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" name='product1' aria-label="Default select example"> 
                                    <option selected>Product 1</option>
                                    <?php
                                    $query = "SELECT * FROM Product"; //link product table to the selection https://stackoverflow.com/questions/28335705/how-do-i-populate-select-menu-options-from-sql-database-using-bootstrap-framewor
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
                                    ?>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Quantity:</td>
                    <td>
                        <div class="col">
                        <td><input type='number' name='qty1' class='form-control' /></td>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" name='product2' aria-label="Default select example"> 
                                    <option selected>Product 2</option>
                                    <?php
                                    $query = "SELECT * FROM Product"; 
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
                                    ?>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Quantity:</td>
                    <td>
                        <div class="col">
                        <td><input type='number' name='qty2' class='form-control' /></td>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" name='product3' aria-label="Default select example"> 
                                    <option selected>Product 3</option>
                                    <?php
                                    $query = "SELECT * FROM Product"; 
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
                                    ?>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Quantity:</td>
                    <td>
                        <div class="col">
                        <td><input type='number' name='qty3' class='form-control' /></td>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary'/>
                        <a href='index.php' class='btn btn-danger'>Back</a>
                    </td>
                </tr>

            </table>

        </form>
    </div>
    <!-- end .container -->
</body>

</html>