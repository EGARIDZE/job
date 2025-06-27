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

                <div class="job_lists m-0">
                    <div class="row">
                        <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="job_details.html"><h4><?= $arItem['NAME']; ?></h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i><?= $arItem['PROPERTIES']['PROPERTY_LOCATION']['VALUE'] ?></p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i><?= $arItem['PROPERTIES']['PROPERTY_EMPLOYMENT_RATE']['VALUE'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="boxed-btn3">Apply Now</a>
                                    </div>
                                    <div class="date">
                                        <p>Date line: <?= date('d M Y', strtotime($arItem['ACTIVE_FROM'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                        <br /><?=$arResult["NAV_STRING"]?>
                    <?endif;?>
                </div>
