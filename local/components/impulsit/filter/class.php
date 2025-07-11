<?php

use App\Helper\IblockHelper;
use Bitrix\Iblock\Elements\ElementJobTable;
use Bitrix\Main\Entity\ExpressionField;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Filter extends CBitrixComponent{

    public function executeComponent()
    {
        global $jobsFilter;

        if(!empty($_GET['location'])){
            $jobsFilter['PROPERTY_LOCATION'] = $_GET['location'];
        }

        if(!empty($_GET['employment_rate'])){
            $jobsFilter['PROPERTY_EMPLOYMENT_RATE'] = $_GET['employment_rate'];
        }

        if(!empty($_GET['section'])){
            $jobsFilter['PROPERTY_SECTIONS'] = $_GET['section'];
        }

        if(!empty($_GET['company'])){
            $jobsFilter['PROPERTY_COMPANY_NAME'] = $_GET['company'];
        }

        if(!empty($_GET['price_from'])){
            $jobsFilter['>=PROPERTY_SALARY_FROM'] = $_GET['price_from'];
        }

        if(!empty($_GET['price_to'])){
            $jobsFilter['<=PROPERTY_SALARY_UP_TO'] = $_GET['price_to'];
        }

        $this->arResult['SECTIONS'] = \Bitrix\Iblock\SectionTable::getList([
            'select' => ['ID', 'NAME'],
            'filter' => ['=IBLOCK_ID' => $this->arParams['IBLOCK_ID']],
            'order' => ['NAME' => 'ASC'],
        ])->fetchAll();

        $this->arResult['LOCATIONS'] = \Bitrix\Iblock\PropertyEnumerationTable::getList([
            'select' => ['ID', 'VALUE'],
            'filter' => [
                '=PROPERTY.CODE' => 'LOCATION'
                ],
        ])->fetchAll();

        $this->arResult['EMPLOYMENT_RATES'] = \Bitrix\Iblock\PropertyEnumerationTable::getList([
            'select' => ['ID', 'VALUE'],
            'filter' => ['=PROPERTY.CODE' => 'EMPLOYMENT_RATE']
        ])->fetchAll();

        $this->arResult['COMPANIES'] = \Bitrix\Iblock\ElementTable::getList([
            'select' => ['ID', 'NAME'],
            'filter' => [
                'IBLOCK_ID' => 4,
                'ACTIVE' => 'Y',
            ],
            'order' => ['NAME' => 'ASC'],
        ])->fetchAll();


        $this->IncludeComponentTemplate();
    }

}