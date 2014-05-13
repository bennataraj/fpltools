<?php
$name = $_POST['name'];
$password = $_POST['password'];
$namecode = urlencode($name);
$url="https://users.premierleague.com/PremierUser/redirectLogin"; 
$postdata = "email=$namecode&password=$password&success=http%3A%2F%2Ffantasy.premierleague.com%2Faccounts%2Flogin%2F&fail=http%3A%2F%2Ffantasy.premierleague.com%2F%3Ffail";
$cookie="cookie.txt"; 
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie); 
curl_setopt ($ch, CURLOPT_REFERER, $url); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
curl_setopt ($ch, CURLOPT_POST, 1); 
$result = curl_exec($ch);
unset($ch);

//check for true/false

if($result)
{
?> 
<div id="content">

<div>
<div style="width: 950px; margin: auto;">
<div style="width: 600px; float: left;">
<table class="playertable"id="table_id">
<thead></thead>
<tbody>
<tr bgcolor="#dbe9f2">
    <th>Team</th>
    <th>Photo</th>
    <th>Name</th>
    <th>Price</th>
   <th>Points</th>
    <th>Next Match</th>    
  </tr>
<tr>
<?php        //Logged in
$doc = new DOMDocument();
@$doc->loadHTML($result);
$selector = new DOMXPath($doc);
foreach($selector->query('//@class[starts-with(., "ismPitchElement")]') as $classattr) {
    // remove the prefix using `ltrim()`
    $json = json_decode(ltrim($classattr->nodeValue, "ismPitchElement"));
    $thisid = ($json->id);
$endhash ='/';
$url = 'http://fantasy.premierleague.com/web/api/elements/';
$urlid = $url . $thisid . $endhash; 
$results = file_get_contents($urlid); 
$playerstats = json_decode($results, true);
$price = $playerstats['now_cost'];
$playerprice = number_format($price/10, 1, '.', '');
$points = $playerstats['total_points'];
$webname = $playerstats['web_name'];
echo "<td><img src=".$playerstats['shirt_mobile_image_url'].">"." ".$playerstats['team_name']."</td>";
echo "<td><img src=".$playerstats['photo_mobile_url']." width='45' height='45'>"."</td>";
echo "<td>".$playerstats['first_name']." ".$playerstats['web_name']."</td>";
echo "<td>".$playerprice."</td>";
echo "<td>".$playerstats['total_points']."</td>";
echo "<td>".$playerstats['next_fixture']."</td>";
?>
</tr>


<?php
	}

}
?>
