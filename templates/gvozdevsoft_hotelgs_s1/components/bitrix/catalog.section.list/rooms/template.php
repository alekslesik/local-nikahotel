<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if(count($arResult["SECTIONS"]) > 0):?>
<div class="rooms-section-list">
	<div class="rooms-section-list__row">
		<div class="row row-10">
			<?foreach($arResult["SECTIONS"] as $keySection => $arSection):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));?>
			<div class="col-md-4 rooms-section-list__col mb-20 pr-10 pl-10" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
				<div class="rooms-section-list__box">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="rooms-section-list__link">
						<?if($arSection["PICTURE"]):?>
						<span class="rooms-section-list__img"><?
						$file = CFile::ResizeImageGet(($arSection["PICTURE"]), array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true);                
						echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="rooms-section-list__img-img">';
						?></span>
						<div class="rooms-section-list__text">
							<div class="rooms-section-list__text-title">
								<?=$arSection["NAME"]?>
							</div>
						</div>
						<?endif;?>
					</a>
				</div>
			</div>
			<?endforeach;?>
		</div>
	</div>
</div>
<?endif;?>