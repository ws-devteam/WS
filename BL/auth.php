<?php
// header('Content-Type: application/json');

require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/SumanFramework.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/keymanager.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/replaceParams.php";

$result = array();
extract($_POST);
session_start();
// echo serialize($_POST);

if ($functionname == "signup") {
    echo signup($FirstName, $LastName, $SignupEmail, $SignupPassword, $Phone);
} else {
    echo signin($SigninEmail, $SigninPassword);
}


function signup($FirstName, $LastName, $SignupEmail, $SignupPassword, $Phone)
{
    $SumanX = new SumanFramework();
    $SignupPassword = password_hash($SignupPassword, PASSWORD_BCRYPT);
    $SQLParams = $SumanX->prepareParamsbyArgs(ReplaceParams::$_FirstName, $FirstName, ReplaceParams::$_LastName, $LastName, ReplaceParams::$_Email, $SignupEmail, ReplaceParams::$_Password, $SignupPassword, ReplaceParams::$_Phone, $Phone);
    $strsql = $SumanX->replaceParams($SumanX->getSQL(KeyManager::$_InsertNewUser), $SQLParams);
    if ($SumanX->executeSQL($strsql) != 1) {
        return "ID already exists";
    } else {
        $_SESSION["login"] = 1;
        require_once("sender.php");
        performMail("newUserMail", $FirstName." ".$LastName, $SignupEmail);
        return 1;
    };
}

function signin($SigninEmail, $SigninPassword)
{
    $SumanX = new SumanFramework();
    $SQLParams = $SumanX->prepareParamsbyArgs(ReplaceParams::$_Email, $SigninEmail, ReplaceParams::$_Password, $SigninPassword);
    $strsql = $SumanX->replaceParams($SumanX->getSQL(KeyManager::$_VerifyUser), $SQLParams);
    if (password_verify($SigninPassword, $SumanX->executeSQL($strsql))) {
        $_SESSION["login"] = 1;
        return 1;
    } else {
        return "Wrong Email/Password";
    }
}
