<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="row">
			<div class="col-lg-8 mb-30">
				<div class="news-list__text">
					<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<div class="news-list__date">
						<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
					</div>
					<?endif?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="news-list__title-link">
						<h2 class="news-list__title">
							<?=$arItem["NAME"]?>
						</h2>
					</a>
					<?if($arItem["PREVIEW_TEXT"]):?>
					<div class="news-list__text">
						<?=$arItem["PREVIEW_TEXT"];?>
					</div>
					<?endif;?>
					<div class="news-list__btn">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="btn-link news-list__btn-more"><?=GetMessage("BTN_MORE")?></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-30">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<div class="news-list__img">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="news-list__img-img">';
						?>
					</a>
				</div>
				<?endif?>
			</div>
		</div>
	</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
