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
		<div class="section-company__box-company">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="row">	
					<div class="col-auto section-company__col-img">	
						<div class="section-company__box-img">
							<?if($arItem["PROPERTIES"]["ATT_VIDEO_IMG"]["VALUE_XML_ID"] == "data_video"):?>
								<?$video = CFile::GetPath($arItem["PROPERTIES"]["ATT_VIDEO"]["VALUE"]);?>
								<div class="section-company__img video-bg">
									<div class="video-bg__box">
										<video src="<?=$video;?>" loop muted autoplay playsinline class="video-bg__video video-bg__video-company"></video>
									</div>
								</div>
								<?else:?>
								<?if($arItem["PREVIEW_PICTURE"]):?>
								<?
								$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>390, 'height'=>325), BX_RESIZE_IMAGE_EXACT, true);                
								echo '<div class="section-company__img" style="background-image: url('.$file['src'].');"></div>';
								?>
								<?endif;?>
							<?endif;?>		
							<?if($arItem["PROPERTIES"]["ATT_IMG_TEXT"]["VALUE"]):?>
							<div class="section-company__img-title">
								<?=$arItem["PROPERTIES"]["ATT_IMG_TEXT"]["VALUE"];?> 
							</div>
							<?endif;?>
						</div>
					</div>
					<div class="col-lg">
						<div class="section-company__box-text">
							<div class="section-company__title">
								<h1><?=$arItem["NAME"]?></h1>
							</div>
							<div class="section-company__text">
								<?= $arItem["PREVIEW_TEXT"];?>
							</div>
							<?if($arItem["PROPERTIES"]["ATT_LINK"]["VALUE"]):?>
							<div class="section-company__more">
								<a href="<?=$arItem["PROPERTIES"]["ATT_LINK"]["VALUE"];?>" class="section-company__more-link link-dotted">
									<?if($arItem["PROPERTIES"]["ATT_MORE_TEXT"]["VALUE"]):?>
									<?=$arItem["PROPERTIES"]["ATT_MORE_TEXT"]["VALUE"];?>
									<?endif;?>
								</a>
							</div>
							<?endif;?>
						</div>
					</div>
				</div>
			</div>
			<?endforeach;?>	
		</div>
		<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]) :?>
		<div class="mt-50">
			<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>" class="section-link-all-center">
				<?=$arParams["BLOCK_LINK_TEXT"];?>
			</a>
		</div>
		<?endif;?>
	</div>
</div>




