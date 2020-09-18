<?php

function GetCharNameByCID($cid)
{
	global $connect;
	$qres = odbc_exec($connect, "SELECT Name FROM Character(nolock) WHERE CID = '$cid'");
    $a = odbc_fetch_array($qres);
    return $a['Name'];
}

function GetClanPercent($Wins, $Losses)
{
    $total = $Wins + $Losses;

    return ($total == 0) ? "0%" : round((100 * $Wins) / $total, 2) . "%";
}

function Porcentagem($vitorias, $derrotas)
{
    $total = $vitorias + $derrotas;

    return ($total == 0) ? "100%" : round((100 * $vitorias) / $total, 2) . "%";
}

function GetKDRatio($kills, $deaths)
{
    $total = $kills + $deaths;

    $percent = @round((100 * $kills) / $total, 2);

    if($kills == 0 && $deaths == 0)
    {
        return "0/0 (100%)";
    }else{
        return sprintf("%d/%d (%d%%)", $kills, $deaths, $percent);
    }

}

function FormatCharName($cid)
{
	
	global $connect;
	$qres = odbc_exec($connect, "SELECT ac.UGradeID, ch.Name From Character(nolock) ch INNER JOIN Account ac ON ac.AID = ch.AID WHERE ch.CID = '$cid'");
    $res = odbc_fetch_array($qres);

    $name = $res['Name'];

    switch($res['UGradeID'])
    {
        case 255:
            return "<font color='#FF0000'>$name</font>";
        break;
        case 254:
            return "<font color='#00FF00'>$name</font>";
        break;
        case 253:
            return "<font color='#333333'>$name</font>";
        break;
        default:
            return $name;
        break;
    }
}

function CheckIfExistClan($aid){
	global $connect;
    $a = odbc_exec($connect,"SELECT * FROM Character(nolock) WHERE AID = '$aid'");
    if( odbc_num_rows($a) > 0 )
    {
        while($char = odbc_fetch_array($a))
        {
            if(odbc_num_rows(odbc_exec($connect,"SELECT * FROM Clan(nolock) WHERE MasterCID = '" . $char['CID'] . "'")) == 1)
            {
                return true;
                break;
            }
        }
    }
    return false;
}

function GetClanMasterByCLID($clid)
{

	global $connect;

    $res2 = odbc_exec($connect, "SELECT ch.Name FROM Character(nolock) ch INNER JOIN Clan(nolock) cl ON ch.CID = cl.MasterCID WHERE cl.CLID = '$clid'");

    $char = odbc_fetch_array($res2);
    return $char['ch.Name'];
}

?>
