<?php
SESSION_START();
$accountno=$_SESSION['accountno'];
if(!isset($_SESSION['accountno']))
{
    header('location:login.php');
}
?>
<?php
//CONNECTION
$conn=mysqli_connect('localhost','root','','rakesh');
//read
$read="SELECT * FROM  ministatement WHERE accountnumber='$accountno'";
$query=mysqli_query($conn,$read);
echo"
<table border='1'>
<tr>
<th>accountno</th>
<th>dateT</th>
<th>amount</th>
<th>type</th>
</tr>

";
while($row=mysqli_fetch_array($query))
{

    $accountno=$row['accountnumber'];
    $dateT=$row['dateT'];
    $amount=$row['amount'];
    $type=$row['type'];



    echo"
    <tr>
    <td>".$accountno."</td>
    <td>".$dateT."</td>
    <td>".$amount."</td>
    <td>".$type."</td>
    </tr>
    ";
}

echo"</table>";

?> 