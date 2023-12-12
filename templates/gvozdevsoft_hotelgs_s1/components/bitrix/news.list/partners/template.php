<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="partners-list">
	<div class="row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-md-3 col-6 mb-30"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arItem["PREVIEW_PICTURE"]):?>
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="partners-list__item" title="<?=$arItem["NAME"]?>">
					<?
					$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
					echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="partners-list__img">';
					?>
			</a>
			<?endif;?>
		</div>
		<?endforeach;?>
	</div>
</div>




