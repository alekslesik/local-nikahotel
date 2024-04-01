<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<h2 class="h2-section"><?=GetMessage("POPULAR")?></h2>
<div class="services-view-tile">
	<div class="row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-md-4 services-view-tile__col" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="services-view-tile__item">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["PREVIEW_PICTURE"]):?>
				<div class="services-view-tile__img">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="services-view-tile__img-link">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="services-view-tile__img-img">';
						?>
					</a>
				</div>
				<?endif;?>
				<div class="services-view-tile__text">
					<div class="services-view-tile__title-popular">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-view-tile__title-link">
							<?=$arItem["NAME"]?>
						</a>
					</div>
					<div class="services-view-tile__price">
						<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
						<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
						<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"];?> 
						<?endif?>
						<div class="services-view-tile__price-price">
							<?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"];?>
						</div>
						<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
						<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"];?> 
						<?endif?>
						<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
						<div class="services-view-tile__price-old">
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
							<?endif;?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
							<?endif;?>
						</div>
						<?endif;?>
						<?endif?>
					</div>
					<div class="services-view-tile__btn">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-view-tile__btn-link btn-link">
							<?=GetMessage("BTN_MORE")?>
						</a>
					</div>	
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>