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
				<div class="col-lg section-slider-partners owl-carousel">
		<?else:?>
		<div class="section-block-row">
			<div class="row">
		<?endif;?>
					<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div <?if($arParams["BLOCK_VIEW"] == "N"):?>class="col-xl-2 col-lg-4 col-md-6 mb-30" <?endif;?>id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<?if($arItem["PREVIEW_PICTURE"]):?>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="partners-list__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>" title="<?=$arItem["NAME"]?>">
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
			<?if($arParams["BLOCK_VIEW"] == "Y"):?>
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




