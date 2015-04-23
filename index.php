<?php include 'fplheader.php';?>

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
<?php
$con = mysqli_connect("localhost:3306","root","test","playersdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
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
<div id="bottomcontent">
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Nunc tincidunt</a></li>
    <li><a href="#tabs-2">Proin dolor</a></li>
    <li><a href="#tabs-3">Aenean lacinia</a></li>
  </ul>
  <div id="tabs-1">
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>
</div>
</div>
<div class="bottom-shadow"></div>
</div>
</div>
<div id="chart_div"></div>
</div>

<div id="footer"></div>
</body>
</html>
