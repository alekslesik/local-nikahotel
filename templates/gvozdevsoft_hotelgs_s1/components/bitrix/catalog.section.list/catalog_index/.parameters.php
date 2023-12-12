<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arViewModeList = array(
	'LIST' => GetMessage('CPT_BCSL_VIEW_MODE_LIST'),
	'LINE' => GetMessage('CPT_BCSL_VIEW_MODE_LINE'),
	'TEXT' => GetMessage('CPT_BCSL_VIEW_MODE_TEXT'),
	'TILE' => GetMessage('CPT_BCSL_VIEW_MODE_TILE')
);

$arTemplateParameters = array(
	'VIEW_MODE' => array(
		'PARENT' => 'VISUAL',
		'NAME' => GetMessage('CPT_BCSL_VIEW_MODE'),
		'TYPE' => 'LIST',
		'VALUES' => $arViewModeList,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'LINE',
		'REFRESH' => 'Y'
	),
	'SHOW_PARENT_NAME' => array(
		'PARENT' => 'VISUAL',
		'NAME' => GetMessage('CPT_BCSL_SHOW_PARENT_NAME'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y'
	),
	"BLOCK_TITLE" => Array(
		"NAME" => GetMessage("BLOCK_TITLE"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("BLOCK_TITLE_DEFAULT"),
	),
	"BLOCK_DESC" => Array(
		"NAME" => GetMessage("BLOCK_DESC"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("BLOCK_DESC_DEFAULT"),
	),
	"BLOCK_LINK_TEXT" => Array(
		"NAME" => GetMessage("BLOCK_LINK_TEXT"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("BLOCK_LINK_TEXT_DEFAULT"),
	),
	"BLOCK_LINK_LINK" => Array(
		"NAME" => GetMessage("BLOCK_LINK_LINK"),
		"TYPE" => "STRING",
		"DEFAULT" => "catalog/",
	),
	"BLOCK_BACKGROUND" => Array(
		"NAME" => GetMessage("BLOCK_BACKGROUND"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
	"BLOCK_BORDER_BOTTOM" => Array(
		"NAME" => GetMessage("BLOCK_BORDER_BOTTOM"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"BLOCK_VIEW" => Array(
		"NAME" => GetMessage("BLOCK_VIEW"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
	"BLOCK_TITLE_ALIGN_LEFT" => Array(
		"NAME" => GetMessage("BLOCK_TITLE_ALIGN_LEFT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
);

if (isset($arCurrentValues['VIEW_MODE']) && 'TILE' == $arCurrentValues['VIEW_MODE'])
{
	$arTemplateParameters['HIDE_SECTION_NAME'] = array(
		'PARENT' => 'VISUAL',
		'NAME' => GetMessage('CPT_BCSL_HIDE_SECTION_NAME'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'N'
	);
}
?>