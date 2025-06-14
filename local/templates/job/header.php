<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<?php
use Bitrix\Main\Page\Asset;
?>

<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<?php
			Asset::getInstance()->addString('<meta charset="' . SITE_CHARSET . '">');
			Asset::getInstance()->addString('<meta http-equiv="x-ua-compatible" content="ie=edge">');
			Asset::getInstance()->addString('<meta name="description" content="' . $APPLICATION->GetPageProperty("description") . '">');
			Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
			Asset::getInstance()->addString('<link rel="shortcut icon" type="image/x-icon" href="' . SITE_TEMPLATE_PATH . '/img/favicon.png">');
		?>
		<title>Job Board</title>
		<?php
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/owl.carousel.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/magnific-popup.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/font-awesome.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/themify-icons.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/nice-select.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/flaticon.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/gijgo.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/animate.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/slicknav.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
		?>

        <?php
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/modernizr-3.5.0.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/jquery-1.12.4.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/popper.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/isotope.pkgd.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/ajax-form.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/waypoints.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.counterup.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/imagesloaded.pkgd.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/scrollIt.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.scrollUp.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/wow.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/nice-select.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.slicknav.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/plugins.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/gijgo.min.js');
        //contact js
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/contact.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.ajaxchimp.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.form.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.validate.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/mail-script.js');
        // ваш главный файл
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
        ?>
        <?php
        $APPLICATION->ShowHead();
        ?>
	</head>

	<body>
<?php $APPLICATION->ShowPanel(); ?>

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "2",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                            "USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                            false
                        );?>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a href="#">Log in</a>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="#">Post a Job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

