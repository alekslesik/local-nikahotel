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
		<div class="row row-10">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="<?if($arItem["PROPERTIES"]["ATT_SIZE"]["VALUE"]=="1/3"):?>col-lg-4 <?endif;?><?if($arItem["PROPERTIES"]["ATT_SIZE"]["VALUE"]=="1/4"):?>col-lg-3 <?endif;?>col-md-6 pl-10 pr-10 mb-20" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="section-projects-list__box">
					<a href="<?=$arItem["PROPERTIES"]["ATT_LINK"]["VALUE"];?>" class="section-projects-list__link">
						<?if($arItem["PREVIEW_PICTURE"]):?>
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>350), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<div style="background-image: url('.$file['src'].');" class="section-projects-list__img"></div>';
						?>
						<div class="section-projects-list__shadow"></div>
						<div class="section-projects-list__text">
							<div class="section-projects-list__text-title">
								<?=$arItem["NAME"]?>
							</div>
						</div>
						<div class="section-projects-list__shadow-focus"></div>
						<div class="section-projects-list__btn-focus btn-link">
							<?=GetMessage("MESS_BTN_SHOW")?>
						</div>
						<?endif;?>
					</a>
				</div>
			</div>	
			<?endforeach;?>
		</div>
		<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]) :?>
		<div class="mt-30">
			<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>" class="section-link-all-center">
				<?=$arParams["BLOCK_LINK_TEXT"];?>
			</a>
		</div>
		<?endif;?>
	</div>
</div>










