<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
<?endif;?>
<div class="row">
	<div class="col">
		<div class="portfolio-detail">
			<div class="mygallery justified-gallery portfolio-detail__photo">
				<?if($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"]){
					foreach($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $item):?>
						<? $img = CFile::GetFileArray($item); ?>
						<a href="<?=$img["SRC"]?>" class="gallery" data-fancybox="gallery_portfolio">
							<img src="<?=$img["SRC"]?>" alt="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" title="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" class="portfolio-detail__photo-img">
						</a>
						<?endforeach?>
						<?}?>
					</div>
					<div class="portfolio-detail__desc">
						<?if($arResult["DETAIL_TEXT"]):?>
						<?=$arResult["DETAIL_TEXT"];?>
						<?endif;?>	
					</div>
				</div>
			</div>
		</div>