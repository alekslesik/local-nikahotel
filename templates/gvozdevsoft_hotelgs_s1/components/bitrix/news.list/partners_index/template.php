T_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div <?if($arParams["BLOCK_VIEW"] == "N"):?>class="col-xl-2 col-lg-4 col-md-6 mb-30" <?endif;?>id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<?if($arItem["PREVIEW_PICTURE"]):?>
						<!-- <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="partners-list__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>" title="<?=$arItem["NAME"]?>"> -->
						<!--  <a href="" class="partners-list__item<?if($arParams["BLOCK_VIEW"] == "Y"):?> section-block-hover<?endif;?>" title="<?=$arItem["NAME"]?>"> -->
							<?
							$file = CFile::ResizeImageGet(($arItem["PREVIEW_PICTURE"]), array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);               
							echo '<img src="'.$file['src'].'" alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" class="partners-list__img">';
							?>
					<!--	</a> -->
						<?endif;?>
					</div>
					<?endforeach;?>
				</div>
			</div>
			<?if($arParams["BLOCK_VIEW"] == "Y"):?>
			</div>
			<?else:?>
			<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]):?>
			<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>" class="section-link-all-center">
				<?=$arParams["BLOCK_LINK_TEXT"];?>
			</a>
			<?endif;?>
			<?endif;?>
	</div>
</div>




