<?php
$connect = mysqli_connect('127.0.0.1:3306', 'root', 'vetal123', 'Movies');

if (isset($_POST["submit"]) && $_FILES['file']['name']) {
    $filename = explode(',', $_FILES['file']['name']);
    $handle = fopen($_FILES['file']['tmp_name'], "r");
    while ($data = fgetcsv($handle)) {
        $item = mysqli_real_escape_string($connect, $data[0]);
        $item1 = mysqli_real_escape_string($connect, $data[1]);
        $item2 = mysqli_real_escape_string($connect, $data[2]);
        $item3 = mysqli_real_escape_string($connect, $data[3]);
        $query = "INSERT INTO Movies(movie_name,release_date,format,actors) VALUES('$item','$item1','$item2','$item3')";

    }
    if ($connect->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $connect->error;
    }
    mysqli_query($connect, $query);
    fclose($handle);
}

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<h3 align="center"></h3><br/>
<form method="post" enctype="multipart/form-data">
    <div align="center">
        <label>Select CSV File:</label>
        <input type="file" name="file"/>
        <br/>
        <input type="submit" name="submit" value="Import" class="btn btn-info"/>
    </div>
</form>
</body>
</html>


