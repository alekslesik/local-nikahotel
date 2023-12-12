<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="action-detail">
	<? if ($arResult["DISPLAY_PROPERTIES"]['DATE_STOP']):?>
		<div class="action-detail__data-stop">
			<?=GetMessage("ACTION_USLOVIE")?><?=$arResult["PROPERTIES"]["DATE_STOP"]["VALUE"];?>
		</div>
		<?endif;?>
		<?if($arResult["DETAIL_PICTURE"]):?>
		<div class="action-detail__img">
			<?
			$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>1000, 'height'=>500), BX_RESIZE_IMAGE_EXACT, true);                
			echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'"  title="'.$arResult["NAME"].'" action-detail__img-img>';
			?>
		</div>
		<?endif;?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1><?=$arResult["NAME"]?></h1>
		<?endif;?>
		<?if($arResult["DETAIL_TEXT"]):?>
		<?=$arResult["DETAIL_TEXT"];?>
		<?else:?>
		<?=$arResult["PREVIEW_TEXT"];?>
		<?endif?>
	</div>

