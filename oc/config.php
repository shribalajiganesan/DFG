<?php
// HTTP
define('HTTP_SERVER', 'http://dfg.e4buzz.com/oc/');

// HTTPS
define('HTTPS_SERVER', 'http://dfg.e4buzz.com/oc/');

// DIR
define('DIR_APPLICATION', '/home/efoubuzz/public_html/Staging/dfg/oc/catalog/');
define('DIR_SYSTEM', '/home/efoubuzz/public_html/Staging/dfg/oc/system/');
define('DIR_IMAGE', '/home/efoubuzz/public_html/Staging/dfg/oc/image/');
define('DIR_STORAGE', '/home/efoubuzz/public_html/Staging/dfg/oc/system/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'efoubuzz_dfg_oc');
define('DB_PASSWORD', 'Shri@123');
define('DB_DATABASE', 'efoubuzz_dfg_oc');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');