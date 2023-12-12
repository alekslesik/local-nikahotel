<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="sidebar-news">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="sidebar-news__item">
			<?if($arItem["PREVIEW_PICTURE"]):?>
			<div class="sidebar-news__img-box">
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
					<?
					$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_EXACT, true);                
					echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" class="sidebar-news__img-img">';
					?>
				</a>
			</div>
			<?endif?>
			<div class="sidebar-news__text-box">
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<div class="sidebar-news__date">
					<?=$arItem["DISPLAY_ACTIVE_FROM"]?>
				</div>
				<?endif?>
				<div class="sidebar-news__link-box">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="sidebar-news__link-link">
						<?=$arItem["NAME"]?>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?endforeach;?>
</div>
