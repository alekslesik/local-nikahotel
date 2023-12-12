<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="borderbx">
<?if($arParams["USE_RSS"]=="Y"):?>
<?
$rss_url = CComponentEngine::makePathFromTemplate($arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss_section"], array_map("urlencode", $arResult["VARIABLES"]));
if(method_exists($APPLICATION, 'addheadstring'))
	$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$rss_url.'" href="'.$rss_url.'" />');
?>
<a href="<?=$rss_url?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>
<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
	$component
);?>
<br />
<?endif?>
<?if($arParams["SECTION_ELEMENTS"] == "Y"):?>
<?
$arSelect = Array("ID");
$arFilter = Array("IBLOCK_ID"=>IntVal($arParams['IBLOCK_ID']), "SECTION_ID"=>$arResult['VARIABLES']['SECTION_ID'], "INCLUDE_SUBSECTIONS" => "N", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$arrID = array();
while($ob = $res->GetNext())
{
	$arrID[] = $ob["ID"];
}
global $arrFilter;
if(empty($arrID)){
	$arrFilter["ID"] = "noelem";
}else{
	$arrFilter["ID"] = $arrID;
}
?>
<?if(!empty($arrID)):?>
<div class="search-catalog">
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.smart.filter", 
		"filter_catalog", 
		array(
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO",
			"DISPLAY_ELEMENT_COUNT" => "Y",
			"FILTER_NAME" => "arrFilter",
			"FILTER_VIEW_MODE" => "vertical",
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"IBLOCK_TYPE" => "gs_news",
			"PAGER_PARAMS_NAME" => "arrPager",
			"POPUP_POSITION" => "left",
			"SAVE_IN_SESSION" => "N",
			"SECTION_CODE" => "",
			"SECTION_DESCRIPTION" => "-",
			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SHOW_ALL_WO_SECTION" => "N",
			"SECTION_TITLE" => "-",
			"SEF_MODE" => "N",
			"TEMPLATE_THEME" => "blue",
			"XML_EXPORT" => "N",
			"COMPONENT_TEMPLATE" => "filter_catalog",
			"SEF_RULE" => "/catalog/filter/#SMART_FILTER_PATH#/apply/",
			"SECTION_CODE_PATH" => "",
			"SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
			"PREFILTER_NAME" => "arrFilter"
		),
		false
	);?>
</div>
<?endif?>
<?else:?>
<div class="search-catalog">
	<?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "filter_catalog", array(
	"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_VIEW_MODE" => "vertical",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => "gs_news",
		"PAGER_PARAMS_NAME" => "arrPager",
		"POPUP_POSITION" => "left",
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" => "",
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SHOW_ALL_WO_SECTION" => "N",
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "N",
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N",
		"COMPONENT_TEMPLATE" => "filter_catalog",
		"SEF_RULE" => "/catalog/filter/#SMART_FILTER_PATH#/apply/",
		"SECTION_CODE_PATH" => "",
		"SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
		"PREFILTER_NAME" => "arrFilter"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
</div>
<?endif?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"razvlech",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => "Y",//$arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => 1, //$arParams["SECTION_TOP_DEPTH"]
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
		"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
		"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
		"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
	),
	$component,
	array()
);?>
<?
if (isset($_GET['sort']) && isset($_GET['order']))
{
	$SORT = $_SESSION['CATALOG_SORT'] = $_GET['sort'];
	$ORDER = $_SESSION['CATALOG_ORDER'] = $_GET['order'];
}
else if (isset($_SESSION['CATALOG_SORT']) && isset($_SESSION['CATALOG_ORDER']))
{
	$SORT = $_SESSION['CATALOG_SORT'];
	$ORDER = $_SESSION['CATALOG_ORDER'];
}
else
{
	$SORT = $_SESSION['CATALOG_SORT'] = 'popular';
	$ORDER = $_SESSION['CATALOG_ORDER'] = 'asc';
}
$ELEMENT_SORT_FIELD = $SORT;
if ($ELEMENT_SORT_FIELD === 'price') $ELEMENT_SORT_FIELD = 'PROPERTY_ATT_PRICE';
else if ($ELEMENT_SORT_FIELD === 'popular') $ELEMENT_SORT_FIELD = 'SORT'; //'SHOW_COUNTER';
else if ($ELEMENT_SORT_FIELD === 'name') $ELEMENT_SORT_FIELD = 'NAME';
$ELEMENT_SORT_ORDER = $ORDER;
if (isset($_GET['display']))
{
	$DISPLAY = $_SESSION['DISPLAY'] = $_GET['display'];
}
else if (isset($_SESSION['DISPLAY']))
{
	$DISPLAY = $_SESSION['DISPLAY'];
}
else
{
	$DISPLAY = $_SESSION['DISPLAY'] = "tile";
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"razvlech",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $ELEMENT_SORT_FIELD,
		"SORT_ORDER1" => $ELEMENT_SORT_ORDER,
		"SORT_BY2" => $ELEMENT_SORT_FIELD,
		"SORT_ORDER2" => $ELEMENT_SORT_ORDER,
		"SORT" => $SORT,
		"ORDER" => $ORDER,
		"DISPLAY" => $DISPLAY,
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => "N",//$arParams["ADD_SECTIONS_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"CART_LIST" => $arParams["CART_LIST"],
	),
	$component
);?>
	<div class="mt-20">
		<?
		$sectionResult = CIBlockSection::GetList(array(),array('IBLOCK_ID' => $arParams ['IBLOCK_ID'], '=CODE' => $arResult['VARIABLES']['SECTION_CODE']), false, $arSelect = array('DESCRIPTION','DETAIL_PICTURE'));
		?>
		<?
		if ($sectionProp = $sectionResult -> GetNext())
		{?>
		<?print_r($sectionProp['DESCRIPTION']);?>
		<?}?>
	</div>
</div>
