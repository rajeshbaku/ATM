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
 
    $deposit=$_POST['deposit'];

    //CONNECTION
    include('connect.php');
    //READ
    $read="SELECT * FROM atm WHERE accountno='$accountno'";
    $query=mysqli_query($conn,$read);





    while($row=mysqli_fetch_array($query))
    {
        $amount=$row['amount'];
    }
    
        $total=$amount + $deposit;
        $update="UPDATE atm set amount='$total' WHERE accountno='$accountno'";
        $query=mysqli_query($conn,$update); 

        echo"your amount succesfully deposited";
        $dateT = date('d/m/Y h-i-s');
        $type = "credit";
        $am = "$deposit";
        $insert="INSERT INTO ministatement (accountnumber,dateT,amount,type)values('$accountno','$dateT','$am','$type')";
        $query=mysqli_query($conn,$insert);
    
}
?>
<html>
<div class="container">
​<form action="" method="POST">
<div class="form-group">


        <label for="fname">deposit:</label><br>
        <input type="text"  class="form-control" type="text"  name="deposit" ><br>
        
        

        <button type="enter" name="enter">enter</button>
        </html>