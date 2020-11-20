<?php

// header("Content-Type: application/json");

$_POST = json_decode(file_get_contents("php://input"), true);
if (!isset($_POST["f"]))
    die("Parameters error");

require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/SumanFramework.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/keymanager.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/replaceParams.php";

$SumanX = new SumanFramework();

extract($_POST);

switch ($f) {
    case 'fetchField':
        verifyParam(2, API_ReplaceParams::$_collectionParam, API_ReplaceParams::$_fieldParam);
        $SQLParams = $SumanX->prepareParamsbyArgs(API_ReplaceParams::$_collectionParam, $collectionParam, API_ReplaceParams::$_fieldParam, $fieldParam);
        $strsql = $SumanX->replaceParams($SumanX->getSQL(API_KeyManager::$_fetchField), $SQLParams);
        print(json_encode($SumanX->executeSQL($strsql), JSON_PRETTY_PRINT));
        break;
    case 'read':
        verifyParam(1, API_ReplaceParams::$_collectionParam);
        $SQLParams = $SumanX->prepareParamsbyArgs(API_ReplaceParams::$_collectionParam, $collectionParam);
        $strsql = $SumanX->replaceParams($SumanX->getSQL(API_KeyManager::$_read), $SQLParams);
        print(json_encode($SumanX->executeSQL($strsql), JSON_PRETTY_PRINT));
        break;
}
function verifyParam($n, ...$params)
{
    $i = 0;
    foreach ($params as $p)
        if (isset($_POST[$p]))
            $i++;
    if ($i != $n)
        die('Invalid Parameter Size');
}
