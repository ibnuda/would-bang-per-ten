<?php

$subj="/C=US/ST=California/L=Remote/O=Country Govt./OU=My Dept/CN=Mr. Agent/emailAddress=agent@investiations.com";
openssl req -x509 -newkey rsa:1024 -keyout mycert.key -out mycert.pem -nodes -subj $subj
