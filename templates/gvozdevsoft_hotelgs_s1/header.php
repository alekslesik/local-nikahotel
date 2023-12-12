<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Loader;
use \Gvozdevsoft\HotelGs\Settings;
IncludeTemplateLangFile(__FILE__);
define("SITE_SERVER_PROTOCOL", (CMain::IsHTTPS()) ? "https://" : "http://");
$curPage = $APPLICATION->GetCurPage();
if(!Loader::includeModule('gvozdevsoft.hotelgs'))
	die('gvozdevsoft.hotelgs module not installed');
$theme = Settings::getTheme(SITE_TEMPLATE_PATH);
$homeBannerHeight = Settings::get('home_banner_height',SITE_ID,'100vh');
$width = Settings::get('width',SITE_ID,'1220px');
$font = Settings::get('font',SITE_ID,'Arial');
$useBasket = Settings::get('use_basket',SITE_ID,'N');
$inputMaskPattern = Settings::get('form_phone_mask');
$faviconPath = Settings::getFilePath('favicon');
$homeBannerForm = Settings::get('home_banner_form',SITE_ID,'Y');
$fixHeader = Settings::get('header_fixed',SITE_ID,'Y');
$btnHeader = Settings::get('header_btn_name');
$sidebarFilter = Settings::get('sidebar_filter',SITE_ID,'Y');
$sidebarAction = Settings::get('sidebar_action',SITE_ID,'Y');
$sidebarReview = Settings::get('sidebar_review',SITE_ID,'Y');
$sidebarPhoto = Settings::get('sidebar_photo',SITE_ID,'Y');
$sidebarNews = Settings::get('sidebar_news',SITE_ID,'Y');
$sidebarFixed = Settings::get('sidebar_fixed',SITE_ID,'Y');
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<title><?$APPLICATION->ShowTitle()?></title>
	<?$APPLICATION->ShowHead();?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/reset.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/bootstrap-grid.min.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/font-awesome/css/font-awesome.min.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/owl-carousel-2/css/owl.carousel.min.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/owl-carousel-2/css/owl.theme.default.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/fancybox/jquery.fancybox.min.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/flex-gallery/justified-gallery.min.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/template.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/mainpage.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/content.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/catalog.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/projects.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/sidebar.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/feedback.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_DIR ."lib/calc/css/calc.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/personal.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/flmenu/flmenu.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/accordion/accordion.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/tabs/tabs.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/arrup/arrup.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/hdfix/hdfix.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/lib/img-zoom/img-zoom.css")?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/cart.css")?>
	<?
	if($theme['string'])
		$APPLICATION->AddHeadString($theme['string']);
	if($theme['path'])
		$APPLICATION->SetTemplateCSS($theme['path']);
	?>
	<?if($homeBannerHeight=='750px'):?>
		<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/slider.css")?>
	<?endif;?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/adaptive.css")?>
	<?if($width=='1350px'):?>
		<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/width_1350.css")?>
	<?endif;?>
	<?if($font=='Roboto'):?>
		<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/fonts/roboto/roboto.css")?>
	<?endif;?>
	<?if($font=='Open Sans'):?>
		<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/fonts/open-sans/open-sans.css")?>
	<?endif;?>
	<?$APPLICATION->SetTemplateCSS(SITE_TEMPLATE_PATH ."/css/customer.css")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/jquery-3.3.1.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/owl-carousel-2/js/owl.carousel.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/fancybox/jquery.fancybox.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/flmenu/flmenu.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/sticky/jquery.sticky.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/accordion/accordion.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/tabs/tabs.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/arrup/arrup.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/hdfix/hdfix.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/img-zoom/img-zoom.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/flex-gallery/jquery.justified-gallery.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_DIR ."lib/feedback/feedback.js")?>
	<?if($inputMaskPattern):?>
		<script>window.inputMaskPattern="<?=$inputMaskPattern?>";</script>
	<?endif;?>
	<?if($useBasket=='Y'):?>
	<?$APPLICATION->AddHeadScript(SITE_DIR ."lib/cart/cart.js")?>
	<?endif;?>
	<?$APPLICATION->AddHeadScript(SITE_DIR ."lib/calc/js/calc.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/lib/inputmask/jquery.inputmask.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH ."/js/main.js")?>
	<!-- Open Graph -->
	<meta property="og:title" content="<?$APPLICATION->ShowProperty("title")?>">
	<meta property="og:description" content="<?=$APPLICATION->ShowProperty("description")?>">
	<meta property="og:type" content="website">
    <meta property="og:url" content="<?=SITE_SERVER_PROTOCOL . SITE_SERVER_NAME . $curPage?>">
    <?if(!CSite::InDir(SITE_DIR.'index.php')):?>
	<meta property="og:image" content="<?=$APPLICATION->ShowProperty("og:image")?>">
	<?else:?>
	<meta property="og:image" content="<?=SITE_SERVER_PROTOCOL . SITE_SERVER_NAME . $curPage?>images/logo.png">
	<?endif;?>
	<!-- /Open Graph -->
	<link type="image/x-icon" rel="shortcut icon" href="<?if($faviconPath):?><?=$faviconPath?><?else:?><?=SITE_DIR?>favicon.ico<?endif;?>">
</head>
<body>
	<?$APPLICATION->ShowPanel()?>
	<header id="header">
		<?if(CSite::InDir(SITE_DIR.'index.php')):?>
		<div class="header-main-page">
		<div class="header-inner-main-page">
			<?endif;?>
			<?if(!CSite::InDir(SITE_DIR.'index.php')):?>
			<div class="header-inner">
				<?endif;?>
				<div class="container">
					<div class="header-top">
						<div class="row align-items-center">
							<div class="col-lg-auto text-xs-center">
								<div class="header-logo">
									<a href="<?=SITE_DIR?>" class="header-logo__link">
										<?@include(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'/includes/header_logo_img.php'));?>
									</a>
								</div>
							</div>
							<!-- col -->
							<div class="col-lg-3 offset-xl-2">
								<div class="header-address">
									<div class="header-address__icon"></div>
									<div class="header-address__text">
										<?$APPLICATION->IncludeFile(SITE_DIR."includes/header_address.php", Array(), Array("MODE" => "html", "NAME" => "Address"));?>
									</div>
								</div>
							</div>
							<!-- col -->
							<div class="col mr-auto">
								<div class="header-phone">
									<div class="header-phone__main-phone">
										<?@include(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'/includes/header_phone.php'));?>
									</div>
								</div>
								<div class="header-btn-callback">
									<a data-fancybox data-src="#form-popup-callback" href="javascript:;" class="header-btn-callback__link">
										<?=GetMessage("CALLBACK")?>
									</a>
								</div>
							</div>
							<!-- col -->
							<div class="col-lg-auto">
								<div class="header-btn-zayvka">
									<a data-fancybox data-src="#form-popup-request" href="javascript:;" class="btn-link header-btn-zayvka__link">
										<?if($btnHeader):?><?=$btnHeader?><?else:?><?=GetMessage("HEADER_ZAYVKA")?><?endif;?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /header-top -->
					<div class="row">
						<div class="col-lg">
							<?if(CSite::InDir(SITE_DIR.'index.php')):?>
							<nav class="header-top-menu menu-line-main-page">
							<?endif;?>
							<?if(!CSite::InDir(SITE_DIR.'index.php')):?>
							<nav class="header-top-menu menu-line">
							<?endif;?>
								<?$APPLICATION->IncludeComponent(
										"bitrix:menu",
										"mn_flmenu_top",
										array(
											"ROOT_MENU_TYPE" => "top",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"CACHE_SELECTED_ITEMS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "3",
											"CHILD_MENU_TYPE" => "left",
											"USE_EXT" => "Y",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "mn_flmenu_top",
											"COMPOSITE_FRAME_MODE" => "A",
											"COMPOSITE_FRAME_TYPE" => "AUTO"
										),
										false
									);?>
							</nav>
						</div>
					</div>
					<!-- /top-menu -->
					<?if(CSite::InDir(SITE_DIR.'index.php')):?>
					<?if($homeBannerForm=='Y'):?>
					<!-- FORM -->
					<?$APPLICATION->IncludeFile(SITE_DIR."lib/feedback/forms/form_slider_main.php", Array(), Array("MODE" => "html", "NAME" => "Form Slider"));?>
					<!-- /FORM -->
					<?endif;?>
					</div>
					<?endif;?>
				</div>
			</div>
			<!-- /header-inner -->
			<?if(CSite::InDir(SITE_DIR.'index.php')):?>
			<!-- header-slider -->
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."includes/index_slider.php"), false);?>
			<!-- /header-slider -->
			<?endif;?>
			<?if($fixHeader=='Y'):?>
			<!-- header-fix -->
			<div class="header-fix">
				<?$APPLICATION->IncludeFile(SITE_DIR."includes/header_fix.php", Array(), Array("MODE" => "html", "NAME" => "Header Fix"));?>
			</div>
			<!-- /header-fix -->
			<?endif;?>
		</header>
		<!-- HEADER -->
		<?if(CSite::InDir(SITE_DIR.'index.php')):?>
		<div class="wrapper-main-page">
		<?endif;?>
		<?if(!CSite::InDir(SITE_DIR.'index.php')):?>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="col wrapper-inner">
						<div id="sidebar">
							<div class="sidebar_adaptive">
								<?if($sidebarFilter=='Y'):?>
								<div id="sidebar_filter_catalog">
									<?$APPLICATION->IncludeFile(SITE_DIR."includes/sidebar_filter_catalog.php", Array(), Array("MODE" => "html", "NAME" => "Filter Catalog"));?>
								</div>
								<?endif;?>
								<nav id="sidebar_menu">
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu",
										"sections_menu",
										array(
											"ALLOW_MULTI_SELECT" => "Y",
											"CHILD_MENU_TYPE" => "left",
											"COMPONENT_TEMPLATE" => "sections_menu",
											"DELAY" => "N",
											"MAX_LEVEL" => "4",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_USE_GROUPS" => "N",
											"CACHE_SELECTED_ITEMS" => "Y",
											"MENU_THEME" => "site",
											"ROOT_MENU_TYPE" => "left",
											"USE_EXT" => "Y",
											"COMPOSITE_FRAME_MODE" => "A",
											"COMPOSITE_FRAME_TYPE" => "AUTO"
										),
										false,
										array(
											"ACTIVE_COMPONENT" => "Y"
										)
									);?>
								</nav>
								<?if($sidebarAction=='Y'):?>
								<div class="sidebar-action-box">
									<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."includes/sidebar_action.php"), false);?>
								</div>
								<?endif;?>
								<?if($sidebarReview=='Y'):?>
								<div class="sidebar-review-box">
									<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."includes/sidebar_otzyv.php"), false);?>
								</div>
								<?endif;?>
								<?if($sidebarPhoto=='Y'):?>
								<div class="sidebar-photo-box">
									<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."includes/sidebar_our_work.php"), false);?>
								</div>
								<?endif;?>
								<?if($sidebarNews=='Y'):?>
								<div class="sidebar-news-box">
									<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."includes/sidebar_news.php"), false);?>
								</div>
								<?endif;?>
								<?if($sidebarFixed=='Y'):?>
								<div id="sidebar_fixed">
									<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."includes/sidebar_fixed.php"), false);?>
								</div>
								<?endif;?>
							</div>
						</div>
						<?endif;?>
						<div class="content-box">
							<?if(!CSite::InDir(SITE_DIR.'index.php')):?>
										<div class="breadcrumb">
											<?$APPLICATION->IncludeComponent(
												"bitrix:breadcrumb",
												".default",
												array(
													"START_FROM" => "0",
													"PATH" => "",
													"SITE_ID" => "-",
												),
												false
											);?>
										</div>
										<h1><?$APPLICATION->ShowTitle(false);?></h1>
							<?else:?>
							<?@include(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'/index_main_blocks.php'));?>
							<?endif;?>

