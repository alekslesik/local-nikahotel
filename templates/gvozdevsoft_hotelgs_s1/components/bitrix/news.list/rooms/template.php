<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult['ITEMS']))
{
	$sorts = Array(
		Array('name' => GetMessage("SORT_POPULAR_DESC"), 'field' => 'popular', 'order' => 'desc'),
		Array('name' => GetMessage("SORT_PRICE_ASC"), 'field' => 'price', 'order' => 'asc'),
	);
	?>
	<div class="rooms-section__top-line">
		<div class='rooms-section__sort'>
			<div class='rooms-section__sort-text'>
				<?=GetMessage("SORT_TEXT")?>
			</div>
			<select onchange='document.location=this.value'>
				<?
				foreach ($sorts as $sort)
				{
					$url = $APPLICATION->GetCurPageParam('sort='.$sort['field'].'&order='.$sort['order'], Array('sort', 'order', 'PAGEN_1'));

					$selected = ($arParams['SORT'] === $sort['field'] && $arParams['ORDER'] === $sort['order'])?'selected':'';

					?><option value='<?=$url?>' <?=$selected?>><?=$sort['name']?></option><?
				}
				?>
			</select>
		</div>
		<div class='rooms-section__view'>
			<?
			foreach (Array('tile', 'list') as $display)
			{
				$active = ($arParams['DISPLAY'] === $display) ? 'active' : '';

				?><a href='./?display=<?=$display?>' class="rooms-section__view-<?=$display?> rooms-section__view-item <?=$active?>"></a><?
			}
			?>
		</div>
	</div>
	<div class="rooms-section__row rooms-section-<?=$arParams['DISPLAY']?>">
		<div class="row row-10">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if($arParams['DISPLAY'] == "tile"):?>
			<div class="col-lg-6 col-md-6 mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="rooms-section-tile__item">
					<div class="rooms-section-tile__promo-box">
						<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
						<div class="rooms-section-tile__promo-action">
							<?=$arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
						</div>
						<?endif;?>
						<?if($arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
						<div class="rooms-section-tile__promo-sale">
							<?=$arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
						</div>
						<?endif;?>
					</div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<div class="rooms-section-tile__img-box">
							<?if($arItem["PREVIEW_PICTURE"]):?>
							<?
							$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true);               
							echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="rooms-section-tile__img-img">';
							?>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
							<?endif;?>
						</div>
					</a>
					<div class="rooms-section-tile__text-box">
						<div class="rooms-section-tile__title">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="rooms-section-tile__title-link">
								<?=$arItem["NAME"]?>
							</a>
						</div>
						<div class="rooms-section-tile__param-box">
							<?if($arItem["PROPERTIES"]["ATT_PERSON"]["VALUE"]):?>
							<div class="rooms-section-tile__param">
								<?=$arItem["PROPERTIES"]["ATT_PERSON"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_SQUARE"]["VALUE"]):?>
							<div class="rooms-section-tile__param">
								<?=$arItem["PROPERTIES"]["ATT_SQUARE"]["VALUE"]?>
							</div>
							<?endif;?>
						</div>
						<div class="rooms-section-tile__price-box">
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<div class="rooms-section-tile__price-ot">
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
							<div class="rooms-section-tile__price-now">
								<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
								<span class="rooms-section-tile__price-rub">
									<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
								</span>
								<?endif;?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
							<div class="rooms-section-tile__price-old">
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
								<?endif;?>
								<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?></span>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
									<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
								<?endif;?>
							</div>
							<?endif;?>
						</div>
					</div>
				</div>
			</div>
			<?endif;?>
			<?if($arParams['DISPLAY'] == "list"):?>
			<div class="col-12 mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="row row-0 rooms-section-list__item">
					<div class="col-md-4">
						<div class="rooms-section-list__promo-box">
							<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
							<div class="rooms-section-list__promo-action">
								<?=$arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
							<div class="rooms-section-list__promo-sale">
								<?=$arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
							</div>
							<?endif;?>
						</div>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="rooms-section-list__img-box">
								<?if($arItem["PREVIEW_PICTURE"]):?>
								<?
								$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);               
								echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="rooms-section-list__img-img">';
								?>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
								<?endif;?>
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<div class="rooms-section-list__text-box">
							<div class="rooms-section-list__title">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="rooms-section-list__title-link">
									<?=$arItem["NAME"]?>
								</a>
							</div>
							<div class="rooms-section-list__param-box">
								<?if($arItem["PROPERTIES"]["ATT_PERSON"]["VALUE"]):?>
								<div class="rooms-section-list__param">
									<?=$arItem["PROPERTIES"]["ATT_PERSON"]["VALUE"]?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_SQUARE"]["VALUE"]):?>
								<div class="rooms-section-list__param">
									<?=$arItem["PROPERTIES"]["ATT_SQUARE"]["VALUE"]?>
								</div>
								<?endif;?>
							</div>
							<?if($arItem["PREVIEW_TEXT"]):?>
							<div class="rooms-section-list__desc-text">
								<?=$arItem["PREVIEW_TEXT"]?>
							</div>
							<?endif;?>
							<div class="rooms-section-list__price-box">
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
								<div class="rooms-section-list__price-ot">
									<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
								<div class="rooms-section-list__price-now">
									<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
									<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
									<span class="rooms-section-list__price-rub">
										<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
									</span>
									<?endif;?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
								<div class="rooms-section-list__price-old">
									<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
									<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
									<?endif;?>
									<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?></span>
									<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
										<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
									<?endif;?>
								</div>
								<?endif;?>
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
<div class="rooms-section__desc-section">
	<? $arSection  =  array ();
	if(is_array( $arResult ["SECTION"]["PATH"]) && (count( $arResult ["SECTION"]["PATH"]) > 0)) {
		$arSection  = end( $arResult["SECTION"]["PATH"]);}?>  
		<?if(isset($arSection ["DESCRIPTION"]) && (strlen($arSection ["DESCRIPTION"]) >  0)):?>  
		<?=$arSection ["DESCRIPTION"] ?>  
		<?endif;?>  
	</div>

