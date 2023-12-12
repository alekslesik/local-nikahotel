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
	<p>
		Гостиничный комплекс «Измайлово» в Москве рад пригласить гостей столицы в один из самых живописных и недорогих мест для комфортного размещения в Москве. 
		С понедельника по пятницу в гостинице действуют базовые расценки на номера, а в выходные дни на проживание в номерах отелях существуют скидки. 
		Бронирование номеров осуществляется бесплатно, без излишних сборов или комиссий. Для уточнения цены заселения в отель «Измайлово», воспользуйтесь формой online-бронирования. 
	</p>
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

	<p>
		 В гостиничном комплексе «Измайлово» прекрасно будут чувствовать себя и взрослые, и дети. Каждому ребенку до 3 лет предоставляется детская кроватка, все дети до 7 лет проживают в гостинице бесплатно.
		Также возможно предоставление дополнительного детского места. Для детей в возрасте до 14 лет по желанию родителей предоставляется дополнительная кровать. Стоимость услуги — 1100 рублей.
	</p>

	<div>
		<br>
	</div>

	<p>
		В комплексе есть все для комфортного проживания постояльцев. На каждом этаже гостиницы установлен кулер, есть гладильная комната, а также помещение для отдыха. 
		Для комфортного сна постояльцев предлагается оригинальная услуга — меню подушек. Каждый постоялец может выбрать именно ту постельную принадлежность, которая подарит ему крепкий и здоровый сон. 
		Номера комплекса оборудованы электронными замками. Для удобства постояльцев во всех номерах есть вентиляторы. 
	Приятный бонус для тех, кто решить провести время в «Измайлово» — плитка шоколада и минеральная вода при заезде в гостиницу. 
	</p>

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
