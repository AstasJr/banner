<?php

use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class AlumoBannerMain extends CBitrixComponent {

    /**
     * Проверка подключения модулей, требуемых для работы компонента
     * @return
     * $throws Exception
     */
    private function _checkModules() {
        if ( !Loader::includeModule('iblock') || !Loader::includeModule('sale')) {
            throw new \Exception('Не загружены модули, необходимые для работы компонента');
        }
        return true;
    }

    /**
     * Подготовка параметров компонента
     * @param $arParams
     * @return mixed
     */
    public function onPrepareComponentParams($arParams) {
        $arParams['IBLOCK_ID'] = intval($arParams['IBLOCK_ID']);
        if ($arParams['IBLOCK_ID'] == 0)
            return;

        $arParams['CACHE_TIME'] = isset($arParams["CACHE_TIME"])
            ? $arParams["CACHE_TIME"]
            : 360000;

        return $arParams;
    }

    /*
    * Собираем массив элементов в arItems
    */
    public function getItems () {
        $arSelect = Array("PROPERTY_TITLE", "PREVIEW_PICTURE", "PREVIEW_TEXT");
        $iblock_id = $this->onPrepareComponentParams($this->arParams)['IBLOCK_ID'];
        $arFilter = Array("IBLOCK_ID"=>$iblock_id, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $preview_picture = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
            $arFields['PREVIEW_PICTURE_SRC'] = $preview_picture;
            $arItems[] = $arFields;
        }
        return $arItems;
    }

    /**
     * Точка входа в компонент
     */
    public function executeComponent() {
        $this->_checkModules();

        if ($this->startResultCache()) {

            $this->arResult['ITEMS'] = $this->getItems();

            $this->includeComponentTemplate();

        }
    }

}