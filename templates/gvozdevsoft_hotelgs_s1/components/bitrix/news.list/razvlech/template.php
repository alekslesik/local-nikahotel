<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult['ITEMS']))
{

	$sorts = Array(
		Array('name' => GetMessage("SORT_POPULAR_ASC"), 'field' => 'popular', 'order' => 'asc'),
		Array('name' => GetMessage("SORT_PRICE_ASC"), 'field' => 'price', 'order' => 'asc'),
		Array('name' => GetMessage("SORT_PRICE_DESC"), 'field' => 'price', 'order' => 'desc'),
		Array('name' => GetMessage("SORT_NAME_ASC"), 'field' => 'name', 'order' => 'asc'),
		Array('name' => GetMessage("SORT_NAME_DESC"), 'field' => 'name', 'order' => 'desc'),
	);
	?>
	<div class="catalog-section__top-line">
		<div class='catalog-section__sort'>
			<div class='catalog-section__sort-text'>
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
		<div class='catalog-section__view'>
			<?
			foreach (Array('tile', 'list', 'price') as $display)
			{
				$active = ($arParams['DISPLAY'] === $display) ? 'active' : '';

				?><a href='./?display=<?=$display?>' class="catalog-section__view-<?=$display?> catalog-section__view-item <?=$active?>"></a><?
			}
			?>
		</div>
	</div>
	<div class="catalog-section__row catalog-section-<?=$arParams['DISPLAY']?>">
		<div class="row row-10">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if($arParams['DISPLAY'] == "tile"):?>
			<div class="col-xl-4 col-sm-6 mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="catalog-section-tile__item">
					<div class="catalog-section-tile__promo-box">
						<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
						<div class="catalog-section-tile__promo-action">
							<?=$arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
						</div>
						<?endif;?>
						<?if($arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
						<div class="catalog-section-tile__promo-sale">
							<?=$arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
						</div>
						<?endif;?>
					</div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<div class="catalog-section-tile__img-box">
							<?if($arItem["PREVIEW_PICTURE"]):?>
							<?
							$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
							echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="catalog-section-tile__img-img">';
							?>
							<?else:?>
							<img src="<? echo SITE_TEMPLATE_PATH ?>/images/no_foto.png" alt="<?=$arItem["NAME"]?>" class="catalog-section-tile__img-img">
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
							<?endif;?>
						</div>
					</a>
					<div class="catalog-section-tile__text-box">
						<div class="catalog-section-tile__status-box">
							<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"]):?>
							<div class="catalog-section-tile__status">
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nal"):?>
								<div class="catalog-section-tile__status-nal">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nonal"):?>
								<div class="catalog-section-tile__status-nonal">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_zakaz"):?>
								<div class="catalog-section-tile__status-zakaz">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_time"):?>
								<div class="catalog-section-tile__status-time">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]):?>
							<div class="catalog-section-tile__article">
								<?=GetMessage("ARTICLE")?>: <?=$arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]?>
							</div>
							<?endif;?>
						</div>
						<div class="catalog-section-tile__title">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="catalog-section-tile__title-link">
								<?=$arItem["NAME"]?>
							</a>
						</div>
						<div class="catalog-section-tile__price-box">
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<div class="catalog-section-tile__price-ot">
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
							<div class="catalog-section-tile__price-now">
								<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
								<span class="catalog-section-tile__price-rub">
									<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
								</span>
								<?endif;?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
							<div class="catalog-section-tile__price-old">
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
					<?if($arParams["CART_LIST"] === "Y"):?>
					<div class="catalog-cart-input catalog-cart-input-list">
						<div class='catalog-cart-input-wrap catalog-cart-input-list-wrap'>
							<div class='catalog-cart-input-minus catalog-cart-input-list-minus'><i class="fa fa-minus" aria-hidden="true"></i></div>
							<input type='input' name='quantity' value='1'/>
							<div class='catalog-cart-input-plus catalog-cart-input-list-plus'><i class="fa fa-plus" aria-hidden="true"></i></div>
						</div>
						<div class="btn-link catalog-cart-add catalog-cart-input-btn catalog-cart-input-list-btn" data-product="<?=$arItem["ID"]?>" >
							<?=GetMessage("BTN_CART")?>
						</div>
					</div>
					<?endif;?>
				</div>
			</div>
			<?endif;?>
			<?if($arParams['DISPLAY'] == "list"):?>
			<div class="col-12 mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="row row-0 catalog-section-list__item">
					<div class="col-md-4">
						<div class="catalog-section-list__promo-box">
							<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
							<div class="catalog-section-list__promo-action">
								<?=$arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
							<div class="catalog-section-list__promo-sale">
								<?=$arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
							</div>
							<?endif;?>
						</div>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="catalog-section-list__img-box">
								<?if($arItem["PREVIEW_PICTURE"]):?>
								<?
								$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
								echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="catalog-section-list__img-img">';
								?>
								<?else:?>
								<img src="<? echo SITE_TEMPLATE_PATH ?>/images/no_foto.png" alt="<?=$arItem["NAME"]?>" class="catalog-section-list__img-img">
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
								<?endif;?>
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<div class="catalog-section-list__text-box">
							<div class="catalog-section-list__title">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="catalog-section-list__title-link">
									<?=$arItem["NAME"]?>
								</a>
							</div>
							<div class="catalog-section-list__status-box">
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"]):?>
								<div class="catalog-section-list__status">
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nal"):?>
									<div class="catalog-section-list__status-nal">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nonal"):?>
									<div class="catalog-section-list__status-nonal">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_zakaz"):?>
									<div class="catalog-section-list__status-zakaz">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_time"):?>
									<div class="catalog-section-list__status-time">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]):?>
								<div class="catalog-section-list__article">
									<?=GetMessage("ARTICLE")?>: <?=$arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]?>
								</div>
								<?endif;?>
							</div>

							<?if($arItem["PREVIEW_TEXT"]):?>
							<div class="catalog-section-list__desc-text">
								<?=$arItem["PREVIEW_TEXT"]?>
							</div>
							<?endif;?>
							
							<div class="catalog-section-list__price-box">
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
								<div class="catalog-section-list__price-ot">
									<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
								<div class="catalog-section-list__price-now">
									<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
									<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
									<span class="catalog-section-list__price-rub">
										<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
									</span>
									<?endif;?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
								<div class="catalog-section-list__price-old">
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
							<?if($arParams["CART_LIST"] === "Y"):?>
							<div class="catalog-cart-input catalog-cart-input-list">
								<div class='catalog-cart-input-wrap catalog-cart-input-list-wrap'>
									<div class='catalog-cart-input-minus catalog-cart-input-list-minus'><i class="fa fa-minus" aria-hidden="true"></i></div>
									<input type='input' name='quantity' value='1'/>
									<div class='catalog-cart-input-plus catalog-cart-input-list-plus'><i class="fa fa-plus" aria-hidden="true"></i></div>
								</div>
								<div class="btn-link catalog-cart-add catalog-cart-input-btn catalog-cart-input-list-btn" data-product="<?=$arItem["ID"]?>" >
									<?=GetMessage("BTN_CART")?>
								</div>
							</div>
							<?endif;?>
						</div>
					</div>
				</div>
			</div>
			<?endif;?>
			<?if($arParams['DISPLAY'] == "price"):?>
			<div class="col-12 mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="row row-0 catalog-section-price__item">
					<?if($arParams["CART_LIST"] === "Y"):?>
					<div class="col-md-2  mb-20">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="catalog-section-price__img-box">
								<?if($arItem["PREVIEW_PICTURE"]):?>
								<?
								$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
								echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="catalog-section-price__img-img">';
								?>
								<?else:?>
								<img src="<? echo SITE_TEMPLATE_PATH ?>/images/no_foto.png" alt="<?=$arItem["NAME"]?>" class="catalog-section-price__img-img">
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
								<?endif;?>
							</div>
						</a>
					</div>
					<div class="col-md-4 mb-20">
						<div class="catalog-section-price__text-box">
							<div class="catalog-section-price__title">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="catalog-section-price__title-link">
									<?=$arItem["NAME"]?>
								</a>
							</div>
							<div class="catalog-section-price__status-box">
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"]):?>
								<div class="catalog-section-price__status">
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nal"):?>
									<div class="catalog-section-price__status-nal">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nonal"):?>
									<div class="catalog-section-price__status-nonal">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_zakaz"):?>
									<div class="catalog-section-price__status-zakaz">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
									<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_time"):?>
									<div class="catalog-section-price__status-time">
										<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
									</div>
									<?endif?>
								</div>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]):?>
								<div class="catalog-section-price__article">
									<?=GetMessage("ARTICLE")?>: <?=$arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]?>
								</div>
								<?endif;?>
							</div>
						</div>
					</div>
					<div class="col-md-2 mb-20">
						<div class="catalog-section-price__price-box">
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<div class="catalog-section-price__price-ot">
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
							<div class="catalog-section-price__price-now">
								<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
								<span class="catalog-section-price__price-rub">
									<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
								</span>
								<?endif;?>
							</div>
							<?endif;?>
						</div>
					</div>
					<div class="col-md-4 mb-20">
						<div class="catalog-cart-input catalog-cart-input-price">
							<div class='catalog-cart-input-wrap catalog-cart-input-price-wrap'>
								<div class='catalog-cart-input-minus catalog-cart-input-price-minus'><i class="fa fa-minus" aria-hidden="true"></i></div>
								<input type='input' name='quantity' value='1'/>
								<div class='catalog-cart-input-plus catalog-cart-input-price-plus'><i class="fa fa-plus" aria-hidden="true"></i></div>
							</div>
							<div class="btn-link catalog-cart-add catalog-cart-input-btn catalog-cart-input-price-btn" data-product="<?=$arItem["ID"]?>" >
								<?=GetMessage("BTN_CART")?>
							</div>
						</div>
					</div>
					<?else:?>
					<div class="col-md-2 mb-20">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="catalog-section-price__img-box">
								<?if($arItem["PREVIEW_PICTURE"]):?>
								<?
								$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
								echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="catalog-section-price__img-img">';
								?>
								<?endif;?>
								<?if($arItem["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arItem["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
								<?endif;?>
							</div>
						</a>
					</div>
					<div class="col-md-3 mb-20">
						<div class="catalog-section-price__text-box">
							<div class="catalog-section-price__title">
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="catalog-section-price__title-link">
									<?=$arItem["NAME"]?>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-20">
						<div class="catalog-section-price__status-box">
							<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"]):?>
							<div class="catalog-section-price__status">
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nal"):?>
								<div class="catalog-section-price__status-nal">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nonal"):?>
								<div class="catalog-section-price__status-nonal">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_zakaz"):?>
								<div class="catalog-section-price__status-zakaz">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
								<?if($arItem["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_time"):?>
								<div class="catalog-section-price__status-time">
									<?=$arItem["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
								</div>
								<?endif?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]):?>
							<div class="catalog-section-price__article">
								<?=GetMessage("ARTICLE")?>: <?=$arItem["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]?>
							</div>
							<?endif;?>
						</div>
					</div>
					<div class="col-md-3 mb-20">
						<div class="catalog-section-price__price-box">
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<div class="catalog-section-price__price-ot">
								<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
							</div>
							<?endif;?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
							<div class="catalog-section-price__price-now">
								<span class="pricespace"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
								<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
								<span class="catalog-section-price__price-rub">
									<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
								</span>
								<?endif;?>
							</div>
							<?endif;?>
						</div>
					</div>
					<?endif;?>
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
	?></*?=GetMessage("EMPTY");?*/><?
}
?>

