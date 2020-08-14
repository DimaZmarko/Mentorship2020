<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection</title>
    <link rel="shortcut icon" href="../Resources/hmbct.png"/>
</head>
<body>
<div style="background-color:#c9c9c9;padding:15px;">
    <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
    <button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';">Main Page</button>
</div>

<div align="center">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <p>Give me book's number and I give you book's name in my library.</p>
        Book's number : <input type="text" name="number">
        <input type="submit" name="submit" value="Submit">
        <!--<p>You hacked me again?
               But I updated my code
            </p>
        -->
    </form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "1ccb8097d0e9ce9f154608be60224c7c";

// Create connection
try {
    $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $db, $username, $password);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo 'Connection failed:' . $exception->getMessage();
}

if (isset($_POST["submit"])) {
    $number = $_POST['number'];
    //You hacked me again?
    //I updated my code
    if (strchr($number, "'")) {
        echo "What are you trying to do?<br>";
        echo "Awesome hacking skillzz<br>";
        echo "But you can't hack me anymore!";
        exit;
    }

    $stm = $conn->prepare('SELECT bookname, authorname FROM books WHERE number = :book_number');
    $stm->bindParam('book_number', $number);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) { //Check result
        $message = 'Invalid query: ' . mysqli_error($conn) . "\n";
        $message .= 'Stm error: ' . $stm->get_warnings($stm);
        die($message);
    }

    foreach ($result as $row) {
        echo "<hr>";
        echo $row['bookname'] . " ----> " . $row['authorname'];
    }

    if (count($result) <= 0)
        echo "0 result";

}
?>

</body>
</html>
