<?php

namespace App\CustomProperties;

use \CIBlock;
use \CIBlockElement;
use \CUtil;
class PropertyMultipleDescriptionSocialLink {
    public static function getTypeDescription(): array
    {
        return [
            'PROPERTY_TYPE'        => 'S',
            'USER_TYPE'            => 'elements_desc',
            'DESCRIPTION'          => 'Мн. связь с описанием',
            'GetSettingsHTML'      => [__CLASS__, 'GetSettingsHTML'],
            'PrepareSettings'      => [__CLASS__, 'PrepareSettings'],
            'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
            'ConvertToDB'          => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB'        => [__CLASS__, 'ConvertFromDB'],
        ];
    }
}