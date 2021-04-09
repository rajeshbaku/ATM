<?php
SESSION_START();
$accountno=$_SESSION['accountno'];
if(!isset($_SESSION['accountno']))
{
    header('location:login.php');
}
?>
<?php
//CONNCECTION
include('connect.php');
//READ
$read="SELECT * from  atm WHERE accountno='$accountno' ";
$query=mysqli_query($conn,$read);

while($row=mysqli_fetch_array($query))
{
    $amount=$row['amount'];

    echo"".$amount."";
}

?>