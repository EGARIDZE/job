<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\Elements\ElementCompaniesTable;
use App\Helper\Vacancy\VacancyHelper;
use App\Helper\Ceo\CeoHelper;

class CompanyList extends CBitrixComponent {
    public function executeComponent() {
        if (!Loader::includeModule('iblock')) {
            return;
        }
        $this->getCompanies();
        $this->IncludeComponentTemplate();
    }

    protected function getCompanies() {
        $companies = ElementCompaniesTable::getList([
            'select' => ['ID', 'NAME', 'PREVIEW_PICTURE'],
            'filter' => ['=ACTIVE' => 'Y'],
            'limit' => $this->arParams['ITEM_COUNT'],
            'cache' => array(
                'ttl' => 3600,
                'cache_joins' => true,
            )
        ])->fetchAll();

        $getVacancyCount = VacancyHelper::getVacancyCount($companies, 'PROPERTY_COMPANY_NAME');

        foreach($companies as &$company) {
            $company['VACANCY_COUNT'] = $getVacancyCount[$company['ID']] ?? 0;
            $company['PREVIEW_PICTURE_SRC'] = \CFile::GetPath($company['PREVIEW_PICTURE']);
            $company += CeoHelper::getSeoMeta($this->arParams['IBLOCK_ID'], $company['ID']);
        }

        return $this->arResult['ITEMS'] = $companies;
    }
}