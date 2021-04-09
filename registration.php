
<?php
if(isset($_POST['submit']))
{
    $rand = rand(1000,9999);
    $pin = "$rand";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $accountno = rand(1000000,9999999);
    $gender = $_POST['gender'];
    $mobileno = $_POST['mobileno'];
    $amount = $_POST['amount'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    //CONNECTION
    include('connect.php');
    //INSERT
    $insert="INSERT INTO atm (pin,fname,lname,accountno,gender,mobileno,amount,city,address)values('$pin','$fname','$lname','$accountno','$gender','$mobileno','$amount','$city','$address')";
    $query=mysqli_query($conn,$insert);

    echo"your account register successfully ";
    $read="SELECT * from atm WHERE accountno='$accountno'";
    $query=mysqli_query($conn,$read);

    while($row=mysqli_fetch_array($query))
    {
      $accno=$row['accountno'];
      $pin=$row['pin'];

      echo"youraccountno:".$accno.""; 
      echo"your pin: ".$pin."";
    }

}


?>
<html>
<head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax. googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<h2>REGISTRATION FORM</h2>

<div class="container">
​<form action="" method="POST">
<div class="form-group">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" class="form-control" type="text" pattern="[a-zA-Z][a-zA-Z ]{0,}"  name="fname" ><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"  class="form-control" pattern="[a-zA-Z][a-zA-Z ]{0,}" ><br>
          
        <div class="form-check">
        <input type="radio" class="form-check-input" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" class="form-check-input" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" class="form-check-input" id="other" name="gender" value="other">
        <label for="other">Other</label><br>
        </div>
        <label for="fname">mobileno:</label><br>
        <input type="tel"name="mobileno"id="phone_number" class="form-control" pattern="^\d{10}$" required="required"/>
          <br>
          <label for="fname">fixed amout:</label><br>
        <input type="tel"name="amount" class="form-control" pattern="^\d{10}$" required="required" value="500" readonly/>
          <br>
        <label for="lname">city:</label><br>
        <input type="text" id="city" class="form-control" name="city"><br>

        <label for="address">address:</label><br>
        <textarea rows="4" cols="50" class="form-control" name="address"></textarea><br><br>
        <button type="submit" name="submit">submit</button>
     
 
             
</div>
</form>
</body>
</html>
​