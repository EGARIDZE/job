<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Популярные категории</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#"><h4><?= $arItem['NAME']; ?></h4></a>
                        <p> <span><?= $arItem['ELEMENT_CNT']; ?></span> Доступных позиций</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
