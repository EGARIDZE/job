<?php

namespace App\CustomProperties;


class Register
{
    public static function register(){
        $map = [
            PropertyMultipleDescriptionSocialLink::class
        ];
        foreach($map as $class){
            AddEventHandler(
                'iblock',
                'OnIBlockPropertyBuildList',
                [$class, 'getTypeDescription']
            );
        }
    }
}