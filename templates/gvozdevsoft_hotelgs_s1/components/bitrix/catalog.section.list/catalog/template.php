<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if(count($arResult["SECTIONS"]) > 0):?>
<div class="catalog-section-list">
	<div class="catalog-section-list__row">
		<div class="row row-10">
			<?foreach($arResult["SECTIONS"] as $keySection => $arSection):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));?>
			<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 catalog-section-list__col mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
				<div class="catalog-section-list__box">
					<?if($arSection["PICTURE"]):?>
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="catalog-section-list__link-img">
						<span class="catalog-section-list__img"><?
						$file = CFile::ResizeImageGet(($arSection["PICTURE"]), array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arSection["NAME"].'" title="'.$arSection["NAME"].'" class="catalog-section-list__img-img">';
						?></span>
					</a>
					<?endif;?>
					<div class="catalog-section-list__text">
						<div class="catalog-section-list__text-title">
							<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="catalog-section-list__link-title">
								<?=$arSection["NAME"]?>
							</a>
						</div>
						<div class="catalog-section-list__text-desc">
							<?=GetMessage("NEWS_PROJECTS_NAME")?> (<?=$arSection["ELEMENT_CNT"]?>)
						</div>
					</div>
				</div>
			</div>
			<?endforeach;?>
		</div>
	</div>
</div>
<?endif;?>