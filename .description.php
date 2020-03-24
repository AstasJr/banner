<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage("EXAMPLE_BANNER_MAIN_NAME"),
    "DESCRIPTION" => Loc::getMessage("EXAMPLE_BANNER_MAIN_DESC"),
    "COMPLEX" => "N",
    "PATH" => [
        "ID" => "example",
        "NAME" => Loc::getMessage("EXAMPLE_BANNER_MAIN_PATH_NAME")
    ]
];