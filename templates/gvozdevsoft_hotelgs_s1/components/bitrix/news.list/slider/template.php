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
<script src="//widget.reservationsteps.ru/js/bnovo.js"></script>
<script type="text/javascript">
  (function(){
     Bnovo_Widget.init(function(){
       Bnovo_Widget.open('_bn_widget_', {
        type: "horizontal",
        uid: "1d61c305-1caa-4f27-9ca4-a7d836d0db34",
        lang: "ru",
        width: "100%",
        width_mobile: "300",
        background: "#ffffff",
        background_mobile: "#ffffff",
        bg_alpha: "100",
        bg_alpha_mobile: "100",
        border_color_mobile: "#C6CAD3",
        padding: "24",
        padding_mobile: "24",
        border_radius: "8",
        button_font_size: "14",
        button_height: "42",
        font_type: "inter",
        title_color: "#242742",
        title_color_mobile: "#242742",
        title_size: "22",
        title_size_mobile: "22",
        inp_color: "#242742",
        inp_bordhover: "#dedfe3",
        inp_bordcolor: "#BCBCBC",
        inp_alpha: "100",
        btn_background: "#1875F0",
        btn_background_over: "#1850D2",
        btn_textcolor: "#FFFFFF",
        btn_textover: "#FFFFFF",
        btn_bordcolor: "#1875F0",
        btn_bordhover: "#1850D2",
        adults_default: "1",
        dates_preset: "on",
        dfrom_today: "on",
        dfrom_value: "2",
        dto_nextday: "on",
        dto_value: "2",
        cancel_color: "#FFFFFF",
        switch_mobiles_width: "800",
    });
   });
  })();
</script>