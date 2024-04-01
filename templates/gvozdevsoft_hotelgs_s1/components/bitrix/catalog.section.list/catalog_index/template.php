_text-desc">
								<?=GetMessage("NEWS_PROJECTS_NAME")?> (<?=$arSection["ELEMENT_CNT"]?>)
							</div>
						</div>
					</div>
				</div>
			<?endforeach;?>
		<?endif;?>
				</div>
			</div>
			<?if($arParams["BLOCK_VIEW"] == "Y"):?>
			<?if($arParams["BLOCK_LINK_LINK"] && $arParams["BLOCK_LINK_TEXT"]):?>
			<div class="section-link-all">
				<a href="<?=SITE_DIR.$arParams["BLOCK_LINK_LINK"];?>">
					<?=$arParams["BLOCK_LINK_TEXT"];?>
				</a>
			</div>
			<?endif;?>
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
