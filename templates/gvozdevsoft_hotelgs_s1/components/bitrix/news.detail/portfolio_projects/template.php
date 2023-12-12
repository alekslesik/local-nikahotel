<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
<h1><?=$arResult["NAME"]?></h1>
<?endif;?>
<div class="portfolio-projects-detail">
	<div class="portfolio-projects-detail__row-top">
		<div class="row">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<div class="col-md-6">
				<div class="portfolio-detai__img">
					<?
					$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_EXACT, true);                
					echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'" title="'.$arResult["NAME"].'" class="portfolio-projects-detail__img-img">';
					?>
				</div>
			</div>
			<?endif?>
			<div class="col-md">
				<div class="portfolio-projects-detail__text">
					<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					<div class="portfolio-projects-detail__properties">
						<div class="portfolio-projects-detail__properties-name">
							<?=$arProperty["NAME"]?>
						</div>
						<div class="portfolio-projects-detail__parameter-line"></div>
						<div class="portfolio-projects-detail__properties-value">
							<?if($arProperty["DISPLAY_VALUE"]):?>
							<?=$arProperty["DISPLAY_VALUE"];?>
							<?endif?>
						</div>
					</div>
					<?endforeach;?>
					<div class="portfolio-projects-detail__btn">
						<a data-fancybox data-src="#form-popup-estimate" href="javascript:;" class="portfolio-projects-detail__btn-link btn-link">
							<?=GetMessage("MESS_BTN")?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tabs">
		<ul>
			<li><?=GetMessage("PORTFOLIO_DETAIL")?></li>
			<li><?=GetMessage("PORTFOLIO_PHOTO")?></li>
		</ul>
		<div class="tabs_block">
			<div class="portfolio-projects-detail__tabs">
				<?echo $arResult["DETAIL_TEXT"];?>			
			</div>
			<div class="portfolio-projects-detail__tabs">
				<h2><?=GetMessage("PORTFOLIO_PHOTO")?></h2>
				<?if($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"]):?>
				<div class="mygallery justified-gallery">
					<?foreach($arResult["PROPERTIES"]["ATT_PHOTO"]["VALUE"] as $item):?>
					<? $img = CFile::GetFileArray($item); ?>
					<a href="<?=$img["SRC"]?>" class="gallery" data-fancybox="gallery_projects">
						<img src="<?=$img["SRC"]?>" alt="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" title="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" class="portfolio-projects-detail__photo-img">
					</a>
					<?endforeach;?>
				</div>
				<?endif;?>
			</div>
		</div>
	</div>
</div>