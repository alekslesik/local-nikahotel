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
		<div class="section-advantage__box-items">
			<div class="row">
				<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="<?if($arParams["BLOCK_VIEW"] == "Y"):?>col-lg-4 <?endif;?>col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="section-advantage__box-item">
						<?if($arItem["PROPERTIES"]["ATT_ICON_IMG"]["VALUE"]):?>
						<?if($arItem["PREVIEW_PICTURE"]):?>
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>60, 'height'=>60), BX_RESIZE_IMAGE_EXACT, true);               
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="section-advantage__icon-img">';
						?>
						<?endif;?>
						<?else:?> 
						<div class="section-advantage__icon-fa<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-advantage__icon-fa-small<?endif;?>">
							<i class="fa fa-check" aria-hidden="true"></i>
						</div>
						<?endif;?>
						<div class="section-advantage__advantage">
							<div class="section-advantage__advantage-title">
								<?if($arItem["PROPERTIES"]["ATT_LINK"]["VALUE"]):?>
								<a href="<?=$arItem["PROPERTIES"]["ATT_LINK"]["VALUE"];?> " class="section-advantage__link">
									<?=$arItem["NAME"]?>
								</a>
								<?else:?> 
								<?=$arItem["NAME"]?>
								<?endif;?>
							</div>
							<div class="section-advantage__advantage-desc">
								<?if($arItem["PREVIEW_TEXT"]):?>
								<?=$arItem["PREVIEW_TEXT"]?>
								<?endif;?>
							</div>
						</div>
					</div>
				</div>
				<?endforeach;?>
			</div>
		</div>
		<?if($arParams["BLOCK_LINK_TEXT"]) :?>
		<div class="row">
			<div class="col">
				<div class="section-advantage__img-line">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="section-advantage__box-link">
					<a data-fancybox="" data-src="#form-popup-request" href="javascript:;" class="section-advantage__link btn-link open-popup-link">
					<?=$arParams["BLOCK_LINK_TEXT"];?></a>
				</div>
			</div>
		</div>
		<?endif;?>
	</div>
</div>




