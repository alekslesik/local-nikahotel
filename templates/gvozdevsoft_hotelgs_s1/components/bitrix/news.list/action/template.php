<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="action-list">
	<div class="row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-md-6 action-list__col" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="action-list__item">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["PREVIEW_PICTURE"]):?>
				<div class="action-list__img">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>350), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" class="action-list__img-img">';
						?>
					</a>
				</div>
				<?endif;?>
				<div class="action-list__text-box">
					<?if(!empty($arItem["DISPLAY_PROPERTIES"]["DATE_STOP"]["VALUE"])):?>
					<div class="action-list__data-stop">
						<?=GetMessage("ACTION_USLOVIE")?><?echo $arItem["DISPLAY_PROPERTIES"]["DATE_STOP"]["VALUE"];?>
					</div>
					<?endif;?>
					<div class="action-list__link">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="action-list__link-link"><?=$arItem["NAME"]?></a>
					</div>
					<div class="action-list__text">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
