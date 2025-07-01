<?php

\ob_start();
$APPLICATION->IncludeComponent(
    "impulsit:job.apply",
    "",
    []
);

$arResult['FORM_APPLY'] = \ob_get_clean();
