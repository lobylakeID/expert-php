<?php

echo "Your uri: <u>". $_SERVER['REQUEST_URI'];
echo "</u> Not found<br />";
echo '<a href="'.THIS_DOMAIN.'">back to '.THIS_DOMAIN.' now</a> or call <a href="mailto:call-center@'.$_SERVER['HTTP_HOST'].'">web call-center</a>';