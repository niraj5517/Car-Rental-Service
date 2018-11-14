
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Agents | Toxotes Rental Service</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="icon" href="img/carlogo3.png">
    <style>
    
.tab2 {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

.tabs {
  float: left;
}

.tabs a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.tabs a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

   
    
    
    </style>
</head>
<body>
<ul class="tab2">
  <li class="tabs"><a href="ourclients.php">ALL CLIENTS</a></li>
  <li class="tabs"><a  class="active" href="clientsearchby.php">Search by  </a></li>
 
   <li class="tabs" style="float:right; background-color: orange;">
        <a href="MAIN.php" class="nav-link">Home &nbsp;&nbsp;</a>
        </li>
</ul>

    <div class="container"><br>
    <center><h1 style="font-size:40px;">Our Valuable Clients</h1></center>
    <br>
    <form method="GET"><div style="display:flex;" class="text-justify;">
    
<input type="search" class="form-control" name="searchbar" style="width:50%;" placeholder="Search Clients " required> 
<button type="submit" name="submitbtn" style="width:10%;margin-left:10%;" class="btn btn-info">Search</button></div>


<br>

<div  style="display:flex;color:black;">
          <h6 style=";margin-right:25px;font-weight:600!important;width:25%;">Search by:</h6>
            <input type="radio" name="seater" value="BookingId"  required> <p style="width:25%;margin-top:-5px;padding-left:5px;">Booking ID</p>
            <input type="radio" name="seater" value="Name" > <p style="width:25%;margin-top:-5px;padding-left:5px;">Name</p>
            <input type="radio" name="seater" value="AadhaarNo" ><p style="width:25%;margin-top:-5px;padding-left:5px;"> Aadhar Number</p>
        </div>
</form>
<!-- <br><h6 STYLE="COLOR:RED;">ENTER FULL NAME OR BOOKING ID OR AADHAR NO.</h6><BR> -->







<?php
session_start();

$conn= mysqli_connect('localhost','root','','carrental');

if(isset($_GET['submitbtn'])){

    $radio=$_GET['seater'];
 $searchtext=$_GET['searchbar'];
if($radio=='BookingId')
{
    $q="select * from usertable where BookingId='$searchtext' ";
    echo "<hr><h5 style=\"color:green;\">Showing results for BookingId: $searchtext   </h5><hr>";
}

elseif($radio=='Name')
{
    $q="select * from usertable where Name like '%$searchtext%' ";
    echo "<hr><h5 style=\"color:green;\">Showing results for  Client Name : $searchtext   </h5><hr>";
}
if($radio=='AadhaarNo')
{
    $q="select * from usertable where AadhaarNo='$searchtext' ";
    echo "<hr><h5 style=\"color:green;\">Showing results for Client Aadhaar number: $searchtext   </h5><hr>";
    
}

   


$jk= mysqli_query($conn,$q);
$num = mysqli_num_rows($jk);
// echo $num;

while($row=mysqli_fetch_array($jk)){


$userbookingid=$row['BookingId'];
$username=$row['Name'];
$useradd=$row['Address'];
$usermob=$row['Mobile'];
$useremail=$row['Email'];
$useraadhaar=$row['AadhaarNo'];
echo "



        
        <div class=\"card-body\" style=\"width:100%;background:#343a40;color:white;\">
            
                
          <h5 class=\"card-header\" id=\'name\'>Booking Id:&nbsp;$userbookingid</h5><br>
          <h5 class=\"card-title\" id=\'name2\' style=\"float:right!important;\">Aadhar No.:&nbsp;$useraadhaar</h5><br>
           
           
                
                    <h5 class=\"card-title\" id=\'name\'>Name : $username</h5><br>
                    <h5 class=\"card-title\" id=\'name3\' style=\"float:right!important;\">Email :$useremail</h5><br>
                      
                     
                
                            <h5 class=\"card-title\" id=\'name\'>Address :$useradd</h5><br>
                            <h5 class=\"card-title\" id=\'name4\' style=\"float:right!important;\">Phone :$usermob</h5><br>
                            
          
        </div>
      <div style=\"height:10px;background:white;\"></div>

         

";


}
}
?>


    </div>
</body>
</html>