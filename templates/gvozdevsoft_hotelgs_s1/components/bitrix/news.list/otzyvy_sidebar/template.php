<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="sidebar-review owl-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="sidebar-review__date-name">
			<div class="sidebar-review__name">
				<?echo $arItem["NAME"]?>
			</div>
			<div class="sidebar-review__date">
				<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
			</div>
		</div>
		<div class="sidebar-review__text">
			<?echo $arItem["PREVIEW_TEXT"];?>
		</div>
	</div>
	<?endforeach;?>
</div>

