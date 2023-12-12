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
							<div <?if($arParams["BLOCK_VIEW"] == "N"):?>class="col-lg-4 col-md-6 mb-30" <?endif;?>id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								<div class="section-action__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>">
									<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["PREVIEW_PICTURE"]):?>
									<div class="section-action__img">
										<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
											<?
											$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>350), BX_RESIZE_IMAGE_EXACT, true);                
											echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" class="section-action__img-img">';
											?>
										</a>
									</div>
									<?endif;?>
									<div class="section-action__text-box">
										<?if(!empty($arItem["DISPLAY_PROPERTIES"]["DATE_STOP"]["VALUE"])):?>
										<div class="section-action__data-stop">
											<?=GetMessage("ACTION_USLOVIE")?><?echo $arItem["DISPLAY_PROPERTIES"]["DATE_STOP"]["VALUE"];?>
										</div>
										<?endif;?>
										<div class="section-action__link">
											<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="section-action__link-link"><?=$arItem["NAME"]?></a>
										</div>
										<div class="section-link-more">
											<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="section-link-more__link">
												<?=GetMessage("LINK_MORE")?>		
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

