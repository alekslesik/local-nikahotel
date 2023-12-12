</div>
						<?if(!CSite::InDir(SITE_DIR.'index.php')):?>
					</div>
				</div>
			</div>
			<?endif;?>
		</div>
		<footer id="footer">
			<div class="footer">
				<div class="footer__top">
					<div class="container">
						<div class="row">
							<div class="col-lg">
								<div class="footer__logo">
										<a href="<?=SITE_DIR?>" class="header-logo__link">
											<?@include(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'/includes/header_logo_img.php'));?>
										</a>
									</div>
									<div class="footer__text">
										<?$APPLICATION->IncludeFile(SITE_DIR."includes/footer_text.php", Array(), Array("MODE" => "html", "NAME" => "Text"));?>
									</div>
									<div class="footer__hr"></div>
								<div class="footer__item1">
									<div class="footer__item2">
										<div class="footer__phone">
											<?@include(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'/includes/footer_phone.php'));?>
										</div>
									</div>
									<div class="footer__btn-callback">
											<a data-fancybox data-src="#form-popup-callback" href="javascript:;" class="footer__btn-callback-link btn-link">
												<?=GetMessage("CALLBACK")?>
											</a>
										</div>
									<div class="footer__item2">
										<div class="footer__mail">
											<?$APPLICATION->IncludeFile(SITE_DIR."includes/header_email.php", Array(), Array("MODE" => "html", "NAME" => "Email"));?>
										</div>
										<div class="footer__address">
											<?$APPLICATION->IncludeFile(SITE_DIR."includes/header_address.php", Array(), Array("MODE" => "html", "NAME" => "Address"));?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="footer__menu">
									<div class="footer__menu-title">
										<?$APPLICATION->IncludeFile(SITE_DIR."includes/footer_title_menu_1.php", Array(), Array("MODE" => "html", "NAME" => "Title Menu 1"));?>
									</div>
									<nav class="footer__menu-nav">
										<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
											"ROOT_MENU_TYPE" => "bottom",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => "",
											"MAX_LEVEL" => "1",	
											"CHILD_MENU_TYPE" => "left",	
											"USE_EXT" => "N",	
											"DELAY" => "N",	
											"ALLOW_MULTI_SELECT" => "N",
										),
										false
									);?>
								</nav>
							</div>
						</div>
						<div class="col-md">
							<div class="footer__menu">
								<div class="footer__menu-title">
									<?$APPLICATION->IncludeFile(SITE_DIR."includes/footer_title_menu_2.php", Array(), Array("MODE" => "html", "NAME" => "Title Menu 2"));?>
								</div>
								<nav class="footer__menu-nav">
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu", 
										"top", 
										array(
											"ROOT_MENU_TYPE" => "bottom_2",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "left",
											"USE_EXT" => "N",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "top"
										),
										false
									);?>
								</nav>
							</div>
						</div>
						<div class="col-md">
							<div class="footer__menu">
								<div class="footer__menu-title">
									<?$APPLICATION->IncludeFile(SITE_DIR."includes/footer_title_menu_3.php", Array(), Array("MODE" => "html", "NAME" => "Title Menu 3"));?>
								</div>
								<nav class="footer__menu-nav">
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu", 
										"top", 
										array(
											"ROOT_MENU_TYPE" => "bottom_3",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "left",
											"USE_EXT" => "N",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "top"
										),
										false
									);?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="container">
					<div class="row">
						<div class="col-md">
							<div class="footer__copyright">
								<?$APPLICATION->IncludeFile(SITE_DIR."includes/footer_copyrait.php", Array(), Array("MODE" => "html", "NAME" => "Copyrait"));?>
							</div>
						</div>
						<div class="col-md">
							<div class="footer__metrics">
								<?$APPLICATION->IncludeFile(SITE_DIR."metrics.php", Array(), Array("MODE" => "html", "NAME" => "Metrics"));?>
							</div>
						</div>
						<div class="col-md-auto ml-auto">
							<div class="footer__social">
								<?$APPLICATION->IncludeFile(SITE_DIR."includes/footer_social.php", Array(), Array("MODE" => "html", "NAME" => "Social"));?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- form popup -->
	<?$APPLICATION->IncludeFile(SITE_DIR."lib/feedback/forms/form_popup_callback.php", Array(), Array("MODE" => "html", "NAME" => "Form Popup Callback"));?>
	<?$APPLICATION->IncludeFile(SITE_DIR."lib/feedback/forms/form_popup_request.php", Array(), Array("MODE" => "html", "NAME" => "Form Popup Request"));?>
	<?$APPLICATION->IncludeFile(SITE_DIR."lib/feedback/forms/form_popup_estimate.php", Array(), Array("MODE" => "html", "NAME" => "Form Popup Estimate"));?>
	<!-- /form popup -->
</body>
</html>