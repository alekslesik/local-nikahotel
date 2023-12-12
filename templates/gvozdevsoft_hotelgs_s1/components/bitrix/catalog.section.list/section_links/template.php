<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strTitle = "";
?>
<div class="catalog-links">
	<div class="row row-10">
		<div class="col-sm-auto">
			<div class="catalog-links__text">
				<?=GetMessage("MESS_TEXT")?> 
			</div>
		</div>
		<div class="col-sm">
			<?
			foreach($arResult["SECTIONS"] as $arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
				
				?>
				<div class="catalog-links__link">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="catalog-links__link-link">	
						<?=$arSection["NAME"]?>
					</a>
				</div>
				<?
			}
			?>
		</div>
	</div>
</div>