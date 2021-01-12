<!DOCTYPE html>
<html>
<body>
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
<table>
    <h3 align="center"></h3><br/>
    <form method="post" enctype="multipart/form-data">
        <div align="center">
            <label>Select CSV File:</label>
            <input type="file" name="file"/>
            <br/>
            <input type="submit" name="submit" value="Import" class="btn btn-info"/>
        </div>
        <button type="button" id="asc">Sort By ASC</button>
        <button type="button" id="desc">Sort By DESC</button>
        <html>
        <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
        <body>
        <br/><br/>
        <div class="container" style="width:900px;">
            <div class="container">
                <table id="userTable" border="1">
                    <thead>
                    <tr>
                        <th width="5%">id</th>
                        <th width="20%">movie_name</th>
                        <th width="20%">release_date</th>
                        <th width="30%">format</th>
                        <th width="30%">actors</th>
                        <th width="30%" id="actions">actions</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                        <!--                    <tbody></tbody>-->
                </table>
            </div>
</table>
<script>
    $(document).ready(function () {
        $('#userTable').on('click', '#delete', function () {
            alert('Deleted')
            var data = {
                delete: $('#id').text()
            }
            $.ajax({
                url: 'DeleteMovie.php',
                type: 'get',
                dataType: 'JSON',
                data: data,
                success: function (response) {
                    alert('Delete')
                }
            });
        });
        $('#asc').on('click', function () {
            $("#userTable tbody").empty();
            var data = {
                sort: 'asc'
            }
            $.ajax({
                url: 'Sorting.php',
                type: 'get',
                dataType: 'JSON',
                data: data,
                success: function (response) {
                    var len = response.length;
                    for (var i = 0; i < len; i++) {
                        var id = response[i].id;
                        var movie_name = response[i].movie_name;
                        var release_date = response[i].release_date;
                        var format = response[i].format;
                        var actors = response[i].actors;

                        var tr_str = "<tr>" +
                            "<td id='id' align='center'>" + id + "</td>" +
                            "<td align='center'>" + movie_name + "</td>" +
                            "<td align='center'>" + release_date + "</td>" +
                            "<td align='center'>" + format + "</td>" +
                            "<td align='center'>" + actors + "</td>" +
                            "<td align='center'>" + "<button type='button' id='delete'>" + 'Delete' + "</button>" + "</td>" +
                            "</tr>";
                        $("#userTable ").append(tr_str);

                    }
                }
            });
        });

        $('#desc').on('click', function () {
            $("#userTable tbody").empty();
            var data = {
                sort: 'desc'
            }
            $.ajax({
                url: 'Sorting.php',
                type: 'get',
                dataType: 'JSON',
                data: data,
                success: function (response) {
                    var len = response.length;
                    for (var i = 0; i < len; i++) {
                        var id = response[i].id;
                        var movie_name = response[i].movie_name;
                        var release_date = response[i].release_date;
                        var format = response[i].format;
                        var actors = response[i].actors;

                        var tr_str = "<tr>" +
                            "<td align='center' id='id'>" + id + "</td>" +
                            "<td align='center'>" + movie_name + "</td>" +
                            "<td align='center'>" + release_date + "</td>" +
                            "<td align='center'>" + format + "</td>" +
                            "<td align='center'>" + actors + "</td>" +
                            "<td align='center'>" + "<button type='button' id='delete'>" + 'Delete' + "</button>" + "</td>" +
                            "<td>" +
                            "</tr>"
                        $("#userTable ").append(tr_str);

                    }
                }

            });
        });
    });
    window.onload = function () {
        $.ajax({
            url: 'Sorting.php',
            type: 'get',
            dataType: 'JSON',
            success: function (response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = response[i].id;
                    var movie_name = response[i].movie_name;
                    var release_date = response[i].release_date;
                    var format = response[i].format;
                    var actors = response[i].actors;

                    var tr_str = "<tr>" +
                        "<td align='center' id='id'>" + id + "</td>" +
                        "<td align='center'>" + movie_name + "</td>" +
                        "<td align='center'>" + release_date + "</td>" +
                        "<td align='center'>" + format + "</td>" +
                        "<td align='center'>" + actors + "</td>" +
                        "<td align='center'>" + "<button type='button' id='delete'>" + 'Delete' + "</button>" + "</td>" +

                        "</tr>";


                    $("#userTable").append(tr_str);

                }
            }

        });
    };
</script>
</body>

</html>
