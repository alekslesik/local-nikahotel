<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
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
		"DEFAULT" => "",
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
	"BLOCK_TITLE_ALIGN_LEFT" => Array(
		"NAME" => GetMessage("BLOCK_TITLE_ALIGN_LEFT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
);
?>
