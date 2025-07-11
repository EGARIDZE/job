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
<!--                                        <input type="text" name="name" placeholder="Поиск" onchange="this.form.submit()">-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="location" class="wide" onchange="this.form.submit()">
                                            <option value="" data-display="Местоположение">Местоположение</option>
                                            <?php foreach ($arResult['LOCATIONS'] as $location): ?>
                                                <option value="<?= $location['ID'] ?>"
                                                    <?= isset($_GET['location']) && $_GET['location'] == $location['ID'] ? 'selected' : ''; ?>
                                                >
                                                    <?= $location['VALUE'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="section" class="wide" onchange="this.form.submit()">
                                            <option value="" data-display="Категория">Категория</option>
                                            <?php foreach ($arResult['SECTIONS'] as $section): ?>
                                                <option value="<?= $section['ID'] ?>"
                                                    <?= (isset($_GET['section']) && $_GET['section'] == $section['ID']) ? 'selected' : ''; ?>
                                                >
                                                    <?= $section['NAME'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="employment_rate" class="wide" onchange="this.form.submit()">
                                            <option value="" data-display="Тип работы">Тип работы</option>
                                            <?php foreach ($arResult['EMPLOYMENT_RATES'] as $rate): ?>
                                                <option value="<?= $rate['ID'] ?>"
                                                    <?= isset($_GET['employment_rate']) && $_GET['employment_rate'] == $rate['ID'] ? 'selected' : ''; ?>
                                                >
                                                    <?= $rate['VALUE'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_field">
                                        <select name="company" class="wide" onchange="this.form.submit()">
                                            <option value="" data-display="Компания">Компания</option>
                                            <?php foreach ($arResult['COMPANIES'] as $company): ?>
                                                <option value="<?= $company['ID'] ?>"
                                                    <?= isset($_GET['company']) && $_GET['company'] == $company['ID'] ? 'selected' : ''; ?>
                                                >
                                                    <?= $company['NAME'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div style="margin-bottom: 30px;" class="range_wrap mt-3">
                                    <label>Ценовой диапазон:</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single_field">
                                                <input type="text" name="price_from" class="form-control" placeholder="От"
                                                       value="<?= (isset($_GET['price_from']) && is_numeric($_GET['price_from'])) ? $_GET['price_from'] : ''; ?>"
                                                       onblur="document.getElementById('filterForm').submit()"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single_field">
                                                <input type="text" name="price_to" class="form-control" placeholder="До"
                                                       value="<?= (isset($_GET['price_to']) && is_numeric($_GET['price_to'])) ? $_GET['price_to'] : ''; ?>"
                                                       onblur="document.getElementById('filterForm').submit()"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--                                <div class="col-lg-12">-->
<!--                                    <div class="single_field">-->
<!--                                        <div class="reset_btn">-->
<!--                                            <input id="filterBtn" style="padding: 13px 29px 13px 29px;" class="boxed-btn3 green w-100" type="submit" value="Отправить">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

                            </div>

                            <div class="reset_btn">
                                <button onclick="resetFilter()" class="boxed-btn3 red w-100" type="button">Сбросить</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <script>
                function resetFilter(){
                    const url = window.location.pathname;
                    window.location.href = url;
                }
            </script>