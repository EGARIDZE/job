<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use App\Helper\Validate\ValidateHelper;

class JobApply extends CBitrixComponent implements \Bitrix\Main\Engine\Contract\Controllerable {

    public function executeComponent()
    {
        $this->IncludeComponentTemplate();
    }

    public function configureActions()
    {
        return [
            'checkForm' => [
                'prefilters' => [],
                'postfilters' => []
            ],
            'saveFormData' => [
                'prefilters' => [],
                'postfilters' => []
            ]
        ];
    }
    public function checkFormAction()
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $postData = $request->getPostList()->toArray();
        $file = ['file' => $request->getFile('file')];
        $validator = new ValidateHelper(['name', 'email', 'cover_letter', 'file']);
        $result = $validator->validate($postData, [], $file);
        return $result;
    }

    public function saveFormDataAction()
    {
        if (!Loader::includeModule('iblock')) {
            return;
        }

        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $postData = $request->getPostList()->toArray();
        $file = $request->getFile('file');

        $arFile = \CFile::MakeFileArray($file['tmp_name']);
        $arFile['name'] = $file['name'];
        $arFile['type'] = $file['type'];
        $arFile['MODULE_ID'] = 'iblock';

        $cvFileId = \CFile::SaveFile($arFile, 'job-apply', true);

        $element = new \CIBlockElement;

        $fields = [
            'IBLOCK_ID'       => \App\Helper\IblockHelper::getIblockIdByCode('list-resumes-form'),
            'NAME'            => $postData['name'],
            'ACTIVE'          => 'N',
            'PROPERTY_VALUES' => [
                'EMAIL'        => $postData['email'],
                'COVER_LETTER' => $postData['cover_letter'],
                'FILE'         => $cvFileId,
                'VACANCY_ID' => $postData['vacancy_id'],
            ],
        ];

        if ($element->Add($fields)) {
            return ['status' => true,];
        } else {
            return [
                'status'  => false,
                'message' => $element->LAST_ERROR
            ];
        }
    }

}