<?php
	include( '../setup/config.php' );
	header("Location: ../index.php?s=login");
	session_destroy();
?>