<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="header-slider owl-carousel owl-theme">
	<? foreach ($arResult["ITEMS"] as $arItem) : ?>
		<? if ($arItem["PROPERTIES"]["ATT_VIDEO_IMG"]["VALUE_XML_ID"] == "data_video") : ?>
			<? $video = CFile::GetPath($arItem["PROPERTIES"]["ATT_VIDEO"]["VALUE"]); ?>
			<div class="header-slider__img video-bg">
				<div class="video-bg__box">
					<video src="<?= $video; ?>" loop muted autoplay playsinline class="video-bg__video"></video>
				</div>
			<? else : ?>
				<div class="header-slider__img" style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>');">
				<? endif; ?>
				<div class="header-slider__shadow"></div>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="header-slider__inner">
								<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_TITLE"]["VALUE"]) : ?>
									<div class="header-slider__offer">
										<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_TITLE"]["VALUE"]) : ?>
											<div class="header-slider__title">
												<?= $arItem["DISPLAY_PROPERTIES"]["ATT_TITLE"]["VALUE"]; ?>
											</div>
										<? endif; ?>
										<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_DESC"]["VALUE"]) : ?>
											<div class="header-slider__desc">
												<?= $arItem["DISPLAY_PROPERTIES"]["ATT_DESC"]["VALUE"]; ?>
											</div>
										<? endif; ?>
										<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_SQUARE"]["VALUE"] || $arItem["DISPLAY_PROPERTIES"]["ATT_PRICE"]["VALUE"]) : ?>
											<div class="header-slider__box-price">
												<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_SQUARE"]["VALUE"]) : ?>
													<div class="header-slider__square">
														<?= $arItem["DISPLAY_PROPERTIES"]["ATT_SQUARE"]["VALUE"]; ?>
													</div>
												<? endif; ?>
												<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_PRICE"]["VALUE"]) : ?>
													<div class="header-slider__price">
														<?= $arItem["DISPLAY_PROPERTIES"]["ATT_PRICE"]["VALUE"]; ?>
													</div>
												<? endif; ?>
											</div>
										<? endif; ?>
									</div>
								<? endif; ?>
								<? if ($arItem["DISPLAY_PROPERTIES"]["ATT_LINK"]["VALUE"]) : ?>
									<div class="header-slider__btn">
										<a href="<?= $arItem["DISPLAY_PROPERTIES"]["ATT_LINK"]["VALUE"]; ?>" class="btn-link">
											<?= GetMessage("MESS_MORE") ?>
										</a>
									</div>
								<? endif; ?>
							</div>
						</div>
					</div>
				</div>
				</div>
			<? endforeach; ?>

			</div>

			<div class="left" id="_bn_widget_">
				<a href="https://bnovo.ru/" id="_bnovo_link_" target="_blank">Bnovo</a>
			</div>