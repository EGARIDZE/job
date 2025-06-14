<?php

namespace App\Helper;
use Bitrix\Main\Loader;
use Bitrix\Main\ORM\Query\Query;

class IblockHelper
{
    public static function getIblockIdByCode(string $code): int
    {
        Loader::includeModule('iblock');
        $query = new Query(\Bitrix\Iblock\IblockTable::getEntity());
        $query
            ->setSelect(['ID'])
            ->setFilter(['=CODE' => $code])
            ->setLimit(1);

        $result = $query->exec();
        if ($row = $result->fetch()) {
            return $row['ID'];
        } else{
            throw new \Exception("IBlock with code" . $code . "not found.");
        }
    }
}