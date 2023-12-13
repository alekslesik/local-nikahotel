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
						$file = CFile::ResizeImageGet(($arResult["DETAIL_PICTURE"]), array('width'=>1000, 'height'=>760), BX_RESIZE_IMAGE_PROPORTIONAL, true);
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


