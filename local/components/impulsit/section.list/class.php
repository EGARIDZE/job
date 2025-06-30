<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Data\Cache;
use Bitrix\Main\ORM\Query\Query;
use Bitrix\Main\Loader;
use Bitrix\Main\ORM\Fields\ExpressionField;
use Bitrix\Iblock\SectionElementTable;
use Bitrix\Iblock\SectionTable;
class SectionList extends CBitrixComponent {
    public function executeComponent() {
        if (!Loader::includeModule('iblock')) {
            return;
        }
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
            $sections = [];

            $query = (new Query(SectionTable::getEntity()));
            $query->setSelect(['ID', 'NAME'])
                ->setFilter(['=IBLOCK_ID' => $this->arParams['IBLOCK_ID'], '=ACTIVE' => 'Y'])
                ->setOrder(['SORT' => 'ASC'])
                ->setLimit(8);
            $result = $query->exec();
            $sections = $result->fetchAll();

            foreach ($sections as &$section) {
                $countRow = SectionElementTable::getList([
                    'select' => [
                        new ExpressionField('CNT', 'COUNT(*)')
                    ],
                    'filter' => [
                        'IBLOCK_SECTION_ID'        => $section['ID'],
                        'IBLOCK_ELEMENT.ACTIVE'    => 'Y',
                        'IBLOCK_ELEMENT.IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                    ],
                ])->fetch();
                $section['ELEMENT_CNT'] = $countRow['CNT'];
            }
            unset($section);

            $this->arResult['ITEMS'] = $sections;
            $cache->endDataCache(['ITEMS' => $sections]);
        }
    }
}