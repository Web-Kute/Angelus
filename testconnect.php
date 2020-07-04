<?php
$link = mysqli_connect('angelusplongee.mysql.db', 'angelusplongee', '56zacharie');
if (!$link) {
die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($link);
?>