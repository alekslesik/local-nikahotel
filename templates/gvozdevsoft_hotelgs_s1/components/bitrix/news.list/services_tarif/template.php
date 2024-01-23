<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult['ITEMS']))
{
	$sorts = Array(
		Array('name' => GetMessage("SORT_POPULAR_DESC"), 'field' => 'popular', 'order' => 'desc'),
		Array('name' => GetMessage("SORT_PRICE_ASC"), 'field' => 'price', 'order' => 'asc'),
	);
	?>
	<div class="services-news-list">
	<div>
	<br>
	</div>
		<?if($arParams["ELEMENTS_VIEW"] == "list"):?><div class="services-news-list-list"><?else:?><div class="row"><?endif;?>
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if($arParams["ELEMENTS_VIEW"] == "tile"):?>
			<div class="col-xl-4 col-md-6 services-view-tile__col services-view-tile" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="services-view-tile__item">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["PREVIEW_PICTURE"]):?>
					<div class="services-view-tile__img">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="services-view-tile__img-link">
							<?
							$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
							echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="services-view-tile__img-img">';
							?>
						</a>
					</div>
					<?endif;?>
					<div class="services-view-tile__text">
						<div class="services-view-tile__title">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-view-tile__title-link">
								<?=$arItem["NAME"]?>
							</a>
						</div>
						<div class="services-view-tile__price">
							<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"];?> 
							<?endif?>
							<div class="services-view-tile__price-price">
								<?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"];?>
							</div>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"];?> 
							<?endif?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
							<div class="services-view-tile__price-old">
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
								<?endif;?>
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
								<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
								<?endif;?>
							</div>
							<?endif;?>
							<?endif?>
						</div>
						<div class="services-view-tile__btn">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-view-tile__btn-link btn-link">
								<?=GetMessage("BTN_MORE")?>
							</a>
						</div>	
					</div>
				</div>
			</div>
			<?else:?>
			<div class="mb-30" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="row services-view-list__item ">
					<div class="col-md-4">
						<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["PREVIEW_PICTURE"]):?>
						<div class="services-view-list__img">
							<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="services-view-list__img-link">
								<?
								$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
								echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="services-view-list__img-img">';
								?>
							</a>
						</div>
						<?endif;?>
					</div>
					<div class="col-md-8 mb-30">
						<div class="services-view-list__text">
							<div class="services-view-list__title">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-view-list__title-link">
									<?=$arItem["NAME"]?>
								</a>
							</div>
							<?if($arItem["PREVIEW_TEXT"]):?>
							<div class="services-view-list__desc-text">
								<?=$arItem["PREVIEW_TEXT"]?>
							</div>
							<?endif;?>
							<div class="services-view-list__price">
								<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"];?> 
								<?endif?>
								<div class="services-view-list__price-price">
									<?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"];?>
								</div>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
								<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"];?> 
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
								<div class="services-view-list__price-old">
									<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
									<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
									<?endif;?>
									<?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?>
									<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
									<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
									<?endif;?>
								</div>
								<?endif;?>
								<?endif?>
							</div>
							<div class="services-view-list__btn">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-view-list__btn-link btn-link">
									<?=GetMessage("BTN_MORE")?>
								</a>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<?endif;?>
			<?endforeach;?>
		</div>
	</div>


	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
	<?
}
else
{
	?><p><?=GetMessage("EMPTY");?></p><?
}
?>
