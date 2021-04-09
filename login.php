<?php
if(isset($_POST['enter']))
{   
    $accountno=$_POST['accountno'];
    $pin=$_POST['pin'];

    //CONNECTION
    include('connect.php');
    
    //CHECK
    $check="SELECT * FROM atm WHERE pin='$pin'";
    $query=mysqli_query($conn,$check);
    $row=mysqli_num_rows($query);
    if($row=='0')
    {
        echo"its wrong pin please enter correct pin";
    }
    else
    {
        while($roww=mysqli_fetch_array($query))
        {
            $ac=$roww['accountno'];
            $pi=$roww['pin'];

            
        }
        if($ac == $accountno)
        {
            SESSION_START();
            $_SESSION['accountno']=$ac;
            header('location:selectlanguage.php');

        }
    }

}



?>
<html>
<body>
<div class="container">
​<form action="" method="POST">
<div class="form-group">

<label for="num">ENTER AC-NO:</label><br>
        <input type="text" id="pin" class="form-control" name="accountno" maximum='7'><br><br>

<label for="num">ENTER PIN:</label><br>
        <input type="text" id="pin" class="form-control" name="pin" maximum='4'><br><br>
        <button type="submit" name="enter">enter</button>
</div>
</div>
</body>
</html>