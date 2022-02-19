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
    <main class="screen center-main">
        
    <h3>Money Transfer</h3>
        <form  action="" method="post" >
            <label for="username">select the sender </label> 
            <?php
            $sql = "Select * from customers";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
             if(mysqli_num_rows($result)>0){
            ?>
            <select name="sender" id="sender-name" required >
                <option name="0" value="0" select disabled>Select sender</option>
                <?php
                 while($rows = mysqli_fetch_assoc($result)){
                ?>
                <option  value="<?php echo $rows['cust_id']; ?>"><?php echo $rows['customer_name']; ?></option>
                <?php } }
                    else {
                        echo "No data found";
                    }                
                ?>
            </select> <br>
            <label for="username">select the beneficiary </label> 
            <?php
            $sql = "Select * from customers";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
             if(mysqli_num_rows($result)>0){
            ?>
            <select name="receiver" id="receiver-name" required >
                <option name="0" value="0" select disabled>Select Beneficiary</option>
                <?php
                 while($rows = mysqli_fetch_assoc($result)){
                ?>
                <option  value="<?php echo $rows['cust_id']; ?>"><?php echo $rows['customer_name']; ?></option>
                <?php } }
                    else {
                        echo "No data found";
                    }                
                ?>
            </select>
             <br>
            <label for="amount">Enter the amount to Transfer</label>
            <input  type="number" name="amount" value="<?php echo $amount; ?> " placeholder="Enter the amount"required>
            <input class="btn hover:bg-teal-200 hover:text-teal-600" type="submit" value="submit">
        </form>
        <div id="tf" style="font-size: 22px;"></div>
</div>

    </main>
    <?php
        include("footer.php");
    ?>
</body>
</html>



<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$amount = $_POST["amount"];
$sender = $_POST["sender"];
$receiver = $_POST["receiver"];
   // echo"$amount <br> $sender <br> $receiver <br> ";
    if($sender === $receiver) { ?>
    <script>
    a = document.getElementById("tf");
    a.innerHtml ="TRANSACTION FAIL";
    a.style.color="red";
    </script>
    <?php
    }
    else {
        $query1 = "SELECT balance FROM customers where cust_id=$sender";
        $query2 = "SELECT balance FROM customers where cust_id=$receiver";
        $data = mysqli_query($conn,$query1);
        $result = mysqli_fetch_assoc($data);
        $senderbalance = (float)$result["balance"];
    //    echo "$senderbalance";
        $data = mysqli_query($conn,$query2);
        $result = mysqli_fetch_assoc($data);
        $receiverbalance =(float)$result["balance"];
      //  echo "<br>$receiverbalance";
        $updatesendervalue = $senderbalance - (float)$amount;
        $updatereceivervalue = $receiverbalance + (float)$amount;
    if($updatesendervalue < 0) {
        ?>
    <script>
    a = document.getElementById("tf");
    a.innerHtml ="TRANSACTION FAIL";
    a.style.color="red";
    </script>
    <?php
        
        //echo "<br><h2 style='color:red;'>unable to transfer money due to low balance in sender's account</h2>";
    }
    else {
        $query1 = "UPDATE `customers` SET `balance`=$updatesendervalue WHERE cust_id=$sender";
        $query2 = "UPDATE `customers` SET `balance`=$updatereceivervalue WHERE cust_id=$receiver";
        $query = "SELECT * FROM transactions";
  
        $data = mysqli_query($conn,$query1);
        $data = mysqli_query($conn,$query2);
        $data = mysqli_query($conn,$query);
        $total = mysqli_num_rows($data)+1;
       // echo"<br> $total";
        $query1 = "SELECT customer_name FROM customers where cust_id=$sender";
        $query2 = "SELECT customer_name FROM customers where cust_id=$receiver";
        $data = mysqli_query($conn,$query1);
        $result = mysqli_fetch_assoc($data);
        $user1 = $result["customer_name"];
        // $user1 = $sender;
    //    echo"<br> $user1";
        $data = mysqli_query($conn,$query2);
        $result = mysqli_fetch_assoc($data);
        $user2 = $result["customer_name"];
        // $user2 = $receiver;
    //    echo"<br> $user2 <br> $amount";
         $query3 = "INSERT INTO `transactions`(`trans_id`, `sender`, `receiver`, `amount`, `time`) VALUES ('$total','$user1','$user2','$amount',CURRENT_TIMESTAMP())";
         //INSERT INTO `transactions` (`sno.`, `username`, `beneficiary`, `date`, `amount`) VALUES ('2', 'Mohd Wajid', 'Abhinavan', current_timestamp(), '10000');
         $data = mysqli_query($conn,$query3);
        //  echo "$data";
         if($data) {
            ?>
            <script>
            a = document.getElementById("tf");
            a.innerHtml ="TRANSACTION SUCCESS";
            a.style.color="green";
            // document.getElementById("tf").style.color="green";
            </script>
            <?php
         }
        
        
        }
    }
    }
?>