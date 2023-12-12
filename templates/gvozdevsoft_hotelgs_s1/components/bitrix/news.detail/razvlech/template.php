<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="catalog-detail" itemscope itemtype="http://schema.org/Product">
	<div class="catalog-detail__top">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1><?=$arResult["NAME"]?></h1>
		<?endif;?>
		<meta itemprop="name" content="<?=$arResult["NAME"]?>">
		<?if($arResult["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arResult["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
		<div class="catalog-detail__promo-box">
			<?if($arResult["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
			<div class="catalog-detail__promo-action">
				<?=$arResult["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
			</div>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
			<div class="catalog-detail__promo-sale">
				<?=$arResult["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
			</div>
			<?endif;?>
		</div>
		<?endif;?>
		<div class="row">
			<div class="col-lg-7">
				<div class="catalog-detail__img-box">
					<?if($arResult["DETAIL_PICTURE"]):?>
					<a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="gallery" data-fancybox="gallery_product" itemprop="image">			
						<?
						$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>617, 'height'=>470), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
						echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'" title="'.$arResult["NAME"].'" class="catalog-detail__img-img">';
						?>
					</a>
					<?else:?>
					<img src="<? echo SITE_TEMPLATE_PATH ?>/images/no_foto.png" alt="<?=$arResult["NAME"]?>">
					<?endif;?>
				</div>
				<?if($arResult["PROPERTIES"]["ATT_PHOTO_VIEW"]["VALUE"]):?>
				<div class="mygallery-catalog justified-gallery catalog-detail__img-view">
					<?foreach($arResult["PROPERTIES"]["ATT_PHOTO_VIEW"]["VALUE"] as $item):?>
					<? $img = CFile::GetFileArray($item); ?>
					<? $preview = CFile::ResizeImageGet($item, Array('width' => 640, 'height' => 640), BX_RESIZE_IMAGE_PROPORTIONAL); ?>
					<a href="<?=$img["SRC"]?>" data-fancybox="gallery_product">
						<img src="<?=$preview["src"]?>" alt="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" title="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>">
					</a>
					<?endforeach?>
				</div>
				<?endif;?>
			</div>
			<div class="col-lg-5">
				<div class="catalog-detail__status-box">
					<?if($arResult["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]):?>
					<div class="catalog-detail__article">
						<?=GetMessage("ARTICLE")?>: <?=$arResult["PROPERTIES"]["ATT_ARTICLE"]["VALUE"]?>
					</div>
					<?endif;?>
					<?if($arResult["PROPERTIES"]["ATT_STATUS"]["VALUE"]):?>
					<div class="catalog-detail__status">
						<?if($arResult["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nal"):?>
						<div class="catalog-detail__status-nal">
							<?=$arResult["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
						</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_nonal"):?>
						<div class="catalog-detail__status-nonal">
							<?=$arResult["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
						</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_zakaz"):?>
						<div class="catalog-detail__status-zakaz">
							<?=$arResult["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
						</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["ATT_STATUS"]["VALUE_XML_ID"] == "status_time"):?>
						<div class="catalog-detail__status-time">
							<?=$arResult["PROPERTIES"]["ATT_STATUS"]["VALUE"];?>
						</div>
						<?endif?>
					</div>
					<?endif;?>
				</div>
				<div class="catalog-detail__price-box">
					<div class="catalog-detail__price">
						<?if($arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
						<div class="catalog-detail__price-ot">
							<?=$arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
						</div>
						<?endif;?>
						<?if($arResult["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
						<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<meta itemprop="price" content="<?=$arResult["PROPERTIES"]["ATT_PRICE"]["VALUE"]?>">
							<meta itemprop="priceCurrency" content="RUB">
							<span class="pricespace"><?=$arResult["PROPERTIES"]["ATT_PRICE"]["VALUE"]?></span>
						</span>
						<?endif;?>
						<?if($arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
						<div class="catalog-detail__price-rub">
							<?=$arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
						</div>
						<?endif;?>
					</div>
					<?if($arResult["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
					<div class="catalog-detail__price-old">
						<?if($arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
						<?=$arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
						<?endif;?>
						<span class="pricespace"><?=$arResult["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?></span>
						<?if($arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?> <?=$arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
						<?endif;?>
					</div>
					<?endif;?>
				</div>
				<div class="catalog-detail__preview" itemprop="description">
					<?if($arResult["PREVIEW_TEXT"]):?>
					<?=$arResult['PREVIEW_TEXT'];?>
					<?endif?>
				</div>
				<?if($arParams["CART_DETAIL"] === "Y"):?>
				<div class="catalog-detail__btn catalog-cart-input catalog-cart-input-detail">
					<div class='catalog-cart-input-wrap catalog-cart-input-detail-wrap'>
						<div class='catalog-cart-input-minus catalog-cart-input-detail-minus'><i class="fa fa-minus" aria-hidden="true"></i></div>
						<input type='input' name='quantity' value='1'/>
						<div class='catalog-cart-input-plus catalog-cart-input-detail-plus'><i class="fa fa-plus" aria-hidden="true"></i></div>
					</div>
					<div class="btn-link catalog-cart-add catalog-cart-input-btn catalog-cart-input-detail-btn" data-product="<?=$arResult["ID"]?>" >
						<?=GetMessage("BTN_CART")?>
					</div>
				</div>
				<?else:?>
				<div class="catalog-detail__btn">
					<a data-fancybox data-src="#form-popup-catalog" href="javascript:;" class="btn-link catalog-detail__btn-link">
						<?=GetMessage("BTN_ORDER")?>
					</a>
				</div>
				<?endif;?>
			</div>
		</div>
	</div>
	<div class="catalog-detail__tabs">
		<div class="row">
			<div class="col tabs">
				<ul class="catalog-detail__tabs-ul">
					<li>
						<?=GetMessage("TAB_1")?>
					</li>
					<li>
						<?=GetMessage("TAB_2")?>
					</li>
					<li>
						<?=GetMessage("TAB_3")?>
					</li>
				</ul>
				<div class="tabs_block">
					<div class="tabs_block1">
						<div class="catalog-detail__text">
							<?=$arResult['DETAIL_TEXT'];?>
						</div>
					</div>
					<div class="catalog-detail__parameter tabs_block2">
						<div class="row">
							<div class="col-xl-9 col-12">
								<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
								<div class="catalog-detail__parameter-item">
									<div class="catalog-detail__parameter-name">
										<?=$arProperty["NAME"]?>
									</div>
									<div class="catalog-detail__parameter-line"></div>
									<div class="catalog-detail__parameter-size">
										<?if($arProperty["DISPLAY_VALUE"]):?>
										<?=$arProperty["DISPLAY_VALUE"];?>
										<?endif?>
									</div>
								</div>
								<?endforeach;?>
							</div>
						</div>
						<?if($arResult['PROPERTIES']['ATT_FILE']['VALUE']):?>
						<h4 class="h2-section"><?=GetMessage("MESS_DOC_TITLE")?></h4>
						<div class="catalog-detail__file">
							<?foreach($arResult['PROPERTIES']['ATT_FILE']['VALUE'] as $file):?>
							<?$arDoc = CFile::GetByID($file);
							$doc = $arDoc->GetNext();
							$format_file = end(explode('.', $doc['ORIGINAL_NAME']));
							$doc_icon = '';
							if ($format_file == 'doc' || $format_file == 'docx') {
								$doc_icon = "DOC";
							} elseif ($format_file == 'pdf') {
								$doc_icon = "PDF";
							} elseif ($format_file == 'png' || $format_file == 'jpg' || $format_file == 'jpeg') {
								$doc_icon = "IMG";
							} elseif ($format_file == 'xls' || $format_file == 'xlsx') {
								$doc_icon = "XLS";
							}
							?>
							<div class="catalog-detail__file-item">
								<div class="catalog-detail__file-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
								<div class="catalog-detail__file-name">
									<a href="<?=CFile::GetPath($file)?>" target="_blank"  class="catalog-detail__file-link">
										<?if($doc["DESCRIPTION"]):?><?=$doc["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>
									</a>
									<div class="catalog-detail__file-size">
										<div class="catalog-detail__file-format"><?=$doc_icon?>,</div><?=round($doc['FILE_SIZE'] / 1024000, 2)?> Мб
									</div>
								</div>
							</div>
							<?endforeach?>
						</div>
						<?endif?>
					</div>
					<div class="catalog-detail__tabs-item tabs_block3">
						<!-- FORM EXPERT -->
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."catalog/tab.php"
							)
						);?>
						<!-- /FORM EXPERT -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="catalog-detail__form-manager mt-70 mb-70">
		<!-- FORM EXPERT -->
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."lib/feedback/forms/form_service_bottom.php"
			)
		);?>
		<!-- /FORM EXPERT -->
	</div>
</div>


