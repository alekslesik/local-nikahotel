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
							<div class="<?if($arParams["BLOCK_VIEW"] == "N"):?>col-xl-4 col-lg-4 col-md-6 mb-30 <?endif;?>section-tariff" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								<div class="section-tariff__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>">
									<?if($arItem["PREVIEW_PICTURE"]):?>
									<div class="section-tariff__img-box">
											<?
											$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
											echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" class="section-tariff__img-img">';
											?>
									</div>
									<?endif?>
									<div class="section-tariff__text">
										<div class="section-tariff__title">
											<?=$arItem["NAME"]?>
										</div>
										<div class="section-tariff__price">
											<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
											<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"];?> 
											<?endif?>
											<span class="section-tariff__price-price">
												<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
												<?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"];?> 
												<?endif?>
											</span>
											<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
											<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"];?> 
											<?endif?>
											<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
											<div class="section-tariff__price-old">
												<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
												<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
												<?endif;?>
												<?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?>
												<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
												<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
												<?endif;?>
											</div>
											<?endif;?>
										</div>
										<div class="section-tariff__work">
											<?if($arItem["PROPERTIES"]["ATT_WORK_MAIN"]["VALUE"]):?>
											<?=htmlspecialcharsBack($arItem["PROPERTIES"]["ATT_WORK_MAIN"]["VALUE"]["TEXT"]);?>
											<?endif;?>
										<?/*<div class="qqq" class="section-tariff__hide">
											<?if($arItem["PROPERTIES"]["ATT_WORK_HIDE"]["VALUE"]):?>
											<?=htmlspecialcharsBack($arItem["PROPERTIES"]["ATT_WORK_HIDE"]["VALUE"]["TEXT"]);?>
											<?endif;?>
											</div>*/?>
										</div>
										<div class="section-tariff__link-box">
											<a data-fancybox data-src="#form-popup-request" href="javascript:;" class="section-tariff__link-link"><?=GetMessage("BTN_REQUEST")?></a>
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
		