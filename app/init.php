<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..//");
$dotenv->load();

require_once __DIR__ . '/../app/lib/Schema.php';
require_once __DIR__ . '/../app/lib/Data.php';
require_once __DIR__ . '/../app/lib/DataSet.php';

require_once __DIR__ . '/../app/helpers/database.php';
require_once __DIR__ . '/../app/helpers/session.php';
require_once __DIR__ . '/../app/helpers/spreadsheet.php';
require_once __DIR__ . '/../app/helpers/lainnya.php';

