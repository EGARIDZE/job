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

<!-- job_listing_area_start  -->
            <div class="col-lg-9">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Список вакансий</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row">
                        <?php if (!empty($arResult['ITEMS'])): ?>
                            <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="">
                                            </div>
                                            <div class="jobs_conetent">
                                                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                                                    <h4><?= $arItem['NAME']; ?></h4>
                                                </a>
                                                <div class="links_locat d-flex align-items-center">
                                                    <div class="location">
                                                        <p><i class="fa fa-map-marker"></i><?= $arItem['PROPERTIES']['LOCATION']['VALUE'] ?></p>
                                                    </div>
                                                    <div class="location">
                                                        <p><i class="fa fa-clock-o"></i><?= $arItem['PROPERTIES']['EMPLOYMENT_RATE']['VALUE'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobs_right">
                                            <div class="apply_now">
                                                <a class="heart_mark" href="#"><i class="fa fa-heart"></i></a>
                                                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="boxed-btn3">Apply Now</a>
                                            </div>
                                            <div class="date">
                                                <p>Date line: <?= date('d M Y', strtotime($arItem['ACTIVE_FROM'])) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="no-results text-center py-5">
                                    <p>Нет результатов</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
                        <br />
                        <?= $arResult["NAV_STRING"] ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->