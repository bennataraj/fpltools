<?php include 'fplheader.php';
include 'connect.php';?>

<div id="maincontent">

<div id="topcontent">
	<div class="topcontain">
		<div class="topleft">
		<h3 class="white">Connect your <span class"fpl">team</span> for <span class="analysis">Stats</span> & <span class="analysis">Analysis</span>.</h3>

			<p class="intro">Sign in with your fantasy.premierleague.com username and password. We'll gather your player details with advanced Stats and Analysis.</p><h3 class="white right"> It's <span class="analysis">free</span> and <span class="analysis">easy to use.</span></h3>
		

		</div>
	
		<div class="topright">
			<section id="loginBox">
	<h2>Login</h2>
	<form action="dom.php" method="post" class="minimal">
		<label for="name">
			Email:
			<input type="text" name="name" id="name" placeholder="fantasy.premierleague.com email" />
		<label for="password">
			Password:
			<input type="password" name="password" id="password" placeholder="fantasy.premierleague.com password" />
		</label>
		<button type="submit" class="btn-minimal">Sign in</button>
	</form>
</section>
	
		</div>
	</div>
<h3 class="white">2014 Season Starts in:</h3>

<div class="playerboxes">
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
echo "<h3 class='statshead'>".$info['firstname'].' '.$info['lastname']."</h3>";
echo "<h3 class='statshead'>".$info['points']."</h3>";

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
echo "<h3 class='statshead'>".$info['firstname'].' '.$info['lastname']."</h3>";
echo "<h3 class='statshead'>".$info['weekpoints']."</h3>";

 
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

</div>

<div id="bottomcontainer">

</div>
<div class="bottom-shadow"></div>
</div>
</div>
<div id="chart_div"></div>
</div>

<div id="footer"></div>
</body>
</html>
