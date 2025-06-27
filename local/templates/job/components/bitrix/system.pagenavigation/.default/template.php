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

$preparingPrevUrlPage = 'PAGEN_' . $arResult['NavNum'] . '=' . ($arResult['NavPageNomer'] - 1);
$preparingNextUrlPage = 'PAGEN_' . $arResult['NavNum'] . '=' . ($arResult['NavPageNomer'] + 1);
$prevUrlPage = $arResult['sUrlPath'] . '?' . $preparingPrevUrlPage;
$nextUrlPage = $arResult['sUrlPath'] . '?' . $preparingNextUrlPage;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="pagination_wrap">
            <ul>
                <?php if($arResult['NavPageNomer'] !== 1): ?>
                <li><a href="<?= $prevUrlPage; ?>"> <i class="ti-angle-left"></i> </a></li>
                <li><a href="<?= $prevUrlPage; ?>"><span>0<?= ($arResult['NavPageNomer'] - 1); ?></span></a></li>
                <?php endif; ?>

                <?php if($arResult['NavPageNomer'] < $arResult['NavPageCount']):?>
                    <li><a href="<?= $nextUrlPage; ?>"><span>0<?= ($arResult['NavPageNomer'] + 1); ?></span></a></li>
                    <li><a href="<?= $nextUrlPage; ?>"> <i class="ti-angle-right"></i> </a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</div>
