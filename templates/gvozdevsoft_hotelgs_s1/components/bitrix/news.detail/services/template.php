<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div id="services-news-detail">
	<?if($arResult["DETAIL_PICTURE"]):?>
	<div class="services-news-detail__slider-box">
		<div class="row no-gutters">
			<div class="col-xl-7 col-md-6">
				<div class="services-news-detail__img-box">
					<?
					$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
					echo '<div class="services-news-detail__img-img" style="background-image: url('.$file['src'].');"></div>';
					?>
					<div class="services-news-detail__img-shadow"></div>
				</div>
			</div>
			<div class="col-xl-5 col-md-6">
				<div class="services-news-detail__form-box">
					
					<?if($arResult["PROPERTIES"]["ATT_FORM_TITLE"]["VALUE"]):?>
					<div class="services-news-detail__form-title">
						<?=$arResult["PROPERTIES"]["ATT_FORM_TITLE"]["~VALUE"]?>
					</div>
					<?endif;?>
					<!-- form -->
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."lib/feedback/forms/form_service_top.php"
						)
					);?> 
					<!-- /form -->
				</div>
			</div>
		</div>
	</div>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
	<h1><?=$arResult["NAME"]?></h1>
	<?endif;?>
	<?if($arResult["DETAIL_TEXT"]):?>
	<?=$arResult["DETAIL_TEXT"];?>
	<?endif;?>	
	<?if($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"]):?>
	<div class="services-news-detail__photo-box mt-70">
		<?if($arResult["PROPERTIES"]["ATT_TITLE_PHOTO"]["VALUE"]):?>
		<h2 class="h2-section">
			<?=$arResult["PROPERTIES"]["ATT_TITLE_PHOTO"]["VALUE"];?>
		</h2>
		<?endif;?>
		<div class="row">
			<div class="col">
				<div class="mygallery justified-gallery">
					<?if($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"]){
						foreach($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $item):?>
							<? $img = CFile::GetFileArray($item); ?>
							<a href="<?=$img["SRC"]?>" class="gallery" data-fancybox="gallery_services">
								<img src="<?=$img["SRC"]?>" alt="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" title="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" class="services-news-detail__photo-img">
							</a>
							<?endforeach?>
							<?}?>
						</div>
					</div>
				</div>
			</div>
			<?endif;?>
		</div>

