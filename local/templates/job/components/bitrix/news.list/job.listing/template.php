<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<?php if(!empty($arResult['ITEMS'])): ?>

<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Список вакансий</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="/vakansii" class="boxed-btn4">Просмотреть больше вакансий</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                         alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                         title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                    >
                                </div>
                                <div class="jobs_conetent">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><h4><?= $arItem['NAME']; ?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> <?= $arItem['PROPERTIES']['LOCATION']['VALUE']; ?></p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> <?= $arItem['PROPERTIES']['EMPLOYMENT_RATE']['VALUE']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="boxed-btn3">Подать заявку сейчас</a>
                                </div>
                                <div class="date">
                                    <p>Линия даты: <?= date('d, M, Y', strtotime($arItem['ACTIVE_FROM'])); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>