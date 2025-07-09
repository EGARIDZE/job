<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<div class="job_listing_area plus_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="job_filter white-bg">
                    <div class="form_inner white-bg">
                        <h3>Фильтр</h3>
                        <form id="filterForm" action="#" method="GET">
                            <div class="row">
<!--                                <div class="col-lg-12">-->
<!--                                    <div class="single_field">-->
<!--                                        <input type="text" placeholder="Поиск по ключевым словам">-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="location" class="wide">
                                            <option value="" data-display="Местоположение">Местоположение</option>
                                            <?php foreach ($arResult['LOCATIONS'] as $location): ?>
                                                <option value="<?= $location['ID'] ?>"><?= $location['VALUE'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="section" class="wide">
                                            <option value="" data-display="Категория">Категория</option>
                                            <?php foreach ($arResult['SECTIONS'] as $section): ?>
                                                <option value="<?= $section['ID'] ?>"><?= $section['NAME'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="employment_rate" class="wide">
                                            <option value="" data-display="Тип работы">Тип работы</option>
                                            <?php foreach ($arResult['EMPLOYMENT_RATES'] as $rate): ?>
                                                <option value="<?= $rate['ID'] ?>"><?= $rate['VALUE'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="company" class="wide">
                                            <option value="" data-display="Компания">Компания</option>
                                            <?php foreach ($arResult['COMPANIES'] as $company): ?>
                                                <option value="<?= $company['ID'] ?>"><?= $company['NAME'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <div class="reset_btn">
                                            <input id="filterBtn" style="padding: 13px 29px 13px 29px;" class="boxed-btn3 green w-100" type="submit" value="Отправить">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
<!--                    <div style="margin-bottom: 30px;" class="range_wrap mt-3">-->
<!--                        <label>Ценовой диапазон:</label>-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-6">-->
<!--                                <div class="single_field">-->
<!--                                    <input type="text" name="price_from" class="form-control" placeholder="От">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6">-->
<!--                                <div class="single_field">-->
<!--                                    <input type="text" name="price_to" class="form-control" placeholder="До">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="reset_btn">
                        <button class="boxed-btn3 red w-100" type="submit">Сбросить</button>
                    </div>
                </div>
            </div>