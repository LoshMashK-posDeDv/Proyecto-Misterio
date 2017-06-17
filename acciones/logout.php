<?php 
	session_start( );
	session_destroy( );
	header("Location: login_Form.php?s=out" );