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
    case 'create':
        verifyParam(2, API_ReplaceParams::$_collectionParam, API_ReplaceParams::$_formData);
        $strsql = "insert into $collectionParam (" . implode(",", array_keys($formData)) . ") values ('"
            . implode("','", array_values($formData)) . "')";
        if ($SumanX->executeSQL($strsql))
            read($collectionParam, $SumanX);
        break;
    case 'read':
        verifyParam(1, API_ReplaceParams::$_collectionParam);
        read($collectionParam, $SumanX);
        break;
    case 'update':
        verifyParam(3, API_ReplaceParams::$_collectionParam, API_ReplaceParams::$_id, API_ReplaceParams::$_formData);
        $tempStatement = "";
        foreach ($formData as $k => $v)
            $tempStatement .= "$k = '$v',";
        $strsql = "update $collectionParam set $tempStatement updatedAt=now() where " . API_ReplaceParams::$_id . " = '$_id'";
        if ($SumanX->executeSQL($strsql))
            read($collectionParam, $SumanX);
        break;
    case 'delete':
        verifyParam(2, API_ReplaceParams::$_collectionParam, API_ReplaceParams::$_id);
        $strsql = "delete from " . $collectionParam . " where " . API_ReplaceParams::$_id . " = '$_id'";
        if ($SumanX->executeSQL($strsql))
            read($collectionParam, $SumanX);
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
function read($tableName, $frmwk)
{
    $strsql = "select * from $tableName";
    print(json_encode($frmwk->executeSQL($strsql), JSON_PRETTY_PRINT));
}
