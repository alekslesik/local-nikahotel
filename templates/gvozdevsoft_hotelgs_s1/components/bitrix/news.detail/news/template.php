<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-detail">
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
	<div class="news-detail__date">
		<?=$arResult["DISPLAY_ACTIVE_FROM"]?>
	</div>
	<?endif;?>
	<?if($arResult["DETAIL_PICTURE"]):?>
	<div class="news-detail__img">
		<?
		$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>1000, 'height'=>500), BX_RESIZE_IMAGE_EXACT, true);                
		echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'" title="'.$arResult["NAME"].'"  class="news-detail__img-img">';
		?>
	</div>
	<?endif?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
	<h1><?=$arResult["NAME"]?></h1>
	<?endif;?>
	<?if($arResult["DETAIL_TEXT"]):?>
	<?=$arResult["DETAIL_TEXT"];?>
	<?endif?>
</div>