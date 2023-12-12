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
				<div class="col-lg section-slider2 owl-carousel">
					<?else:?>
					<div class="section-block-row">
						<div class="row">
							<?endif;?>
							<?foreach($arResult["ITEMS"] as $arItem):?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<div <?if($arParams["BLOCK_VIEW"] == "N"):?>class="col-md-4 mb-30" <?endif;?>id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								<div class="rooms-section-tile__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>">
									<div class="rooms-section-tile__promo-box">
										<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
										<div class="rooms-section-tile__promo-action">
											<?=$arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
										</div>
										<?endif;?>
										<?if($arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
										<div class="rooms-section-tile__promo-sale">
											<?=$arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
										</div>
										<?endif;?>
									</div>
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
										<div class="rooms-section-tile__img-box">
											<?if($arItem["PREVIEW_PICTURE"]):?>
											<?
											$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);               
											echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="rooms-section-tile__img-img">';
											?>
											<?endif;?>
											<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
											<?endif;?>
										</div>
									</a>
									<div class="rooms-section-tile__text-box">
										<div class="rooms-section-tile__title">
											<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="rooms-section-tile__title-link">
												<?=$arItem["NAME"]?>
											</a>
										</div>
										<div class="rooms-section-tile__param-box">
											<?if($arItem["PROPERTIES"]["ATT_PERSON"]["VALUE"]):?>
											<div class="rooms-section-tile__param">
												<?=$arItem["PROPERTIES"]["ATT_PERSON"]["VALUE"]?>
											</div>
											<?endif;?>
											<?if($arItem["PROPERTIES"]["ATT_SQUARE"]["VALUE"]):?>
											<div class="rooms-section-tile__param">
												<?=$arItem["PROPERTIES"]["ATT_SQUARE"]["VALUE"]?>
											</div>
											<?endif;?>
										</div>
										<div class="rooms-section-tile__price-box">
											<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
											<div class="rooms-section-tile__price-ot">
												<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
											</div>
											<?endif;?>
											<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
											<div class="rooms-section-tile__price-now">
												<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
												<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
												<span class="rooms-section-tile__price-rub">
													<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
												</span>
												<?endif;?>
											</div>
											<?endif;?>
											<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
											<div class="rooms-section-tile__price-old">
												<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
												<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
												<?endif;?>
												<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?></span>
												<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
													<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
												<?endif;?>
											</div>
											<?endif;?>
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









