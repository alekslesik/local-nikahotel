<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="section-tariff">
	<div class="row">
		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
		<?endif;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-md-6 mb-30" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="section-tariff__item section-block-hover">
				<?if($arItem["PREVIEW_PICTURE"]):?>
				<div class="section-tariff__img-box">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
						<?
						$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" class="section-tariff__img-img">';
						?>
					</a>
				</div>
				<?endif?>
				<div class="section-tariff__text">
					<div class="section-tariff__title">
						<?=$arItem["NAME"]?>
					</div>
					<div class="section-tariff__price">
						<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
						<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"];?> 
						<?endif?>
						<span class="section-tariff__price-price">
							<?if($arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"];?> 
							<?endif?>
						</span>
						<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
						<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"];?> 
						<?endif?>
						<?if($arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]):?>
						<div class="section-tariff__price-old">
							<?if($arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_OT"]["VALUE"]?>
							<?endif;?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_OLD"]["VALUE"]?>
							<?if($arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]):?>
							<?=$arItem["PROPERTIES"]["ATT_PRICE_ED"]["VALUE"]?>
							<?endif;?>
						</div>
						<?endif;?>
					</div>
					<div class="section-tariff__work">
						<?if($arItem["PROPERTIES"]["ATT_WORK_MAIN"]["VALUE"]):?>
						<?=htmlspecialcharsBack($arItem["PROPERTIES"]["ATT_WORK_MAIN"]["VALUE"]["TEXT"]);?>
						<?endif;?>
										<?/*<div class="qqq" class="section-tariff__hide">
											<?if($arItem["PROPERTIES"]["ATT_WORK_HIDE"]["VALUE"]):?>
											<?=htmlspecialcharsBack($arItem["PROPERTIES"]["ATT_WORK_HIDE"]["VALUE"]["TEXT"]);?>
											<?endif;?>
											</div>*/?>
										</div>
										<div class="section-tariff__link-box">
											<a data-fancybox data-src="#form-popup-request" href="javascript:;" class="section-tariff__link-link"><?=GetMessage("BTN_REQUEST")?></a>
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