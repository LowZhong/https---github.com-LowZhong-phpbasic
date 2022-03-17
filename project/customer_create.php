<!DOCTYPE HTML>
<html>

<head>
    <title>New Customer Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Customer Create Account</h1>
        </div>

        <?php
        if ($_POST) {
            // include database connection
            include 'database/connection.php';
            // posted values
            $username = $_POST['username'];
            $password = $_POST['password'];
            $inputconfirmPassword = $_POST['inputconfirmPassword'];
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $birthdate = $_POST['birthdate'];
            $gender = $_POST['gender'];

            $error['username'] = validateUsername($username); //array call function
            $error['password'] = validatePassword($password, $inputconfirmPassword);

            $error = array_filter($error); //remove null value in the $error if there is no error msg, not have this will not update to database
            if (empty($error)) { //array里面会有nullvalue如果没有clear null value系统以为他不是empty

                try {
                    // insert query
                    $query = "INSERT INTO customer SET username=:username, password=:password, email=:email, firstname=:firstname, lastname=:lastname, birthdate=:birthdate, gender=:gender";
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    // bind the parameters
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':birthdate', $birthdate);
                    $stmt->bindParam(':gender', $gender);
                    // specify when this record was inserted to the database

                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Record was saved.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
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

        <form action="customer_create.php" method="post">
            <table class='table table-hover table-responsive table-bordered'>

                <div class="row">
                    <div class="col">
                        <input type="text" name="username" id="username" class="form-control" placeholder="username">
                    </div>
                    <div class="col">
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First name">
                    </div>

                    <div class="col">
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last name">
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                    <label class="form-check-label" for="gender">
                        male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                    <label class="form-check-label" for="gender">
                        female
                    </label>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputconfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputconfirmPassword" name="inputconfirmPassword" placeholder="Password">
                    </div>
                </div>

                <!--day-->
                <?php
                $selected_day = date('d'); //current day

                echo '<select id="birthdate" name="birthdate">' . "\n";
                for ($i_day = 1; $i_day <= 31; $i_day++) {
                    $selected = ($selected_day == $i_day ? ' selected' : '');
                    echo '<option value="' . $i_day . '"' . $selected . '>' . $i_day . '</option>' . "\n";
                }
                echo '</select>' . "\n";
                ?>

                <!--month-->
                <?php
                $selected_month = date('m'); //current month

                echo '<select id="birthdate" name="birthdate">' . "\n";
                for ($i_month = 1; $i_month <= 12; $i_month++) {
                    $selected = ($selected_month == $i_month ? ' selected' : '');
                    echo '<option value="' . $i_month . '"' . $selected . '>' . date('F', mktime(0, 0, 0, $i_month)) . '</option>' . "\n";
                }
                echo '</select>' . "\n";
                ?>

                <!--year-->
                <?php
                $year_start  = 2022;
                $year_end = date('Y'); // current Year
                $user_selected_year = 2022;

                echo '<select id="birthdate" name="birthdate">' . "\n";
                for ($i_year = $year_start; $i_year >= 1990; $i_year--) {
                    $selected = ($user_selected_year == $i_year ? ' selected' : '');
                    echo '<option value="' . $i_year . '"' . $selected . '>' . $i_year . '</option>' . "\n";
                }
                echo '</select>' . "\n";
                ?>

                <td>
                    <input type='submit' value='Save' class='btn btn-primary' />

                </td>
            </table>

        </form>
    </div>
</body>

</html>