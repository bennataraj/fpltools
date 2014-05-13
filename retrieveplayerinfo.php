<?php
$con = mysqli_connect("localhost:3306","root","password","databasename");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<div class="playerboxes" style="float: left; overflow: hidden; margin: 10px;">
<h3>Most Points</h3>
<?php
$data = mysqli_query($con, "SELECT * FROM stats ORDER BY points DESC LIMIT 0, 1")
 or die(mysqli_error()); 

 // puts the "stats" info into the $info array sorted by points
 while($info = mysqli_fetch_array( $data )) 
 {
$lastname = $info['lastname'];
$selectedby = $info['selectedby'];
$mill = $info['price'];
$million = number_format($mill/10, 1);
 ?>
 
<div class="playerstats">
<?php
 echo "<img src='".$info['playerphoto']."' height=90 width=90>";
 ?>
</div>
<?php
echo "<p>Points......</p><span class='statshead'>".$info['points']."</span>";
echo "<p>Name......</p><span class='statshead'>".$info['firstname'].' '.$info['lastname']."</span>";
echo "<p>Team......</p><span class='statshead'>".$info['teamname']."</span>"; 
echo "<p>Price......</p><span class='statshead'>".$million." m</span>";
echo "<p>Next Match......</p><span class='statshead'>".$info['nextmatch']."</span>";  
 } 
?>
</div>
<div class="playerboxes" style="float: left; overflow: hidden; margin: 10px;">
<h3>Gameweek Points</h3>
<?php
$data = mysqli_query($con, "SELECT * FROM stats ORDER BY weekpoints DESC LIMIT 0, 1")
 or die(mysqli_error()); 

 // puts the "stats" info into the $info array sorted by points
 while($info = mysqli_fetch_array( $data )) 
 {
$mill = $info['price'];
$million = number_format($mill/10, 1);
?>
<div class="playerstats">
<?php
 echo "<img src='".$info['playerphoto']."' height=90 width=90>";
  ?>
</div>
<?php
echo "<p>Week Points......</p><span class='statshead'>".$info['weekpoints']."</span>";
echo "<p>Name......</p><span class='statshead'>".$info['firstname'].' '.$info['lastname']."</span>";
echo "<p>Team......</p><span class='statshead'>".$info['teamname']."</span>"; 
echo "<p>Price......</p><span class='statshead'>".$million." m</span>";
echo "<p>Next Match......</p><span class='statshead'>".$info['nextmatch']."</span>"; 
 } 
?>
</div>
<div class="playerboxes" style="float: left; overflow: hidden;  margin: 10px;">
<h3>Best Value</h3>
<?php
$data = mysqli_query($con, "SELECT *, points/price FROM stats ORDER BY points/price DESC LIMIT 0, 1")
 or die(mysqli_error()); 

 // puts the "stats" info into the $info array sorted by points
 while($info = mysqli_fetch_array( $data )) 
 {
$value = $info['points/price'];
$value = number_format($value, 2);
$mill = $info['price'];
$million = number_format($mill/10, 1);
?>
<div class="playerstats">
<?php
 echo "<img src='".$info['playerphoto']."' height=90 width=90>";
  ?>
</div>
 <?php
echo "<p>Points Per Million......</p><span class='statshead'>".$value."</span>";
echo "<p>Name......</p><span class='statshead'>".$info['firstname'].' '.$info['lastname']."</span>";
echo "<p>Team......</p><span class='statshead'>".$info['teamname']."</span>"; 
echo "<p>Price......</p><span class='statshead'>".$million." m</span>";
echo "<p>Next Match......</p><span class='statshead'>".$info['nextmatch']."</span>"; 
 } 
?>
</div>
<div class="playerboxes" style="float: left; overflow: hidden;  margin: 10px;">
<h3>Most Picked</h3>
<?php
$data = mysqli_query($con, "SELECT *, selectedby FROM stats ORDER BY selectedby DESC LIMIT 0, 1")
 or die(mysqli_error()); 

 // puts the "stats" info into the $info array sorted by points
 while($info = mysqli_fetch_array( $data )) 
 {

$mill = $info['price'];
$million = number_format($mill/10, 1);
?>
<div class="playerstats">
<?php
 echo "<img src='".$info['playerphoto']."' height=90 width=90>";
  ?>
</div>
<?php
echo "<p>Selected By......</p><span class='statshead'>".$info['selectedby'].'&#37;'."</span>";
echo "<p>Name......</p><span class='statshead'>".$info['firstname'].' '.$info['lastname']."</span>";
echo "<p>Team......</p><span class='statshead'>".$info['teamname']."</span>"; 
echo "<p>Price......</p><span class='statshead'>".$million." m</span>";
echo "<p>Next Match......</p><span class='statshead'>".$info['nextmatch']."</span>"; 
$pieData = array($info['lastname'], $info['selectedby']);
} 

?>
