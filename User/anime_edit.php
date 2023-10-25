<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Description Details</title>
    <style>
        .book-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>เรื่องย่อ</h1>
            <div>
            <a href="list_anime.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("connect.php");
            $p_id = $_GET['a_id'];
            if ($p_id) {
                $sql = "SELECT * FROM tbl_anime WHERE a_id = $p_id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 
                 <h3>Title:</h3>
                 <p><?php echo $row["a_name"]; ?></p>
                 <h3>Description:</h3>
                 <p><?php echo $row["a_detail"]; ?></p>
                 <h3>Season:</h3>
                 <p><?php echo $row["a_seasonal"]; ?></p>
                 <h3>Episode:</h3>
                 <p><?php echo $row["a_episode"]; ?></p>
                
                 <?php
                }
            }
            else{
                echo "<h3>No Discription found</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>