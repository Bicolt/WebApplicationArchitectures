<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 */

/* Config constants for DB connection */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "D14122954");

/* codes of actions */
define("ACTION_GET_ALL", 1);
define("ACTION_GET_BY_ID", 2);
define("ACTION_ADD", 3);
define("ACTION_UPDATE", 4);
define("ACTION_DELETE", 5);
define("ACTION_SEARCH", 6);

/* HTTP status codes */
define ("HTTPSTATUS_OK", 200);
define ("HTTPSTATUS_CREATED", 201);
define ("HTTPSTATUS_NOCONTENT", 204);
define ("HTTPSTATUS_BADREQUEST", 400);
define ("HTTPSTATUS_NOTFOUND", 404);
define ("HTTPSTATUS_NOTALLOWED", 405);
define ("HTTPSTATUS_INTSERVERERR", 500);
?>
