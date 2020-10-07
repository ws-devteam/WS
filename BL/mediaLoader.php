<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/SumanFramework.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/keymanager.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/replaceParams.php";

function loadMedia($section, $type, $name)
{
    $SumanX = new SumanFramework();
    $SQLParams = $SumanX->prepareParamsbyArgs(ReplaceParams::$_Section, $section, ReplaceParams::$_Type, $type, ReplaceParams::$_Name, $name);
    $strsql = $SumanX->replaceParams($SumanX->getSQL(KeyManager::$_FetchMediaTemplate), $SQLParams);
    $result = $SumanX->executeSQL($strsql);
    $SQLParams = $SumanX->pushNewParamVal($SQLParams, ReplaceParams::$_Link, 1);
    foreach ($result as $row) {
        $SQLParams = $SumanX->setParamVal($SQLParams, ReplaceParams::$_Link, $row[ReplaceParams::$_Link]);
        $div = $SumanX->replaceParams($row[ReplaceParams::$_Template], $SQLParams);
        echo $div;
    }
}
