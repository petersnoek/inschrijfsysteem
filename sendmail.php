<?php

require 'inc/mail.php';

$result = SendActivationEmail('petersnoek@davinci.nl', 'Peter Snoek');

echo "The result of SendActivationEmail('petersnoek@davinci.nl', 'Peter Snoek') is: " . $result;