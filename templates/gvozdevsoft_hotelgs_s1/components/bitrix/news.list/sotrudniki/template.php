<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="personal-news-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="personal-news-list__box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="row">
			<div class="col-md-3 mb-30">
				<div class="personal-news-list__img">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>800), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="personal-news-list__img-img">';
						?>
					</a>
					<?endif?>
				</div>
			</div>
			<div class="col-lg-8 col-md-9 mb-30">
				<div class="personal-news-list__text">
					<div class="personal-news-list__name">
						<?if($arItem["DISPLAY_PROPERTIES"]["ATT_NAME"]["VALUE"]):?>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
							<?=$arItem["DISPLAY_PROPERTIES"]["ATT_NAME"]["VALUE"];?>
						</a>
						<?endif;?>
					</div>
					<div class="personal-news-list__position">
						<?if($arItem["DISPLAY_PROPERTIES"]["ATT_POSITION"]["VALUE"]):?>
						<?=$arItem["DISPLAY_PROPERTIES"]["ATT_POSITION"]["VALUE"];?>
						<?endif;?>
					</div>
					<div class="personal-news-list__description">
						<?if($arItem["DISPLAY_PROPERTIES"]["ATT_DESCRIPTION"]["VALUE"]):?>
						<?=$arItem["DISPLAY_PROPERTIES"]["ATT_DESCRIPTION"]["VALUE"];?>
						<?endif;?>
					</div>
					<div class="personal-news-list__email">
						<?if($arItem["DISPLAY_PROPERTIES"]["ATT_EMAIL"]["VALUE"]):?>
						<i class="fa fa-envelope" aria-hidden="true"></i><?=$arItem["DISPLAY_PROPERTIES"]["ATT_EMAIL"]["VALUE"];?>
						<?endif;?>
					</div>
					<div class="personal-news-list__phone">
						<?if($arItem["DISPLAY_PROPERTIES"]["ATT_PHONE"]["VALUE"]):?>
						<i class="fa fa-phone" aria-hidden="true"></i><?=$arItem["DISPLAY_PROPERTIES"]["ATT_PHONE"]["VALUE"];?>
						<?endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?endforeach;?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

