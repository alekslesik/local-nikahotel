<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="<?if($arParams["BLOCK_BACKGROUND"] == "Y"):?>section-bg <?endif;?><?if($arParams["BLOCK_BORDER_BOTTOM"] == "Y"):?>section-border-bottom <?endif;?>section-padding-55">
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
		<div class="section-company__box-metric">
			<div class="row align-items-center">
				<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="col-lg col-md-6 pt-15 pb-15" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="section-company__metric">
						<?if($arItem["PROPERTIES"]["ATT_ICON"]["VALUE"]):?>
						<div class="section-company__metric-img">
							<?if($arItem["PREVIEW_PICTURE"]):?>
							<?
							$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>65, 'height'=>65), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" />';
							?>
							<?endif;?>
						</div>
						<?else:?>
						<div class="section-company__metric-nomber">
							<?if($arItem["PROPERTIES"]["ATT_NUMBER"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_NUMBER"]["~VALUE"];?>
							<?endif;?>
						</div>
						<?endif?>
						<div class="section-company__metric-text">
							<div class="section-company__metric-title">
								<?if($arItem["PROPERTIES"]["ATT_LINK"]["VALUE"]):?>
								<a href="<?=$arItem["PROPERTIES"]["ATT_LINK"]["VALUE"];?> " class="section-company__metric-link">
									<?=$arItem["NAME"]?>
								</a>
								<?else:?>
								<?=$arItem["NAME"]?>
								<?endif;?>
							</div>
							<?if($arItem["PREVIEW_TEXT"]):?>
							<div class="section-company__metric-desc">
								<?=$arItem["PREVIEW_TEXT"]?>
							</div>
							<?endif;?>
						</div>
					</div>
				</div>
				<?endforeach;?>
			</div>
		</div>
		<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]) :?>
		<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>" class="section-link-all-center">
				<?=$arParams["BLOCK_LINK_TEXT"];?>
		</a>
		<?endif;?>
	</div>
</div>




