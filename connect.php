<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$host = $cleardb_url["host"];
	$db_user = $cleardb_url["user"];
	$db_password = $cleardb_url["pass"];
	$db_name = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
?>