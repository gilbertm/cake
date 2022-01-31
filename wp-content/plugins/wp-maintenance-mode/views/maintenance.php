<?php
/**
 * Maintenance mode page
 *
 * This template can be overridden by copying it to one of these paths:
 * - /wp-content/themes/{your_child_theme}/wp-maintenance-mode/maintenance.php
 * - /wp-content/themes/{your_theme}/wp-maintenance-mode/maintenance.php
 * - /wp-content/themes/{your_child_theme}/wp-maintenance-mode.php [deprecated]
 * - /wp-content/themes/{your_theme}/wp-maintenance-mode.php [deprecated]
 * - /wp-content/wp-maintenance-mode.php
 *
 * It can also be overridden by changing the default path. See `wpmm_maintenance_template` hook:
 * https://github.com/WP-Maintenance-Mode/Snippet-Library/blob/master/change-template-path.php
 *
 * @version 2.4.0
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo esc_html( $title ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="author" content="<?php echo esc_attr( $author ); ?>" />
		<meta name="description" content="<?php echo esc_attr( $description ); ?>" />
		<meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>" />
		<meta name="robots" content="<?php echo esc_attr( $robots ); ?>" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" />
		<?php
		do_action( 'wm_head' ); // this hook will be removed in the next versions
		do_action( 'wpmm_head' );
		?>
	</head>
	<body class="<?php echo $body_classes ? esc_attr( $body_classes ) : ''; ?>">
		<?php do_action( 'wpmm_after_body' ); ?>
		
		<?php
			/**
			 * When the bot feature is enabled, the text is not displayed anymore.
			 * Also, we don't escape the $text, because wp_kses_post was applied before do_shortcode. So it's safe to output it.
			 */
			if ( ! empty( $text ) && $this->plugin_settings['bot']['status'] === 0 ) {
				?>
				
	<section class="text-center">
      <div class="row">
        <div class="col-12">
          <div class="card---hero-banner card m-0 p-0 border-0">
            <div class="d-none d-md-block">
              <img src="https://custom-wp-cake.local/wp-content/uploads/2022/01/cake-1920x1080-1.jpg" alt="" />
            </div>
            <div class="d-md-none">
              <div class="field-primary-hero-image-mobile">
                <img src="https://custom-wp-cake.local/wp-content/uploads/2022/01/cake-1920x1080-1.jpg" alt="" />
				<?php /* <img src="https://custom-wp-cake.local/wp-content/uploads/2022/01/cake-768x1024-1.jpg" alt="" /> */ ?>
              </div>
            </div>
            <div class="d-none d-md-block card-img-overlay border-0 p-0 m-0">
              <div class="container-fluid h-100" dir="ltr" style="direction: ltr;">
                <div class="row justify-content-center h-100">
                  <div class="col-8 col-md-8 col-lg-5 bg-transparent text-white">
                    <div id="floating-text" class="card border-0 h-100 bg-transparent text-white text-left w-100 ten-percent">
                      <div class="m-auto p-3 p-md-5 overlayed">
                       
						
						<!-- Text -->
						<?php echo $text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				
			<div class="wrap">
			
						<?php if ( ! empty( $this->plugin_settings['modules']['countdown_status'] ) && $this->plugin_settings['modules']['countdown_status'] === 1 ) { ?>
				<!-- Countdown -->
				<div class="countdown" data-start="<?php echo esc_attr( date( 'F d, Y H:i:s', strtotime( $countdown_start ) ) ); ?>" data-end="<?php echo esc_attr( date( 'F d, Y H:i:s', $countdown_end ) ); ?>"></div>
			<?php } ?>
			
			
						<?php
			/**
			 * When the bot feature is enabled, the subscribe form is not displayed anymore.
			 */
			if (
					( ! empty( $this->plugin_settings['modules']['subscribe_status'] ) && $this->plugin_settings['modules']['subscribe_status'] === 1 ) &&
					( isset( $this->plugin_settings['bot']['status'] ) && $this->plugin_settings['bot']['status'] === 0 )
			) {
				?>
				<!-- Subscribe -->
				<?php if ( ! empty( $this->plugin_settings['modules']['subscribe_text'] ) ) { ?>
					<h3><?php echo esc_html( $this->plugin_settings['modules']['subscribe_text'] ); ?></h3>
				<?php } ?>

				<div class="subscribe_wrapper" style="min-height: 100px;">
					<form class="subscribe_form">
						<div class="subscribe_border">
							<input type="text" placeholder="<?php esc_attr_e( 'your e-mail...', 'wp-maintenance-mode' ); ?>" name="email" class="email_input" data-rule-required="true" data-rule-email="true" data-rule-required="true" data-rule-email="true" />
							<input type="submit" value="<?php esc_attr_e( 'Subscribe', 'wp-maintenance-mode' ); ?>" />
						</div>
						<?php if ( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
							<div class="privacy_checkbox">
								<label>
									<input type="checkbox" name="acceptance" value="YES" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" />

									<?php echo esc_html_x( 'I\'ve read and agree with the site\'s privacy policy', 'subscribe form', 'wp-maintenance-mode' ); ?>
								</label>
							</div>

							<?php if ( ! empty( $this->plugin_settings['gdpr']['subscribe_form_tail'] ) ) { ?>
								<p class="privacy_tail"><?php echo wp_kses( $this->plugin_settings['gdpr']['subscribe_form_tail'], wpmm_gdpr_textarea_allowed_html() ); ?></p>
							<?php } ?>
						<?php } ?>
					</form>
				</div>
			<?php } ?>
			
			
			<?php if ( ! empty( $this->plugin_settings['modules']['social_status'] ) && $this->plugin_settings['modules']['social_status'] === 1 ) { ?>
				<!-- Social networks -->        
				<div class="social" data-target="<?php echo ! empty( $this->plugin_settings['modules']['social_target'] ) ? 1 : 0; ?>">
					<?php if ( ! empty( $this->plugin_settings['modules']['social_twitter'] ) ) { ?>
						<a class="tw" href="<?php echo esc_url( $this->plugin_settings['modules']['social_twitter'] ); ?>">twitter</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_facebook'] ) ) { ?>
						<a class="fb" href="<?php echo esc_url( $this->plugin_settings['modules']['social_facebook'] ); ?>">facebook</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_instagram'] ) ) { ?>
						<a class="instagram" href="<?php echo esc_url( $this->plugin_settings['modules']['social_instagram'] ); ?>">instagram</a>
					<?php } ?>    

					<?php if ( ! empty( $this->plugin_settings['modules']['social_pinterest'] ) ) { ?>
						<a class="pin" href="<?php echo esc_url( $this->plugin_settings['modules']['social_pinterest'] ); ?>">pinterest</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_github'] ) ) { ?>
						<a class="git" href="<?php echo esc_url( $this->plugin_settings['modules']['social_github'] ); ?>">github</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_dribbble'] ) ) { ?>
						<a class="dribbble" href="<?php echo esc_url( $this->plugin_settings['modules']['social_dribbble'] ); ?>">dribbble</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_google+'] ) ) { ?>
						<a class="gplus" href="<?php echo esc_url( $this->plugin_settings['modules']['social_google+'] ); ?>">google plus</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_linkedin'] ) ) { ?>
						<a class="linkedin" href="<?php echo esc_url( $this->plugin_settings['modules']['social_linkedin'] ); ?>">linkedin</a>
					<?php } ?>
				</div>
			<?php } ?>
		
						<?php if ( ! empty( $this->plugin_settings['modules']['contact_status'] ) && $this->plugin_settings['modules']['contact_status'] === 1 ) { ?>
				<!-- Contact -->
				<div class="contact">
					<?php list($open, $close) = ! empty( $this->plugin_settings['modules']['contact_effects'] ) && strstr( $this->plugin_settings['modules']['contact_effects'], '|' ) ? explode( '|', $this->plugin_settings['modules']['contact_effects'] ) : explode( '|', 'move_top|move_bottom' ); ?>
					<div class="form <?php echo esc_attr( $open ); ?>">
						<span class="close-contact_form">
							<img src="<?php echo esc_url( WPMM_URL . 'assets/images/close.svg' ); ?>" alt="">
						</span>

						<form class="contact_form">
							<?php do_action( 'wpmm_contact_form_start' ); ?>

							<p class="col">
								<input type="text" placeholder="<?php esc_attr_e( 'Name', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" name="name" class="name_input" />
							</p>
							<p class="col last">
								<input type="text" placeholder="<?php esc_attr_e( 'E-mail', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-rule-email="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" data-msg-email="<?php esc_attr_e( 'Please enter a valid email address.', 'wp-maintenance-mode' ); ?>" name="email" class="email_input" />
							</p>

							<br clear="all" />

							<?php do_action( 'wpmm_contact_form_before_message' ); ?>

							<p>
								<textarea placeholder="<?php esc_attr_e( 'Your message', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" name="content" class="content_textarea"></textarea>
							</p>

							<?php do_action( 'wpmm_contact_form_after_message' ); ?>

							<?php if ( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
								<div class="privacy_checkbox">
									<label>
										<input type="checkbox" name="acceptance" value="YES" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" />

										<?php echo esc_html_x( 'I\'ve read and agree with the site\'s privacy policy', 'contact form', 'wp-maintenance-mode' ); ?>
									</label>
								</div>

								<?php if ( ! empty( $this->plugin_settings['gdpr']['contact_form_tail'] ) ) { ?>
									<p class="privacy_tail"><?php echo wp_kses( $this->plugin_settings['gdpr']['contact_form_tail'], wpmm_gdpr_textarea_allowed_html() ); ?></p>
								<?php } ?>
							<?php } ?>

							<p class="submit"><input type="submit" value="<?php esc_attr_e( 'Send', 'wp-maintenance-mode' ); ?>" /></p>

							<?php do_action( 'wpmm_contact_form_end' ); ?>
						</form>
					</div>
				</div>

				<a class="contact_us" href="javascript:void(0);" data-open="<?php echo esc_attr( $open ); ?>" data-close="<?php echo esc_attr( $close ); ?>"><?php esc_html_e( 'Contact us', 'wp-maintenance-mode' ); ?></a>
			<?php } ?>

			<?php
			if (
					( ! empty( $this->plugin_settings['general']['admin_link'] ) && $this->plugin_settings['general']['admin_link'] === 1 ) ||
					( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 )
			) {
				?>
				<!-- Footer links -->
				<div class="footer_links">
					<?php if ( $this->plugin_settings['general']['admin_link'] === 1 ) { ?>
						<a href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Dashboard', 'wp-maintenance-mode' ); ?></a> 
					<?php } ?>

					<?php if ( $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
						<a href="<?php echo esc_url( $this->plugin_settings['gdpr']['policy_page_link'] ); ?>" target="<?php echo ! empty( $this->plugin_settings['gdpr']['policy_page_target'] ) && $this->plugin_settings['gdpr']['policy_page_target'] === 1 ? '_blank' : '_self'; ?>"><?php echo esc_html( $this->plugin_settings['gdpr']['policy_page_label'] ); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
			
			</div><!-- /wrap -->
                      </div> <!-- /floating -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-md-none card-img-body border-0 p-0 m-0">
              <div class="container-fluid h-100 m-0 p-0" dir="ltr" style="direction: ltr;">
                <div class="row justify-content-center h-100">
                  <div class="col-12 bg-transparent text-white">
                    <div id="floating-text" class="card border-0 h-100 text-white text-center w-100 p-3">
                      <div class="m-auto p-0 small-screen text-dark">
                       
					   <!-- Text -->
						<?php echo $text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				
			
			
			<div class="wrap">
			
			
						<?php if ( ! empty( $this->plugin_settings['modules']['countdown_status'] ) && $this->plugin_settings['modules']['countdown_status'] === 1 ) { ?>
				<!-- Countdown -->
				<div class="countdown" data-start="<?php echo esc_attr( date( 'F d, Y H:i:s', strtotime( $countdown_start ) ) ); ?>" data-end="<?php echo esc_attr( date( 'F d, Y H:i:s', $countdown_end ) ); ?>"></div>
			<?php } ?>
			
			
						<?php
			/**
			 * When the bot feature is enabled, the subscribe form is not displayed anymore.
			 */
			if (
					( ! empty( $this->plugin_settings['modules']['subscribe_status'] ) && $this->plugin_settings['modules']['subscribe_status'] === 1 ) &&
					( isset( $this->plugin_settings['bot']['status'] ) && $this->plugin_settings['bot']['status'] === 0 )
			) {
				?>
				<!-- Subscribe -->
				<?php if ( ! empty( $this->plugin_settings['modules']['subscribe_text'] ) ) { ?>
					<h3><?php echo esc_html( $this->plugin_settings['modules']['subscribe_text'] ); ?></h3>
				<?php } ?>

				<div class="subscribe_wrapper" style="min-height: 100px;">
					<form class="subscribe_form">
						<div class="subscribe_border">
							<input type="text" placeholder="<?php esc_attr_e( 'your e-mail...', 'wp-maintenance-mode' ); ?>" name="email" class="email_input" data-rule-required="true" data-rule-email="true" data-rule-required="true" data-rule-email="true" />
							<input type="submit" value="<?php esc_attr_e( 'Subscribe', 'wp-maintenance-mode' ); ?>" />
						</div>
						<?php if ( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
							<div class="privacy_checkbox">
								<label>
									<input type="checkbox" name="acceptance" value="YES" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" />

									<?php echo esc_html_x( 'I\'ve read and agree with the site\'s privacy policy', 'subscribe form', 'wp-maintenance-mode' ); ?>
								</label>
							</div>

							<?php if ( ! empty( $this->plugin_settings['gdpr']['subscribe_form_tail'] ) ) { ?>
								<p class="privacy_tail"><?php echo wp_kses( $this->plugin_settings['gdpr']['subscribe_form_tail'], wpmm_gdpr_textarea_allowed_html() ); ?></p>
							<?php } ?>
						<?php } ?>
					</form>
				</div>
			<?php } ?>
			
			
			<?php if ( ! empty( $this->plugin_settings['modules']['social_status'] ) && $this->plugin_settings['modules']['social_status'] === 1 ) { ?>
				<!-- Social networks -->        
				<div class="social" data-target="<?php echo ! empty( $this->plugin_settings['modules']['social_target'] ) ? 1 : 0; ?>">
					<?php if ( ! empty( $this->plugin_settings['modules']['social_twitter'] ) ) { ?>
						<a class="tw" href="<?php echo esc_url( $this->plugin_settings['modules']['social_twitter'] ); ?>">twitter</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_facebook'] ) ) { ?>
						<a class="fb" href="<?php echo esc_url( $this->plugin_settings['modules']['social_facebook'] ); ?>">facebook</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_instagram'] ) ) { ?>
						<a class="instagram" href="<?php echo esc_url( $this->plugin_settings['modules']['social_instagram'] ); ?>">instagram</a>
					<?php } ?>    

					<?php if ( ! empty( $this->plugin_settings['modules']['social_pinterest'] ) ) { ?>
						<a class="pin" href="<?php echo esc_url( $this->plugin_settings['modules']['social_pinterest'] ); ?>">pinterest</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_github'] ) ) { ?>
						<a class="git" href="<?php echo esc_url( $this->plugin_settings['modules']['social_github'] ); ?>">github</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_dribbble'] ) ) { ?>
						<a class="dribbble" href="<?php echo esc_url( $this->plugin_settings['modules']['social_dribbble'] ); ?>">dribbble</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_google+'] ) ) { ?>
						<a class="gplus" href="<?php echo esc_url( $this->plugin_settings['modules']['social_google+'] ); ?>">google plus</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_linkedin'] ) ) { ?>
						<a class="linkedin" href="<?php echo esc_url( $this->plugin_settings['modules']['social_linkedin'] ); ?>">linkedin</a>
					<?php } ?>
				</div>
			<?php } ?>
		
						<?php if ( ! empty( $this->plugin_settings['modules']['contact_status'] ) && $this->plugin_settings['modules']['contact_status'] === 1 ) { ?>
				<!-- Contact -->
				<div class="contact">
					<?php list($open, $close) = ! empty( $this->plugin_settings['modules']['contact_effects'] ) && strstr( $this->plugin_settings['modules']['contact_effects'], '|' ) ? explode( '|', $this->plugin_settings['modules']['contact_effects'] ) : explode( '|', 'move_top|move_bottom' ); ?>
					<div class="form <?php echo esc_attr( $open ); ?>">
						<span class="close-contact_form">
							<img src="<?php echo esc_url( WPMM_URL . 'assets/images/close.svg' ); ?>" alt="">
						</span>

						<form class="contact_form">
							<?php do_action( 'wpmm_contact_form_start' ); ?>

							<p class="col">
								<input type="text" placeholder="<?php esc_attr_e( 'Name', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" name="name" class="name_input" />
							</p>
							<p class="col last">
								<input type="text" placeholder="<?php esc_attr_e( 'E-mail', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-rule-email="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" data-msg-email="<?php esc_attr_e( 'Please enter a valid email address.', 'wp-maintenance-mode' ); ?>" name="email" class="email_input" />
							</p>

							<br clear="all" />

							<?php do_action( 'wpmm_contact_form_before_message' ); ?>

							<p>
								<textarea placeholder="<?php esc_attr_e( 'Your message', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" name="content" class="content_textarea"></textarea>
							</p>

							<?php do_action( 'wpmm_contact_form_after_message' ); ?>

							<?php if ( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
								<div class="privacy_checkbox">
									<label>
										<input type="checkbox" name="acceptance" value="YES" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" />

										<?php echo esc_html_x( 'I\'ve read and agree with the site\'s privacy policy', 'contact form', 'wp-maintenance-mode' ); ?>
									</label>
								</div>

								<?php if ( ! empty( $this->plugin_settings['gdpr']['contact_form_tail'] ) ) { ?>
									<p class="privacy_tail"><?php echo wp_kses( $this->plugin_settings['gdpr']['contact_form_tail'], wpmm_gdpr_textarea_allowed_html() ); ?></p>
								<?php } ?>
							<?php } ?>

							<p class="submit"><input type="submit" value="<?php esc_attr_e( 'Send', 'wp-maintenance-mode' ); ?>" /></p>

							<?php do_action( 'wpmm_contact_form_end' ); ?>
						</form>
					</div>
				</div>

				<a class="contact_us" href="javascript:void(0);" data-open="<?php echo esc_attr( $open ); ?>" data-close="<?php echo esc_attr( $close ); ?>"><?php esc_html_e( 'Contact us', 'wp-maintenance-mode' ); ?></a>
			<?php } ?>

			<?php
			if (
					( ! empty( $this->plugin_settings['general']['admin_link'] ) && $this->plugin_settings['general']['admin_link'] === 1 ) ||
					( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 )
			) {
				?>
				<!-- Footer links -->
				<div class="footer_links">
					<?php if ( $this->plugin_settings['general']['admin_link'] === 1 ) { ?>
						<a href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Dashboard', 'wp-maintenance-mode' ); ?></a> 
					<?php } ?>

					<?php if ( $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
						<a href="<?php echo esc_url( $this->plugin_settings['gdpr']['policy_page_link'] ); ?>" target="<?php echo ! empty( $this->plugin_settings['gdpr']['policy_page_target'] ) && $this->plugin_settings['gdpr']['policy_page_target'] === 1 ? '_blank' : '_self'; ?>"><?php echo esc_html( $this->plugin_settings['gdpr']['policy_page_label'] ); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
			</div><!-- /wrap -->
                      </div> <!-- /floating -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
		<?php
			}
			?>

		<?php if ( ! empty( $this->plugin_settings['bot']['status'] ) && $this->plugin_settings['bot']['status'] === 1 ) { ?>
			

			<!-- Bot -->
			<div class="bot-container">
				<div class="bot-chat-wrapper">
					<!-- Chats -->
					<div class="chat-container cf"></div>
					<!-- User input -->
					<div class="input"></div>
					<!-- User choices -->
					<div class="choices cf"></div>
				</div>
			</div>

			<div class="bot-error"><p></p></div>

			<div class="wrap under-bot">
			
			
			
			<?php
			/**
			 * When the bot feature is enabled, the subscribe form is not displayed anymore.
			 */
			if (
					( ! empty( $this->plugin_settings['modules']['subscribe_status'] ) && $this->plugin_settings['modules']['subscribe_status'] === 1 ) &&
					( isset( $this->plugin_settings['bot']['status'] ) && $this->plugin_settings['bot']['status'] === 0 )
			) {
				?>
				<!-- Subscribe -->
				<?php if ( ! empty( $this->plugin_settings['modules']['subscribe_text'] ) ) { ?>
					<h3><?php echo esc_html( $this->plugin_settings['modules']['subscribe_text'] ); ?></h3>
				<?php } ?>

				<div class="subscribe_wrapper" style="min-height: 100px;">
					<form class="subscribe_form">
						<div class="subscribe_border">
							<input type="text" placeholder="<?php esc_attr_e( 'your e-mail...', 'wp-maintenance-mode' ); ?>" name="email" class="email_input" data-rule-required="true" data-rule-email="true" data-rule-required="true" data-rule-email="true" />
							<input type="submit" value="<?php esc_attr_e( 'Subscribe', 'wp-maintenance-mode' ); ?>" />
						</div>
						<?php if ( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
							<div class="privacy_checkbox">
								<label>
									<input type="checkbox" name="acceptance" value="YES" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" />

									<?php echo esc_html_x( 'I\'ve read and agree with the site\'s privacy policy', 'subscribe form', 'wp-maintenance-mode' ); ?>
								</label>
							</div>

							<?php if ( ! empty( $this->plugin_settings['gdpr']['subscribe_form_tail'] ) ) { ?>
								<p class="privacy_tail"><?php echo wp_kses( $this->plugin_settings['gdpr']['subscribe_form_tail'], wpmm_gdpr_textarea_allowed_html() ); ?></p>
							<?php } ?>
						<?php } ?>
					</form>
				</div>
			<?php } ?>
			
			
						<?php if ( ! empty( $this->plugin_settings['modules']['social_status'] ) && $this->plugin_settings['modules']['social_status'] === 1 ) { ?>
				<!-- Social networks -->        
				<div class="social" data-target="<?php echo ! empty( $this->plugin_settings['modules']['social_target'] ) ? 1 : 0; ?>">
					<?php if ( ! empty( $this->plugin_settings['modules']['social_twitter'] ) ) { ?>
						<a class="tw" href="<?php echo esc_url( $this->plugin_settings['modules']['social_twitter'] ); ?>">twitter</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_facebook'] ) ) { ?>
						<a class="fb" href="<?php echo esc_url( $this->plugin_settings['modules']['social_facebook'] ); ?>">facebook</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_instagram'] ) ) { ?>
						<a class="instagram" href="<?php echo esc_url( $this->plugin_settings['modules']['social_instagram'] ); ?>">instagram</a>
					<?php } ?>    

					<?php if ( ! empty( $this->plugin_settings['modules']['social_pinterest'] ) ) { ?>
						<a class="pin" href="<?php echo esc_url( $this->plugin_settings['modules']['social_pinterest'] ); ?>">pinterest</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_github'] ) ) { ?>
						<a class="git" href="<?php echo esc_url( $this->plugin_settings['modules']['social_github'] ); ?>">github</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_dribbble'] ) ) { ?>
						<a class="dribbble" href="<?php echo esc_url( $this->plugin_settings['modules']['social_dribbble'] ); ?>">dribbble</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_google+'] ) ) { ?>
						<a class="gplus" href="<?php echo esc_url( $this->plugin_settings['modules']['social_google+'] ); ?>">google plus</a>
					<?php } ?>

					<?php if ( ! empty( $this->plugin_settings['modules']['social_linkedin'] ) ) { ?>
						<a class="linkedin" href="<?php echo esc_url( $this->plugin_settings['modules']['social_linkedin'] ); ?>">linkedin</a>
					<?php } ?>
				</div>
			<?php } ?>
		
						<?php if ( ! empty( $this->plugin_settings['modules']['contact_status'] ) && $this->plugin_settings['modules']['contact_status'] === 1 ) { ?>
				<!-- Contact -->
				<div class="contact">
					<?php list($open, $close) = ! empty( $this->plugin_settings['modules']['contact_effects'] ) && strstr( $this->plugin_settings['modules']['contact_effects'], '|' ) ? explode( '|', $this->plugin_settings['modules']['contact_effects'] ) : explode( '|', 'move_top|move_bottom' ); ?>
					<div class="form <?php echo esc_attr( $open ); ?>">
						<span class="close-contact_form">
							<img src="<?php echo esc_url( WPMM_URL . 'assets/images/close.svg' ); ?>" alt="">
						</span>

						<form class="contact_form">
							<?php do_action( 'wpmm_contact_form_start' ); ?>

							<p class="col">
								<input type="text" placeholder="<?php esc_attr_e( 'Name', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" name="name" class="name_input" />
							</p>
							<p class="col last">
								<input type="text" placeholder="<?php esc_attr_e( 'E-mail', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-rule-email="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" data-msg-email="<?php esc_attr_e( 'Please enter a valid email address.', 'wp-maintenance-mode' ); ?>" name="email" class="email_input" />
							</p>

							<br clear="all" />

							<?php do_action( 'wpmm_contact_form_before_message' ); ?>

							<p>
								<textarea placeholder="<?php esc_attr_e( 'Your message', 'wp-maintenance-mode' ); ?>" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" name="content" class="content_textarea"></textarea>
							</p>

							<?php do_action( 'wpmm_contact_form_after_message' ); ?>

							<?php if ( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
								<div class="privacy_checkbox">
									<label>
										<input type="checkbox" name="acceptance" value="YES" data-rule-required="true" data-msg-required="<?php esc_attr_e( 'This field is required.', 'wp-maintenance-mode' ); ?>" />

										<?php echo esc_html_x( 'I\'ve read and agree with the site\'s privacy policy', 'contact form', 'wp-maintenance-mode' ); ?>
									</label>
								</div>

								<?php if ( ! empty( $this->plugin_settings['gdpr']['contact_form_tail'] ) ) { ?>
									<p class="privacy_tail"><?php echo wp_kses( $this->plugin_settings['gdpr']['contact_form_tail'], wpmm_gdpr_textarea_allowed_html() ); ?></p>
								<?php } ?>
							<?php } ?>

							<p class="submit"><input type="submit" value="<?php esc_attr_e( 'Send', 'wp-maintenance-mode' ); ?>" /></p>

							<?php do_action( 'wpmm_contact_form_end' ); ?>
						</form>
					</div>
				</div>

				<a class="contact_us" href="javascript:void(0);" data-open="<?php echo esc_attr( $open ); ?>" data-close="<?php echo esc_attr( $close ); ?>"><?php esc_html_e( 'Contact us', 'wp-maintenance-mode' ); ?></a>
			<?php } ?>

			<?php
			if (
					( ! empty( $this->plugin_settings['general']['admin_link'] ) && $this->plugin_settings['general']['admin_link'] === 1 ) ||
					( ! empty( $this->plugin_settings['gdpr']['status'] ) && $this->plugin_settings['gdpr']['status'] === 1 )
			) {
				?>
				<!-- Footer links -->
				<div class="footer_links">
					<?php if ( $this->plugin_settings['general']['admin_link'] === 1 ) { ?>
						<a href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Dashboard', 'wp-maintenance-mode' ); ?></a> 
					<?php } ?>

					<?php if ( $this->plugin_settings['gdpr']['status'] === 1 ) { ?>
						<a href="<?php echo esc_url( $this->plugin_settings['gdpr']['policy_page_link'] ); ?>" target="<?php echo ! empty( $this->plugin_settings['gdpr']['policy_page_target'] ) && $this->plugin_settings['gdpr']['policy_page_target'] === 1 ? '_blank' : '_self'; ?>"><?php echo esc_html( $this->plugin_settings['gdpr']['policy_page_label'] ); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
		
		<?php } ?>

		
		</div>

		<script type='text/javascript'>
			var wpmm_vars = {"ajax_url": "<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>"};
		</script>

		<?php
		do_action( 'wm_footer' ); // this hook will be removed in the next versions
		do_action( 'wpmm_footer' );
		?>
	</body>
</html>
