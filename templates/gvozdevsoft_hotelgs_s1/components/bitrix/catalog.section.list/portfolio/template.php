<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if(count($arResult["SECTIONS"]) > 0):?>
<div class="portfolio-sections">
	<div class="row">
		<?foreach($arResult["SECTIONS"] as $keySection => $arSection):
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));?>
		<div class="col-md-6 mb-30 portfolio-sections__col" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
			<div class="portfolio-sections__item">
				<div class="portfolio-sections__img">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="portfolio-sections__img-link">
						<?
						$file = CFile::ResizeImageGet(($arSection["PICTURE"]), array('width'=>640, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arSection["NAME"].'" title="'.$arSection["NAME"].'" class="portfolio-sections__img-img">';
						?>
					</a>
				</div>
				<div class="portfolio-sections__text">
					<h2 class="portfolio-sections__title">
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="portfolio-sections__title-link">
							<?=$arSection["NAME"]?>
						</a>
					</h2>
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>
<?endif;?>