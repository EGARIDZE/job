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
<?php if(!empty($arResult)): ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?= $arResult['NAME'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="<?= $arResult['ID'];?>" class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ;?>" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="<?= $arResult['DETAIL_PAGE_URL'] ?>"><h4><?= $arResult['NAME'] ?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> <?= $arResult['PROPERTIES']['PROPERTY_LOCATION']['VALUE'] ?></p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> <?= $arResult['PROPERTIES']['PROPERTY_EMPLOYMENT_RATE']['VALUE'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Описание</h4>
                            <p><?= $arResult['DETAIL_TEXT'] ?></p>

                        </div>
                        <div class="single_wrap">
                            <h4>Ответственность</h4>
                            <ul>
                                <?php foreach ($arResult['PROPERTIES']['PROPERTY_RESPONSIBILITIES']['VALUE'] as $value): ?>
                                <li><?= $value ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Квалификация</h4>
                            <ul>
                                <?php foreach ($arResult['PROPERTIES']['PROPERTY_QUALIFICATIONS']['VALUE'] as $value): ?>
                                    <li><?= $value ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Преимущества</h4>
                            <p><?= $arResult['PROPERTIES']['PROPERTY_ADVANTAGES']['~VALUE']['TEXT']; ?></p>
                        </div>
                    </div>


                <?= $arResult['FORM_APPLY']; ?>

                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Краткое описание вакансии</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Опубликовано: <span><?= date('d M Y', strtotime($arResult['ACTIVE_FROM'])) ?></span></li>
                                <li>Вакансия: <span><?= $arResult['PROPERTIES']['PROPERTY_POSITION_COUNT']['VALUE'] ?> позиции</span></li>
                                <li>Зарплата: <span><?= CurrencyFormat($arResult['PROPERTIES']['PROPERTY_SALARY_FROM']['VALUE'], 'RUB') ?> - <?= CurrencyFormat($arResult['PROPERTIES']['PROPERTY_SALARY_UP_TO']['VALUE'], 'RUB') ?>/год</span></li>
                                <li>Местоположение: <span><?= $arResult['PROPERTIES']['PROPERTY_LOCATION']['VALUE'] ?></span></li>
                                <li>Формат работы: <span><?= $arResult['PROPERTIES']['PROPERTY_EMPLOYMENT_RATE']['VALUE'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
