<?php
//take email and password from user, I didn't account for sql injection because we're sending it to 3rd party
$name = $_POST['name'];
$password = $_POST['password'];
//encode email 
$namecode = urlencode($name);
$url="https://users.premierleague.com/PremierUser/redirectLogin"; 
//set post data for premierleague.com website
$postdata = "email=$namecode&password=$password&success=http%3A%2F%2Ffantasy.premierleague.com%2Faccounts%2Flogin%2F&fail=http%3A%2F%2Ffantasy.premierleague.com%2F%3Ffail";
//create cookies file
$cookie="cookie.txt"; 
//set CURL variables
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
//return result
$result = curl_exec($ch);
unset($ch);

//check for true/false

if($result)
{        //Logged in
//create a new dom document
	$doc = new DOMDocument();
	@$doc->loadHTML($result);
	$selector = new DOMXPath($doc);
	//get contents within the ismPitchElement and return playerid
		foreach($selector->query('//@class[starts-with(., "ismPitchElement")]') as $classattr) 
		{
    			// remove the prefix using `ltrim()`
    			$json = json_decode(ltrim($classattr->nodeValue, "ismPitchElement"));
    			$thisid = ($json->id);
			$endhash ='/';
			//scroll through each player id on users team and get info
			$url = 'http://fantasy.premierleague.com/web/api/elements/';
			$urlid = $url . $thisid . $endhash; 
			$results = file_get_contents($urlid); 
			$playerstats = json_decode($results, true);
			$price = $playerstats['now_cost'];
			$playerprice = number_format($price/10, 1, '.', '');
			$points = $playerstats['total_points'];
			$webname = $playerstats['web_name'];
		}
	
}
?>
