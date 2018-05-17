<?php
session_start();

session_destroy();

header('location: index.php'); // reroute to index.php

?>