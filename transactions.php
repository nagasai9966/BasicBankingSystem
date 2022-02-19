<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fortunate Bank</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        include("header.php");
    ?> 
    <main class="screen main">
        <br><br>
        <h3> Transaction History </h3>
        <br>  
        <div class="table-responsive">
        <table class="table ">
            <tr>
                <!-- <th>sno.</th> -->
                <th>sno</th>
                <th>sender</th>
                <th>beneficiary</th>
                <th>amount</th>
                <th>time&date</th>
            </tr>
<?php 

$query = "SELECT * FROM transactions";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
// echo "$total";
if($total != 0)
while($result = mysqli_fetch_assoc($data))
{
    //echo $result['username']." ".$result['beneficiary']." ".$result['date']." ".$result['amount'];
    echo "<tr>
    <td>".$result['trans_id']."</td> 
    <td>".$result['sender']."</td> 
    <td>".$result['receiver']."</td>
    <td>".$result['amount']."</td> 
    <td>".$result['time']."</td> </tr>";
    //echo "success";
}
?>
   </table>
        </div>
    </main>
    <?php
        include("footer.php");
    ?>
</body>
</html>