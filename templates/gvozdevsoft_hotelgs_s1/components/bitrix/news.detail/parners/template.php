<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="partners-detail">
	<div class="row">
		<?if($arResult["DETAIL_PICTURE"]):?>
		<div class="col-md-3">
			<div class="partners-detail__item">
				<?
				$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, true);                
				echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'"  title="'.$arResult["NAME"].'" class="partners-detail__img">';
				?>
			</div>
		</div>
		<?endif;?>
		<?if($arResult["PREVIEW_TEXT"]):?>
		<div class="col">
			<div class="partners-detail__text">
				<?=$arResult["PREVIEW_TEXT"];?>
			</div>
		</div>
		<?endif?>
	</div>
	<?if($arResult["DETAIL_TEXT"]):?>
	<div class="row">
		<div class="col">
			<div class="partners-detail__text2">
				<?=$arResult["DETAIL_TEXT"];?>
			</div>
		</div>
	</div>
	<?endif?>
</div>

