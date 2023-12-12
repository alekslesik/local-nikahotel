<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="personal-detail">
	<div class="row">
		<?if($arResult["DETAIL_PICTURE"]):?>
		<div class="col-md-4">
			<div class="personal-detail__item">
				<?
				$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>640, 'height'=>700), BX_RESIZE_IMAGE_PROPORTIONAL, true);                
				echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'"  title="'.$arResult["NAME"].'" class="personal-detail__img">';
				?>
			</div>
		</div>
		<?endif;?>
		<div class="col">
			<div class="personal-detail__text">
				<div class="personal-detail__name">
					<?if($arResult["DISPLAY_PROPERTIES"]["ATT_NAME"]["VALUE"]):?>
					<?=$arResult["DISPLAY_PROPERTIES"]["ATT_NAME"]["VALUE"];?>
					<?endif;?>
				</div>
				<div class="personal-detail__position">
					<?if($arResult["DISPLAY_PROPERTIES"]["ATT_POSITION"]["VALUE"]):?>
					<?=$arResult["DISPLAY_PROPERTIES"]["ATT_POSITION"]["VALUE"];?>
					<?endif;?>
				</div>
				<div class="personal-detail__description">
					<?if($arResult["DISPLAY_PROPERTIES"]["ATT_DESCRIPTION"]["VALUE"]):?>
					<?=$arResult["DISPLAY_PROPERTIES"]["ATT_DESCRIPTION"]["VALUE"];?>
					<?endif;?>
				</div>
				<div class="personal-detail__email">
					<?if($arResult["DISPLAY_PROPERTIES"]["ATT_EMAIL"]["VALUE"]):?>
					<i class="fa fa-envelope" aria-hidden="true"></i><?=$arResult["DISPLAY_PROPERTIES"]["ATT_EMAIL"]["VALUE"];?>
					<?endif;?>
				</div>
				<div class="personal-detail__phone">
					<?if($arResult["DISPLAY_PROPERTIES"]["ATT_PHONE"]["VALUE"]):?>
					<i class="fa fa-phone" aria-hidden="true"></i><?=$arResult["DISPLAY_PROPERTIES"]["ATT_PHONE"]["VALUE"];?>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
	<?if($arResult["DETAIL_TEXT"]):?>
	<div class="row">
		<div class="col">
			<div class="personal-detail__text2">
				<?=$arResult["DETAIL_TEXT"];?>
			</div>
		</div>
	</div>
	<?endif?>
</div>



