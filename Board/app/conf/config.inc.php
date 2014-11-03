<?php

/* database constants */
define ( "DB_HOST", "localhost" ); // set database host
define ( "DB_USER", "root" ); // set database user
define ( "DB_PASS", "" ); // set database password
define ( "DB_PORT", 3306 ); // set database port
define ( "DB_NAME", "ditcoursedb" ); // set database name

/* application constants */
define ("SEND_ERRORS_TO", 'bicolt@hotmail.fr' ); // set notification email address
define ( "DISPLAY_DEBUG", true ); // display db errors ?
define ( "APP_NAME", "MVC" ); // application name

/* message form constants */
define ( "MESSAGE_FORM_ERRORS_STR", "Errors exist in the form" );
define ( "MESSAGE_FORM_MAX_TITLE_LENGTH", 100 ); // varchar (100)
define ( "MESSAGE_FORM_MAX_CONTENT_LENGTH", 1000 ); // varchar (1000)
define ( "MESSAGE_FORM_SIMPLE", "simple form" ); // id of simple form
define ( "MESSAGE_FORM_INTERACTIVE", "interactive form" ); // id of interactive form

?>