
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<?php
SESSION_START();
$accountno=$_SESSION['accountno'];
if(!isset($_SESSION['accountno']))
{
    header('location:login.php');
}
else
{
echo'
<h3>SELECT LANGAUGE</h3>
<a href="secondfile.php">ENGLISH</a><br>
<a href="secondfile.php">TELUGU</a>  
';
}
?>
<?php
//CONNECTION
include('connect.php');
//READ
$read = "SELECT * from atm where accountno='$accountno'";
$query = mysqli_query($conn,$read);

while($row=mysqli_fetch_array($query))
{
  $name=$row['fname'];

  echo"".$name."";
}

?>
