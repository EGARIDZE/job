<?php

namespace App\Helper\Ceo;

class CeoHelper {
    public static function getSeoMeta($iblockId, $elementId) {
        $seoFromElement = new \Bitrix\IBlock\InheritedProperty\ElementValues($iblockId, $elementId);
        $pageProperties = $seoFromElement->getValues();
        return [
            'ALT' => $pageProperties['ELEMENT_PREVIEW_PICTURE_FILE_ALT'] ?? '',
            'TITLE' => $pageProperties['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] ?? '',
        ];
    }
}