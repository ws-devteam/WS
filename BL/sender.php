<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/SumanFramework.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/WS/framework/shared/replaceParams.php";


extract($_POST);
// echo serialize($_POST);

if (isset($_POST[ReplaceParams::$_FireEmail]) && $_POST[ReplaceParams::$_FireEmail] == 1) {
	echo performMail($mode, $name, $email, $subject, $message);
}


function performMail($mode, $name = "", $email = "", $subject = "MAIL FROM WS SITE", $message = "")
{
	$SumanX = new SumanFramework();

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: Wedding Stories donotreply@weddingstories3.in" . "\r\n";
	$mailPath = $_SERVER["DOCUMENT_ROOT"] . "/WS/components/mail/";

	//Sending to Admin
	$to = array();
	$body = array();

	switch ($mode) {
		case "contactMail":

			$admBody = file_get_contents($mailPath . "contact.html");
			$params = $SumanX->prepareParamsbyArgs(ReplaceParams::$_Name, $name, ReplaceParams::$_Email, $email, ReplaceParams::$_Subject, $subject, ReplaceParams::$_Message, $message);
			$admBody = $SumanX->replaceParams($admBody, $params);

			$userBody = file_get_contents($mailPath . "acknowledgement.html");

			array_push($to, "weddingstories3@gmail.com", $email);
			array_push($body, $admBody, $userBody);
			break;

		case "newUserMail":
			$params = $SumanX->prepareParamsbyArgs(ReplaceParams::$_Name, $name, ReplaceParams::$_Email, $email);

			$admBody = file_get_contents($mailPath . "new_user_notification.html");
			$admBody = $SumanX->replaceParams($admBody, $params);

			$userBody = file_get_contents($mailPath . "new_user_welcome.html");
			$userBody = $SumanX->replaceParams($userBody, $params);

			array_push($to, "weddingstories3@gmail.com", $email);
			array_push($body, $admBody, $userBody);
			break;

		case "CustomizedEnquiry":
			$message = "";
			foreach ($_POST as $key => $value) {
				if (preg_match('[Mode|FireEmail|Subject]', ucwords(htmlspecialchars($key))) === 0) {
					$message .= htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
				}
			}
			$admBody = file_get_contents($mailPath . "customization.html");
			$params = $SumanX->prepareParamsbyArgs(ReplaceParams::$_Details, $message, ReplaceParams::$_Email, $email);
			$admBody = $SumanX->replaceParams($admBody, $params);

			$userBody = file_get_contents($mailPath . "acknowledgement.html");

			array_push($to, "weddingstories3@gmail.com", $email);
			array_push($body, $admBody, $userBody);
			break;
			return $message;
	}

	for ($i = 0; $i < count($to); $i++) {
		if (mail($to[$i], $subject, $body[$i], $headers) == false) {
			return 0;
			break;
		}
	}
	if ($i = count($to)) {
		return 1;
	}
}
