<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Лучшие компании</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="brouse_job text-right">
                    <a href="/vakansii" class="boxed-btn4">Просмотреть больше вакансий</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="<?= $arItem['PREVIEW_PICTURE_SRC'] ?>" alt="<?= $arItem['ALT'] ?>" title="<?= $arItem['TITLE'] ?>">
                        </div>
                        <a href="jobs.html"><h3><?= $arItem['NAME'] ?></h3></a>
                        <p> <span><?= $arItem['VACANCY_COUNT'] ?></span> доступных позиций</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>