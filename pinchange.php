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
    $oldpin=$_POST['oldpin'];
    $newpin=$_POST['newpin'];

    //CONNECTION
    include('connect.php');
    //READ
    $read="SELECT * from atm where accountno='$accountno'";
    $query=mysqli_query($conn,$read);

    while($row=mysqli_fetch_array($query))
    {
        $pin=$row['pin'];
    }
    if ($oldpin == $pin)
    {
        $update="UPDATE atm set pin='$newpin' WHERE accountno='$accountno'";
        $query=mysqli_query($conn,$update);

        echo"your pin successfully changed ";
    }
}
?>
<html>
<div class="container">
​<form action="" method="POST">
<div class="form-group">
        <label for="fname">oldpin:</label><br>
        <input type="text"  class="form-control" type="text"  name="oldpin" ><br>
        <label for="fname">newpin:</label><br>
        <input type="text"  class="form-control" type="text"  name="newpin" ><br>


        <button type="enter" name="enter">enter</button>
        </html>