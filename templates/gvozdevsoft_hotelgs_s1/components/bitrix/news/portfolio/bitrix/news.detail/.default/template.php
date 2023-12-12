<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$this->setFrameMode(true);
?>
<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
	<h1><?=$arResult["NAME"]?></h1>
<?endif;?>
<div id="portfolio_photo">
	<div class="fotogallery_block gallery img_zoom">
		<ul>
			<?if($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"]):?>
				<?foreach($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $item):?>
					<? $img = CFile::GetFileArray($item); ?>
					<li>
						<a href="<?=$img["SRC"]?>"><img src="<?=$img["SRC"]?>" width="<?=$img["WIDTH"]?>" height="<?=$img["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" /></a>
					</li>
				<?endforeach;?>
			<?endif;?>
		</ul>
	</div>
</div>