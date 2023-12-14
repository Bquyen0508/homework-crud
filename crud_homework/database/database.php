<?php
function db() {
    $host     = 'localhost'; 
    $database = 'student'; 
    $user     = 'root'; 
    $password = ''; 

    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $db;
}

function createStudent($name,$age,$email,$profile) {
    try {
        $db = db();

        $sql = "INSERT INTO student (name, age, email,profile) 
        VALUES (:name, :age, :email, :profile)";

        // Sử dụng prepared statement để tránh SQL injection
        $stmt = $db->prepare($sql);

        // Gán giá trị cho các tham số
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile', $profile);

        // Thực thi câu lệnh
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function selectAllStudents() {
    try {
        $db = db();

        $sql = "SELECT * FROM student";

        $stmt = $db->query($sql);
        $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $student;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    } 
}

function selectOnestudent($id) {
    try {
        $db = db();

        $sql = "SELECT * FROM student WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        return $student;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function deleteStudent($id) {
    try {
        $db = db();

        $sql = "DELETE FROM student WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Student deleted successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateStudent($value) 
{
    try {
        $db = db();

        $sql = "UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id";
        $stmt = $db->prepare($sql);

        // Gán giá trị cho các tham số
        $stmt->bindParam(':name', $value['name']);
        $stmt->bindParam(':age', $value['age']);
        $stmt->bindParam(':email', $value['email']);
        $stmt->bindParam(':profile', $value['profile']);
        $stmt->bindParam(':id', $value['id']);

        // Thực thi câu lệnh
        $stmt->execute();
        echo "Student information updated successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
