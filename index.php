<?PHP
include "config.php";
?>
<html>
<head>
<link rel="icon" type="image/x-icon" href="ClashFavicon.ico">
<link rel="stylesheet" href="style.css" />
<title><?=$myservername;?> - Server Beta</title>
</head>
<body>
<div align="center"><img src="images/image.jpg" alt="" width="420" height="179" border="0"><br /></div><br />
<?PHP include "header.php"; ?><br />
<table class='themain' align="center" cellpadding='2' cellspacing='0' width='10%'><tbody><tr><td>
<table width='1054' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='43' align='center' valign='top' class='topp2'><strong>#</strong></td>
      <td width='119' align='center' valign='top' class='topp2'><strong>Player ID</strong></td>
      <td width='70' align='center' valign='top' class='topp2'><strong>Name</strong></td>
      <td width='107' align='center' valign='top' class='topp2'><strong>Town Hall</strong></td>
      <td width='67' align='center' valign='top' class='topp2'><strong>Level</strong></td>
	  <td width='133' align='center' valign='top' class='topp2'><strong>Latest Update</strong></td>
	  <td width='55' align='center' valign='top' class='topp2'><strong>Status</strong></td>
      <td width='131' align='center' valign='top' class='topp2'><strong>Account Privileges</strong></td>
      <td width='70' align='center' valign='top' class='topp2'><strong>Trophies</strong></td>
      <td width='86' align='center' valign='top' class='topp2'><strong>Gems</strong></td>
      <td width='95' align='center' valign='top' class='topp2'><strong>Experience</strong></td>
   </tr>
<?PHP
$sql1=mysql_query("SELECT * FROM player");//cambiar nombre de la tabla de busqueda
    while($row = mysql_fetch_array($sql1)){ 
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);

		$players1[] = array(
			"avatarObj" => $avatarObj,
		);
	}
foreach($players1 as $player){
	$th = $player['avatarObj']['townhall_level'] + 1;
}
$sql=mysql_query("SELECT * FROM `player` ORDER BY ".$player['avatarObj']['townhall_level']." ASC");
//cambiar nombre de la tabla de busqueda
        $i = 0;
        while($row = mysql_fetch_array($sql)){ 
		$playerID = $row['PlayerId'];
		$AccountStatus = $row['AccountStatus'];
		$AccountPrivileges = $row['AccountPrivileges'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		
		$players[] = array(
			"PlayerId" => $row['PlayerId'],
			"AccountStatus" => $row['AccountStatus'],
			"AccountPrivileges" => $row['AccountPrivileges'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"avatar" => $avatar,
			"avatarObj" => $avatarObj,
		);
	}
foreach($players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$exp = $player['avatarObj']['experience'];
	$i = $i+1;
//townhall
if($th == 1){ $th ='<img src="images/townhall/'.$th.'.png" alt="1" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 2){ $th ='<img src="images/townhall/'.$th.'.png" alt="2" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 3){ $th ='<img src="images/townhall/'.$th.'.png" alt="3" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 4){ $th ='<img src="images/townhall/'.$th.'.png" alt="4" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 5){ $th ='<img src="images/townhall/'.$th.'.png" alt="5" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 6){ $th ='<img src="images/townhall/'.$th.'.png" alt="6" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 7){ $th ='<img src="images/townhall/'.$th.'.png" alt="7" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 8){ $th ='<img src="images/townhall/'.$th.'.png" alt="8" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 9){ $th ='<img src="images/townhall/'.$th.'.png" alt="9" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 10){ $th ='<img src="images/townhall/'.$th.'.png" alt="10" width="60" height="60"><FONT SIZE=1>'.$th.'</font>';
}
//score
$lt=array(0,400,500,600,800,1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3500,3800,4100,4400,4700,5000,9999);
$lt2=array(399,499,599,799,999,1199,1399,1599,1799,1999,2199,2399,2599,2799,2999,3199,3499,3799,4099,4399,4699,4999,99999);

$legend = count($lt);
for ($x = 0; $x < $legend; $x++)
{
    if (($player ['avatarObj']['score'] >= $lt[$x]) && ($player ['avatarObj']['score'] < $lt2[$x]))
    {
        $y = $x;
        $sx = '<img src="images/'.$y.'.png" alt="10" width="22" height="19"><br>';
    }
}
//AccountPrivileges
if($player["AccountPrivileges"] == 0){ $player["AccountPrivileges"] ='Normal';
}
if($player["AccountPrivileges"] == 1){ $player["AccountPrivileges"] ='<font color="red"><b>Moderator</b></font>';
}
if($player["AccountPrivileges"] == 2){ $player["AccountPrivileges"] ='<font color="red"><b>High Moderator</b></font>';
}
if($player["AccountPrivileges"] == 3){ $player["AccountPrivileges"] ='<font color="red"><b>Undefined</b></font>';
}
if($player["AccountPrivileges"] == 4){ $player["AccountPrivileges"] ='<font color="red"><b>Administrator</b></font>';
}
if($player["AccountPrivileges"] == 5){ $player["AccountPrivileges"] ='<font color="red"><b>Owner</b></font>';
}
//AccountStatus
if($player["AccountStatus"] == 0){ $player["AccountStatus"] ='Normal';
}
if($player["AccountStatus"] <> 0){ $player["AccountStatus"] ='<font color="red">Banned</font>';
}
echo "<tr class='trhover'>
      <td align='center' valign='center'>".$i."</td>
      <td align='center' valign='center'>".$player["PlayerId"]."</td>
      <td align='center' valign='center'><a href='profile.php?player&".$NameOfServer1."=".$playername."'>".$playername."</a></td>
      <td align='center' valign='center'>".$th."</td>
	  <td align='center' valign='center'>".$ava_level."</td>
	  <td align='center' valign='center'>".$player["LastUpdateTime"]."</td>
	  <td align='center' valign='center'>".$player["AccountStatus"]."</td>
	  <td align='center' valign='center'>".$player["AccountPrivileges"]."</td>
	  <td align='center' valign='center'>".$sx."".$sc."</td>
	  <td align='center' valign='center'>".$gems."</td>
	  <td align='center' valign='center'>".$exp."</td>
    </tr>";
	}
?>
</table></table>
<br />
<?PHP include "footer.php"; ?>
</body>
</html>
