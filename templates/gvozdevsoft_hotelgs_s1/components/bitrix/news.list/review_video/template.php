<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="row">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="col-md-6 mb-30" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arItem["PROPERTIES"]["ATT_VIDEO_LINK"]["VALUE"]):?>
		<?if($arItem["PREVIEW_PICTURE"]):?>
		<div class="section-review__item">
			<a href="<?=$arItem["PROPERTIES"]["ATT_VIDEO_LINK"]["VALUE"]?>" class="section-review__link" data-fancybox>
				<div class="section-review__box-video">
					<?
					$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>430), BX_RESIZE_IMAGE_EXACT, true);               
					echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="section-review__img">';
					?>
					<div class="section-review__shadow-video"></div>
					<div class="section-review__icon-video"></div>
					<div class="section-review__desc-video">
						<?=$arItem["NAME"]?>
					</div>
				</div>
			</a>
		</div>
		<?endif;?>
		<?else:?>
		<?if($arItem["PREVIEW_PICTURE"]):?>
		<div class="section-review__item">
			<div class="section-review__box-video">
				<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" data-fancybox>
					<?
					$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>430), BX_RESIZE_IMAGE_EXACT, true);               
					echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="section-review__img">';
					?>
					<div class="section-review__shadow-video"></div>
					<div class="section-review__icon-photo"></div>
					<div class="section-review__desc-video">
						<?=$arItem["NAME"]?>
					</div>
				</a>
			</div>
		</div>
		<?endif;?>
		<?endif;?>
	</div>
	<?endforeach;?>
</div>
