<?php
$conn = mysqli_connect("localhost", "root", "vetal123", "Movies");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(empty($_REQUEST)){

    $sql = "SELECT * FROM Movies ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $movie_name = $row['movie_name'];
        $release_date = $row['release_date'];
        $format = $row['format'];
        $actors = $row['actors'];

        $mov_arr[] = array("id" => $id,
            "movie_name" => $movie_name,
            "release_date" => $release_date,
            "format" => $format,
            "actors" => $actors);
    }

    echo json_encode($mov_arr,true);
} elseif ($_REQUEST['sort'] === 'asc') {
    $sql = "SELECT * FROM Movies ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $movie_name = $row['movie_name'];
        $release_date = $row['release_date'];
        $format = $row['format'];
        $actors = $row['actors'];

        $return_arr[] = array("id" => $id,
            "movie_name" => $movie_name,
            "release_date" => $release_date,
            "format" => $format,
            "actors" => $actors);
    }

    echo json_encode($return_arr,true);

}elseif ($_REQUEST['sort'] === 'desc') {
    $sql = "SELECT * FROM Movies ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $movie_name = $row['movie_name'];
        $release_date = $row['release_date'];
        $format = $row['format'];
        $actors = $row['actors'];

        $return_arr[] = array("id" => $id,
            "movie_name" => $movie_name,
            "release_date" => $release_date,
            "format" => $format,
            "actors" => $actors);
    }

    echo json_encode($return_arr,true);
}

