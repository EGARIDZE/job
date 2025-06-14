<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Data\Cache;
class SectionList extends CBitrixComponent {
    public function executeComponent() {
        $this->getSections();
        $this->IncludeComponentTemplate();
    }

    protected function getSections() {
        $cache = Cache::createInstance();
        $cachePath = '/popularsectionlist';
        $cacheTime = 3600;
        $cacheId = 'sections_' . md5(serialize($this->arParams));

        if($cache->initCache($cacheTime, $cacheId, $cachePath)) {
            $this->arResult['ITEMS'] = $cache->getVars()['ITEMS'];
        } elseif ($cache->startDataCache()) {
            echo 'Кеш пишется';
            $sections = [];

            $resultObject = CIBlockSection::GetList(
                ['SORT' => 'ASC'],
                ['IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'CHECK_PERMISSIONS' => 'N'],
                true,
                ['ID', 'NAME'],
                ['nTopCount' => 8]
            );

            while ($section = $resultObject->GetNext()) {
                $sections[] = $section;
            }

            $this->arResult['ITEMS'] = $sections;
            $cache->endDataCache(['ITEMS' => $sections]);
        }
    }
}