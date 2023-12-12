<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="portfolio-projects-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="portfolio-projects-list__item"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="row">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="col-md-5">
				<div class="portfolio-projects-list__img">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="portfolio-projects-list__img-link">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'"  title="'.$arItem["NAME"].'" class="portfolio-projects-list__img-img">';
						?>
					</a>
				</div>
			</div>
			<?endif?>
			<div class="col-md">
				<div class="portfolio-projects-list__text">
					<h2 class="portfolio-projects-list__title">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="portfolio-projects-list__title-link">
							<?=$arItem["NAME"]?>
						</a>
					</h2>
					<?if($arItem["PREVIEW_TEXT"]):?>
					<div class="portfolio-projects-list__preview-text">
						<?=$arItem["PREVIEW_TEXT"];?>
					</div>
					<?endif;?>
					<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					<div class="portfolio-projects-list__properties">
						<div class="portfolio-projects-list__properties-name">
							<?=$arProperty["NAME"]?>
						</div>
						<div class="portfolio-projects-list__parameter-line"></div>
						<div class="portfolio-projects-list__properties-value">
							<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
							<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
							<?else:?>
							<?=$arProperty["DISPLAY_VALUE"];?>
							<?endif?>
						</div>
					</div>
					<?endforeach;?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="btn-link portfolio-projects-list__link-more"><?=GetMessage("BTN_MORE")?></a>
				</div>
			</div>
		</div>
	</div>
	<?endforeach;?>	
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>