<?php
/* create a cookie 
3600 = 1 hour

setcookie("username", "Calvin", time() + 3600);*/
setcookie("username", "", mktime(12,0,0,1, 1, 1990));


/* calling a cookie */
if(isset($_COOKIE['username'])){
	echo "Hi, " . $_COOKIE['username'];
}
else{
	echo "Cookie has been deleted";
}
?>