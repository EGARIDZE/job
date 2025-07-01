<?php

namespace App\Helper\Validate;

class ValidateHelper {
    protected $validators = [
        'name' => 'validateName',
        'email' => 'validateEmail',
        'website' => 'validateWebsite',
        'cover_letter' => 'validateCoverLetter',
    ];

    protected $validatorsFile = [
        'file' => 'validateFile',
    ];

    protected $executableFields = [];

    public function __construct(array $fields)
    {
        $this->executableFields = $fields;
    }

    public function validate($data, $fields = [], $file = []){
        $cleanData = $this->sanitizeInput($data);
        $checkFields = $this->checkFields($fields);
        $errors = $this->runValidators($cleanData, $file, $checkFields);
        return $errors;
    }

    protected function checkFields($fields){
        if(!empty($fields)) {
            return $fields;
        } elseif (!empty($this->executableFields)) {
            return $this->executableFields;
        } else {
            return array_merge(array_keys($this->validators), array_keys($this->validatorsFile));
        }
    }

    protected function runValidators($data, $file, $checkFields){
        $errors = [];
        foreach ($checkFields as $field) {
            if(isset($this->validators[$field])) {
                $method = $this->validators[$field];
                $value = $data[$field];
                $error = $this->$method($value);
            } elseif (isset($this->validatorsFile[$field])){
                $method = $this->validatorsFile[$field];
                $value = $file[$field];
                $error = $this->$method($value);
            } else {
                continue;
            }


            if($error !== null){
                $errors[$field] = $error;
            }
        }
        return $errors ? ['status' => false, 'errors' => $errors] : ['status' => true];
    }

    protected function validateName($name){
        return trim($name) === '' ? 'Поле Имя обязательно для заполнения' : null;
    }

    protected function validateEmail($email){
        if($email === ''){
            return 'Введите e-mail';
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'Введите корректный e-mail';
        }
        return null;
    }

    protected function validateWebsite($website){
        if($website === ''){
            return null;
        } elseif(!filter_var($website, FILTER_VALIDATE_URL)){
            return 'Ссылка на сайт должна быть правильным URL';
        }
        return null;
    }

    protected function validateCoverLetter($coverLetter){
        return trim($coverLetter) === '' ? 'Сопроводительное письмо обязательно для заполнения' : null;
    }

    public static function validateFile($file){
        if($file['error'] !== UPLOAD_ERR_OK){
            return 'Не удалось загрузить файл';
        }
        $filesFormat = ['pdf', 'doc', 'docx'];
        $maxSize = 1 * 1024 * 1024;

        $error = \CFile::CheckFile(
            $file,
            $maxSize,
            false,
            implode(',', $filesFormat),
        );
        if(!$error == ''){
            return $error;
        }
        return null;
    }

    protected function sanitizeInput(array $inputData): array
    {
        $sanitizedData = [];

        foreach ($inputData as $field => $rawValue) {

            $stringValue = (string) $rawValue;

            if (preg_match('/<script\b|on\w+\s*=/i', $stringValue)) {
                $sanitizedData[$field] = '';
                continue;
            }

            $sanitizedData[$field] = trim(htmlspecialchars(strip_tags($stringValue), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
        }

        return $sanitizedData;
    }

}
