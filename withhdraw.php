<?php
SESSION_START();
$accountno=$_SESSION['accountno'];
if(!isset($_SESSION['accountno']))
{
    header('location:login.php');
}
?>


<?php
if(isset($_POST['enter']))
{
    $withdraw=$_POST['withdraw'];
    

        //CONNCETION
        include('connect.php');
        //READ
        $read="SELECT * FROM atm WHERE accountno='$accountno'";
        $query=mysqli_query($conn,$read);

        while($row=mysqli_fetch_array($query))
        {
            $amount=$row['amount'];

            
        }
        if($amount > $withdraw)

        {
            $total=$amount-$withdraw;
        $update="UPDATE atm set amount='$total' WHERE accountno = '$accountno'";

        echo"your amount succesfully withdraw";

        $dateT= date('d/m/Y h-i-s');
        $type = "Debit";
        $am = $withdraw;
        $insert = "INSERT INTO ministatement (accountnumber,dateT,amount,type)values('$accountno','$dateT','$am','$type')";
        $query=mysqli_query($conn,$insert);

        $query=mysqli_query($conn,$update);

        }
        else
        {

            echo"sorry imsufficient balance";
        }
}

?>
<html>
<div class="container">
​<form action="" method="POST">
<div class="form-group">
        <label for="fname">withdraw:</label><br>
        <input type="text"  class="form-control" type="text"  name="withdraw" ><br>
        <button type="enter" name="enter">enter</button>
        </html>