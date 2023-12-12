<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="<?if($arParams["BLOCK_BACKGROUND"] == "Y"):?>section-bg <?endif;?><?if($arParams["BLOCK_BORDER_BOTTOM"] == "Y"):?>section-border-bottom <?endif;?>section-padding">
	<div class="container">
		<?if($arParams["BLOCK_TITLE"]):?>
		<div class="section-main-page-title<?if($arParams["BLOCK_TITLE_ALIGN_LEFT"] == "Y"):?> section-title-align-left<?else:?> section-title-align-center<?endif;?>">
			<?=$arParams["BLOCK_TITLE"];?>
		</div>
		<?endif;?>
		<?if($arParams["BLOCK_DESC"]):?>
		<div class="section-main-page-desc<?if($arParams["BLOCK_TITLE_ALIGN_LEFT"] == "Y"):?> section-desc-align-left<?else:?> section-desc-align-center<?endif;?>">
			<?=$arParams["BLOCK_DESC"];?>
		</div>
		<?endif;?>
		<?if($arParams["BLOCK_VIEW"] == "Y"):?>
		<div class="section-slider-row">
			<div class="row">
				<div class="col-lg section-slider owl-carousel">
		<?else:?>
		<div class="section-block-row">
			<div class="row">
		<?endif;?>
					<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div <?if($arParams["BLOCK_VIEW"] == "N"):?>class="col-xl-3 col-lg-4 col-md-6 mb-30" <?endif;?>id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="services-view-tile__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>">
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
								<div class="services-view-tile__title">
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
			<?if($arParams["BLOCK_VIEW"] == "Y"):?>
			<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]):?>
			<div class="section-link-all">
				<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>">
					<?=$arParams["BLOCK_LINK_TEXT"];?>
				</a>
			</div>
			<?endif;?>
			</div>
			<?else:?>
			<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]):?>
			<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>" class="section-link-all-center">
				<?=$arParams["BLOCK_LINK_TEXT"];?>
			</a>
			<?endif;?>
			<?endif;?>
	</div>
</div>


