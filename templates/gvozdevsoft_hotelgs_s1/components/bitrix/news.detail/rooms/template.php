<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="rooms-detail" itemscope itemtype="http://schema.org/Product">
	<div class="rooms-detail__top">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1><?=$arResult["NAME"]?></h1>
		<?endif;?>
		<meta itemprop="name" content="<?=$arResult["NAME"]?>">
		<?if($arResult["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"] || $arResult["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
		<div class="rooms-detail__promo-box">
			<?if($arResult["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]):?>
			<div class="rooms-detail__promo-action">
				<?=$arResult["PROPERTIES"]["ATT_ICON_ACTION"]["VALUE"]?>
			</div>
			<?endif;?>
			<?if($arResult["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]):?>
			<div class="rooms-detail__promo-sale">
				<?=$arResult["PROPERTIES"]["ATT_ICON_SALE"]["VALUE"]?>
			</div>
			<?endif;?>
		</div>
		<?endif;?>
		<div class="row">
			<div class="col-lg-7">
				<div class="rooms-detail__img-box">
					<a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="gallery" data-fancybox="gallery_product" itemprop="image">
						<?
						$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>617, 'height'=>470), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						echo '<img src="'.$file['src'].'" alt="'.$arResult["NAME"].'" title="'.$arResult["NAME"].'" class="rooms-detail__img-img">';
						?>
					</a>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="rooms-detail__price-box">
					<div class="rooms-detail__price">
						<?if($arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
						<div class="rooms-detail__price-ot">
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
						<div class="rooms-detail__price-rub">
							<?=$arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
						</div>
						<?endif;?>
					</div>
					<?if($arResult["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
					<div class="rooms-detail__price-old">
						<?if($arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
						<?=$arResult["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
						<?endif;?>
						<span class="pricespace"><?=$arResult["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?></span>
						<?if($arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?> <?=$arResult["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
						<?endif;?>
					</div>
					<?endif;?>
				</div>
				<div class="rooms-detail__param-box">
					<?if($arResult["PROPERTIES"]["ATT_PERSON"]["VALUE"]):?>
					<div class="rooms-detail__param">
						<?=$arResult["PROPERTIES"]["ATT_PERSON"]["VALUE"]?>
					</div>
					<?endif;?>
					<?if($arResult["PROPERTIES"]["ATT_SQUARE"]["VALUE"]):?>
					<div class="rooms-detail__param">
						<?=$arResult["PROPERTIES"]["ATT_SQUARE"]["VALUE"]?>
					</div>
					<?endif;?>
				</div>
				<div class="rooms-detail__preview" itemprop="description">
					<?if($arResult["PREVIEW_TEXT"]):?>
					<?=$arResult['PREVIEW_TEXT'];?>
					<?endif?>
				</div>

				<?php if ($arResult["PROPERTIES"]["LINK_BINOVO"]["VALUE"] === "") { ?>
					<div class="rooms-detail__btn">
					<a data-fancybox data-src="#form-popup-catalog" href="javascript:;" class="btn-link rooms-detail__btn-link">
						<?= GetMessage("BTN_ORDER")?>
					</a>
				</div>
				<?php } else { ?>
					<div class="rooms-detail__btn">
					<a data href=<?=$arResult["PROPERTIES"]["LINK_BINOVO"]["VALUE"]  ?> class="btn-link rooms-detail__btn-link">
						<?= GetMessage("BTN_ORDER")?>
					</a>
				<?php } ?>

			</div>
		</div>
	</div>
	<div class="rooms-detail__tabs">
		<div class="row">
			<div class="col tabs">
				<ul class="rooms-detail__tabs-ul">
					<li>
						<?=GetMessage("TAB_1")?>
					</li>
					<li>
						<?=GetMessage("TAB_2")?>
					</li>
				</ul>
				<div class="tabs_block">
					<div class="tabs_block1">
						<div class="rooms-detail__text">
							<?=$arResult['DETAIL_TEXT'];?>
						</div>
					</div>
					<div class="rooms-detail__parameter tabs_block2">
						<?if($arResult["PROPERTIES"]["ATT_PHOTO_VIEW"]["VALUE"]):?>
						<div class="row">
							<div class="col">
								<div class="mygallery justified-gallery">
									<?if($arResult["PROPERTIES"]["ATT_PHOTO_VIEW"]["VALUE"]){
										foreach($arResult["PROPERTIES"]["ATT_PHOTO_VIEW"]["VALUE"] as $item):?>
											<? $img = CFile::GetFileArray($item); ?>
											<a href="<?=$img["SRC"]?>" class="gallery" data-fancybox="gallery_services">
												<img src="<?=$img["SRC"]?>" alt="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" title="<?if($img["DESCRIPTION"]):?><?=$img["DESCRIPTION"]?><?else:?><?=$arResult["NAME"]?><?endif;?>" class="services-news-detail__photo-img">
											</a>
											<?endforeach?>
											<?}?>
										</div>
									</div>
								</div>
								<?endif;?>
							</div>
							<div class="rooms-detail__tabs-item tabs_block3">
								<!-- FORM EXPERT -->
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_DIR."rooms/tab.php"
									)
								);?>
								<!-- /FORM EXPERT -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="rooms-detail__form-manager mt-70 mb-70">
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


