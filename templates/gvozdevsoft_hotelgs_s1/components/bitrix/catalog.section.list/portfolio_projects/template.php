<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if(count($arResult["SECTIONS"]) > 0):?>
<div class="services-sections">
	<div class="row">
		<?foreach($arResult["SECTIONS"] as $keySection => $arSection):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));?>
			<? $elemshtml = "";
			$secid = $arSection["ID"];
			$blockid = $arSection["IBLOCK_ID"];
			$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
			$arFilter = Array("IBLOCK_ID"=>$blockid, "SECTION_ID"=>$secid, "ACTIVE"=>"Y");
			$arRes = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
			while($ob = $arRes->GetNextElement()){
				$arFields = $ob->GetFields();
				$elname = $arFields["NAME"];
				$elurl = $arFields["DETAIL_PAGE_URL"];
				$elemshtml .= "<li><a href='".$elurl."' class='services-sections__links-link'>".$elname."</a></li>";
			}
			?>
			<div class="col-md-6 services-sections__col" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
				<div class="services-sections__item">
					<div class="services-sections__img">
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="services-sections__img-link">
							<?
							$file = CFile::ResizeImageGet(($arSection["PICTURE"]), array('width'=>380, 'height'=>150), BX_RESIZE_IMAGE_EXACT, true);                
							echo '<img src="'.$file['src'].'" alt="'.$arSection["NAME"].'" title="'.$arSection["NAME"].'" class="services-sections__img-img">';
							?>
						</a>
					</div>
					<div class="services-sections__text">
						<h2 class="services-sections__title">
							<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="services-sections__title-link">
								<?=$arSection["NAME"]?>
							</a>
						</h2>
						<ul class="services-sections__links">
							<?=$elemshtml?>
						</ul>
					</div>
				</div>
			</div>
			<?endforeach;?>
		</div>
	</div>
	<?endif;?>