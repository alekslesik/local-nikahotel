<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="portfolio-list">
	<div class="row">
		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
		<?endif;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-md-4 col-sm-6 mb-30">
			<div class="portfolio-list__item"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">

				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>

				<div class="portfolio-list__img">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="portfolio-list__img-link">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'"  title="'.$arItem["NAME"].'" class="portfolio-list__img-img">';
						?>
					</a>
				</div>
				<div class="portfolio-list__title">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="portfolio-list__title-link">
						<?=$arItem["NAME"]?>
					</a>
				</div>

				<?endif?>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
