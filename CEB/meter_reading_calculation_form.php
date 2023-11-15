

    <html>
        <head>
            <title>
                    dashboard
            </title>
            <link rel="stylesheet" href="style.css">
        </head>
    <body>

        <div class="banner">
            <?php include_once'navbar.php' ?>
            <div class="meter_reading_form">
            
            <h1>Meter Reading Calculator</h1>

                <form action="include/calculate_consumption.php" method="post">
                    <label for="start_date">Start Date:</label>
                    <select name="start_date" required>
                        <option value="id"><?php
                            session_start();
                            require_once 'include/dbh.inc.php';

                            $user_id = $_SESSION['user_id'];
                        
                            $query = "SELECT DISTINCT reading_date FROM meter_readings WHERE usersId = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                        
                            if ($stmt->error) {
                                die("Error: " . $stmt->error);
                            }
                        
                            $result = $stmt->get_result();
                        
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['reading_date']}'>{$row['reading_date']}</option>";
                            }
                        
                            $stmt->close();
                            ?>
                            
                        </option>
                    </select><br>

                    <label for="end_date">End Date:</label>
                    <select name="end_date" required>
                    <?php
                            session_start();
                            require_once 'include/dbh.inc.php';

                            $user_id = $_SESSION['user_id'];
                        
                            $query = "SELECT DISTINCT reading_date FROM meter_readings WHERE usersId = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                        
                            if ($stmt->error) {
                                die("Error: " . $stmt->error);
                            }
                        
                            $result = $stmt->get_result();
                        
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['reading_date']}'>{$row['reading_date']}</option>";
                            }
                        
                            $stmt->close();
                            ?>
                            
                        </option>
                    </select><br>

                    <button class="submit_button" name="submit" type="submit">Submit</button>
                </form>
    </body>
    </html>





