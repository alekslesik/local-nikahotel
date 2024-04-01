" class="section-tariff__hide">
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