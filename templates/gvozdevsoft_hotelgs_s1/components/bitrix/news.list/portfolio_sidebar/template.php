<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="sidebar-portfolio owl-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arItem["PREVIEW_PICTURE"]):?>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
			<?
			$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>248, 'height'=>175), BX_RESIZE_IMAGE_EXACT, true);                
			echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" />';
			?>
		</a>
		<?endif;?>
	</div>
	<?endforeach;?>
</div>

