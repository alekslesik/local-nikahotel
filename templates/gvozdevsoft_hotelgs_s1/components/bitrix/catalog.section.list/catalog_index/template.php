<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="<?if($arParams["BLOCK_BACKGROUND"] == "Y"):?>section-bg<?endif;?> <?if($arParams["BLOCK_BORDER_BOTTOM"] == "Y"):?>section-border-bottom<?endif;?> section-padding">
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
		<?if(count($arResult["SECTIONS"]) > 0):?>
				<?foreach($arResult["SECTIONS"] as $keySection => $arSection):
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));?>
				<div <?if($arParams["BLOCK_VIEW"] == "N"):?>class="col-xl-3 col-lg-4 col-md-6 mb-30" <?endif;?>id="<?=$this->GetEditAreaId($arSection['ID']);?>">
					<div class="section-catalog catalog-section-list__box<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>">
						<?if($arSection["PICTURE"]):?>
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="catalog-section-list__link">
							<span class="catalog-section-list__img"><?
							$file = CFile::ResizeImageGet(($arSection["PICTURE"]), array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);                
							echo '<img src="'.$file['src'].'" alt="'.$arSection["NAME"].'" title="'.$arSection["NAME"].'" class="catalog-section-list__img-img">';
						?></span>
						</a>
						<?endif;?>
						<div class="catalog-section-list__text">
							<div class="catalog-section-list__text-title">
								<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="catalog-section-list__link-title">
									<?=$arSection["NAME"]?>
								</a>
							</div>
							<div class="catalog-section-list__text-desc">
								<?=GetMessage("NEWS_PROJECTS_NAME")?> (<?=$arSection["ELEMENT_CNT"]?>)
							</div>
						</div>
					</div>
				</div>
			<?endforeach;?>
		<?endif;?>
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
