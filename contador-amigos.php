<?php
$sql1 = "SELECT amigo, usuario FROM amigos WHERE usuario='$user'";
$query1 = mysql_query($sql1);
$numeroamigos = mysql_num_rows($query1);
?>