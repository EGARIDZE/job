<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$prevPage = $arResult['NavPageNomer'] - 1;
$nextPage = $arResult['NavPageNomer'] + 1;
$pageParam = 'PAGEN_'.$arResult['NavNum'];

$prevUrl = $APPLICATION->GetCurPageParam(
    $pageParam.'='.$prevPage,
    [$pageParam]
);
$nextUrl = $APPLICATION->GetCurPageParam(
    $pageParam.'='.$nextPage,
    [$pageParam]
);
?>
<div class="pagination_wrap">
    <ul>
        <?php if($arResult['NavPageNomer'] > 1): ?>
            <li><a href="<?= $prevUrl ?>"><i class="ti-angle-left"></i></a></li>
            <li><a href="<?= $prevUrl ?>"><span><?= str_pad($prevPage, 2, '0', STR_PAD_LEFT) ?></span></a></li>
        <?php endif ?>

        <?php if($arResult['NavPageNomer'] < $arResult['NavPageCount']): ?>
            <li><a href="<?= $nextUrl ?>"><span><?= str_pad($nextPage, 2, '0', STR_PAD_LEFT) ?></span></a></li>
            <li><a href="<?= $nextUrl ?>"><i class="ti-angle-right"></i></a></li>
        <?php endif ?>
    </ul>
</div>
