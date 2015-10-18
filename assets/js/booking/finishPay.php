<?php
include'../Ajax/DBcon.php';

if($_SESSION['ConfirmationCode']!=0)
{
mysql_query("UPDATE reservations SET Confirm=1 WHERE ID=".$_SESSION['ConfirmationCode']."");

echo "xaxaxa ".$_SESSION['ConfirmationCode'];

}


unset($_SESSION['ConfirmationCode']);
?>