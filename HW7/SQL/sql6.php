<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection</title>
</head>
<body>

<div style="background-color:#c9c9c9;padding:15px;">
    <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
    <button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';">Main Page</button>
</div>
<div align="center">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <p>Give me book's number and I give you...</p>
        Book's number : <input type="text" name="number">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<!--Admin password is in the secret table. I hope, anyone doesn't see it.-->
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


if (isset($_GET["submit"])) {
    $number = intval($_GET['number']);
    $stm = $conn->prepare('SELECT bookname, authorname FROM books WHERE number = :book_number');
    $stm->bindParam(':book_number', $number);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) {
        echo 'not found';
    } else {
        echo "<hr>";
        echo "<pre>There is a book with this index.</pre>";
    }
}
?>

</body>
</html>
