<?php

namespace App\Helper\Vacancy;

use Bitrix\Iblock\Elements\ElementJobTable;

class VacancyHelper {
    public static function getVacancyCount(array $entities, string $propertyCode = null) {
        \Bitrix\Main\Loader::includeModule('iblock');
        if(empty($entities)) return;

        $entitiesID = array_column($entities, 'ID');
        $jobObject = ElementJobTable::getList([
            'select' => [
                'ENTITY_ID' => $propertyCode . '.VALUE',
                'CNT'
            ],
            'filter' => [
                '=ACTIVE' => 'Y',
                '@' . $propertyCode . '.VALUE' => $entitiesID
            ],
            'runtime' => [
                new \Bitrix\Main\Entity\ExpressionField('CNT', 'COUNT(*)')
            ]
        ]);
        $countVacancyFromElement = [];
        while($row = $jobObject->fetch()) {
            $countVacancyFromElement[(int)$row['ENTITY_ID']] = $row['CNT'];
        }
        return $countVacancyFromElement;
    }
}