<?php include 'connect.php';?>

// Set execution time
ini_set('max_execution_time', 900); 
$id = 1;
// Iterate through each player and return player info
for ($id=1; $id<=700; $id++)
  {

    $endhash ='/';
    $url = 'http://fantasy.premierleague.com/web/api/elements/';
    $urlid = $url . $id . $endhash; 
    $results = file_get_contents($urlid); 
    $playerstats = json_decode($results, true);
    $price = $playerstats['now_cost'];
    $playerprice = number_format($price/10, 1, '.', '');
    $teamname = $playerstats['team_name'];
    $firstname = mysql_real_escape_string($playerstats['first_name']);
    $lastname = mysql_real_escape_string($playerstats['web_name']);
    $points = $playerstats['total_points'];
    $nextmatch = $playerstats['next_fixture'];
    $position = $playerstats['type_name'];
    $selectedbynumber = $playerstats['selected_by'];
    $selectedby = number_format($selectedbynumber, 1, '.', '');
    $dreamteam = $playerstats['in_dreamteam'];
    $playerid = $playerstats['id'];
    $weekpoints = $playerstats['event_total'];
    $playershirt = $playerstats['shirt_mobile_image_url'];
    $playerphoto = $playerstats['photo_mobile_url'];


// Enter details into database
mysqli_query($con,"INSERT INTO stats (`playerid`, `firstname`, `lastname`, `teamname`, `points`, `weekpoints`, `price`, `nextmatch`, `position`, `selectedby`, `dreamteam`, `playershirt`, `playerphoto`) VALUES ('$playerid', '$firstname','$lastname', '$teamname', '$points', '$weekpoints', '$price', '$nextmatch', '$position', '$selectedby', '$dreamteam', '$playershirt', '$playerphoto') ON DUPLICATE KEY UPDATE `playerid` = '$playerid', `firstname` = '$firstname', `lastname` = '$lastname', `teamname` = '$teamname', `points` = '$points', `weekpoints` = '$weekpoints', `price` = '$price', `nextmatch` = '$nextmatch', `position` = '$position', `selectedby` = '$selectedby', `dreamteam` = '$dreamteam', `playershirt` = '$playershirt', `playerphoto` = '$playerphoto'") OR die(mysqli_error($con));
echo $points;
}
mysqli_close($con);
?>
