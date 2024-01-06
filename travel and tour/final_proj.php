<!DOCTYPE html>
<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Student Information System</h2>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "enrollment_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create Users table
        $sql = "
            CREATE TABLE IF NOT EXISTS Users (
              id INT AUTO_INCREMENT PRIMARY KEY,
              username VARCHAR(50) NOT NULL,
              password VARCHAR(50) NOT NULL,
              email VARCHAR(100) NOT NULL,
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Users table created successfully</div>';
        } else {
            echo '<div class="alert alert-danger">Error creating Users table: ' . $conn->error . '</div>';
        }

        // Create Student table
        $sql = "
            CREATE TABLE IF NOT EXISTS Student (
              id INT AUTO_INCREMENT PRIMARY KEY,
              first_name VARCHAR(50) NOT NULL,
              last_name VARCHAR(50) NOT NULL,
              date_of_birth DATE NOT NULL,
              address VARCHAR(100),
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Student table created successfully</div>';
        } else {
            echo '<div class="alert alert-danger">Error creating Student table: ' . $conn->error . '</div>';
        }

        // Create Course table
        $sql = "
            CREATE TABLE IF NOT EXISTS Course (
              id INT AUTO_INCREMENT PRIMARY KEY,
              course_name VARCHAR(100) NOT NULL,
              course_description VARCHAR(255),
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Course table created successfully</div>';
        } else {
            echo '<div class="alert alert-danger">Error creating Course table: ' . $conn->error . '</div>';
        }

        // Create Instructor table
        $sql = "
            CREATE TABLE IF NOT EXISTS Instructor (
              id INT AUTO_INCREMENT PRIMARY KEY,
              first_name VARCHAR(50) NOT NULL,
              last_name VARCHAR(50) NOT NULL,
              email VARCHAR(100) NOT NULL,
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Instructor table created successfully</div>';
        } else {
            echo '<div class="alert alert-danger">Error creating Instructor table: ' . $conn->error . '</div>';
        }

        // Handle CRUD operations for Users
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["create_user"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];

                $stmt = $conn->prepare("INSERT INTO Users (username, password, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $password, $email);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">User created successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error creating user: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } elseif (isset($_POST["update_user"])) {
                $user_id = $_POST["user_id"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];

                $stmt = $conn->prepare("UPDATE Users SET username=?, password=?, email=? WHERE id=?");
                $stmt->bind_param("sssi", $username, $password, $email, $user_id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">User updated successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error updating user: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } elseif (isset($_POST["delete_user"])) {
                $user_id= $_POST["user_id"];

                $stmt = $conn->prepare("DELETE FROM Users WHERE id=?");
                $stmt->bind_param("i", $user_id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">User deleted successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error deleting user: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            }
        }

        // Handle CRUD operations for Student
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["create_student"])) {
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $date_of_birth = $_POST["date_of_birth"];
                $address = $_POST["address"];

                $stmt = $conn->prepare("INSERT INTO Student (first_name, last_name, date_of_birth, address) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $first_name, $last_name, $date_of_birth, $address);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Student created successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error creating student: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } elseif (isset($_POST["update_student"])) {
                $student_id = $_POST["student_id"];
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $date_of_birth = $_POST["date_of_birth"];
                $address = $_POST["address"];

                $stmt = $conn->prepare("UPDATE Student SET first_name=?, last_name=?, date_of_birth=?, address=? WHERE id=?");
                $stmt->bind_param("ssssi", $first_name, $last_name, $date_of_birth, $address, $student_id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Student updated successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error updating student: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } elseif (isset($_POST["delete_student"])) {
                $student_id = $_POST["student_id"];

                $stmt = $conn->prepare("DELETE FROM Student WHERE id=?");
                $stmt->bind_param("i", $student_id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Student deleted successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error deleting student: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            }
        }

        // Handle CRUD operations for Course
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["create_course"])) {
                $course_name = $_POST["course_name"];
                $course_description = $_POST["course_description"];

                $stmt = $conn->prepare("INSERT INTO Course (course_name, course_description) VALUES (?, ?)");
                $stmt->bind_param("ss", $course_name, $course_description);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Course created successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error creating course: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } elseif (isset($_POST["update_course"])) {
                $course_id = $_POST["course_id"];
                $course_name = $_POST["course_name"];
                $course_description = $_POST["course_description"];

                $stmt = $conn->prepare("UPDATE Course SET course_name=?, course_description=? WHERE id=?");
                $stmt->bind_param("ssi", $course_name, $course_description, $course_id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Course updated successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error updating course: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } elseif (isset($_POST["delete_course"])) {
                $course_id = $_POST["course_id"];

                $stmt = $conn->prepare("DELETE FROM Course WHERE id=?");
                $stmt->bind_param("i", $course_id);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Course deleted successfully</div>';
                } else {
                    echo '<div class="alert alert-danger">Error deleting course: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            }
        }

      // Handle CRUD operations for Instructor
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["create_instructor"])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];

            $stmt = $conn->prepare("INSERT INTO Instructor (first_name, last_name, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $first_name, $last_name, $email);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Instructor created successfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error creating instructor: ' . $stmt->error . '</div>';
            }

            $stmt->close();
        } elseif (isset($_POST["update_instructor"])) {
            $instructor_id = $_POST["instructor_id"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];

            $stmt = $conn->prepare("UPDATE Instructor SET first_name=?, last_name=?, email=? WHERE id=?");
            $stmt->bind_param("sssi", $first_name, $last_name, $email, $instructor_id);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Instructor updated successfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error updating instructor: ' . $stmt->error . '</div>';
            }

            $stmt->close();
        } elseif (isset($_POST["delete_instructor"])) {
            $instructor_id = $_POST["instructor_id"];

            $stmt = $conn->prepare("DELETE FROM Instructor WHERE id=?");
            $stmt->bind_param("i", $instructor_id);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Instructor deleted successfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error deleting instructor: ' . $stmt->error . '</div>';
            }

            $stmt->close();
        }
    }

    // Display Users
    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Users</h3>";
        echo "<table class='table'><tr><th>ID</th><th>Username</th><th>Email</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["email"]."</td>
                    <td>
                        <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                            <input type='hidden' name='user_id' value='".$row["id"]."'>
                            <button type='submit' name='update_user' class='btn btn-sm btn-primary'>Update</button>
                            <button type='submit' name='delete_user' class='btn btn-sm btn-danger'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found</p>";
    }

    // Display Students
    $sql = "SELECT * FROM Student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Students</h3>";
        echo "<table class='table'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Address</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["first_name"]."</td>
                    <td>".$row["last_name"]."</td>
                    <td>".$row["date_of_birth"]."</td>
                    <td>".$row["address"]."</td>
                    <td>
                        <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                            <input type='hidden' name='student_id' value='".$row["id"]."'>
                            <button type='submit' name='update_student' class='btn btn-sm btn-primary'>Update</button>
                            <button type='submit' name='delete_student' class='btn btn-sm btn-danger'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No students found</p>";
        } 

        // Display Instructors
$sql = "SELECT * FROM Instructor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Instructors</h3>";
    echo "<table class='table'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["first_name"]."</td>
                <td>".$row["last_name"]."</td>
                <td>".$row["email"]."</td>
                <td>
                    <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                        <input type='hidden' name='instructor_id' value='".$row["id"]."'>
                        <button type='submit' name='update_instructor' class='btn btn-sm btn-primary'>Update</button>
                        <button type='submit' name='delete_instructor' class='btn btn-sm btn-danger'>Delete</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No instructors found</p>";
}

// Close the database connection
$conn->close();
?>
</body>
</html>