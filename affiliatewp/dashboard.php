<?php $active_tab = affwp_get_active_affiliate_area_tab(); ?>

<div id="affwp-affiliate-dashboard" style="min-height: 350px;">

	<?php if ( 'pending' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<p class="has-text-align-center"><strong>Sua inscrição foi enviada com sucesso!</strong> <?php echo do_shortcode('[icone prefixo="fas" nome="heart" cor="rosa"]'); ?>
		<br>Agora é só aguardar. Você receberá um email de confirmação em breve.</p>
		<p class="has-text-align-center"><em>Não esqueça de checar sua caixa de spam, ok?</em></p>

	<?php elseif ( 'inactive' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<p class="has-text-align-center">Sua inscrição não está mais ativa ou foi excluída do sistema.<br>Por favor, entre em contato caso tenha dúvidas.</p>

	<?php elseif ( 'rejected' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<p class="has-text-align-center">Infelizmente sua aplicação foi revogada. :(</p>

	<?php endif; ?>

	<?php if ( 'active' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<?php
		/**
		 * Fires at the top of the affiliate dashboard.
		 *
		 * @since 0.2
		 * @since 1.8.2 Added the `$active_tab` parameter.
		 *
		 * @param int|false $affiliate_id ID for the current affiliate.
		 * @param string    $active_tab   Slug for the currently-active tab.
		 */
		do_action( 'affwp_affiliate_dashboard_top', affwp_get_affiliate_id(), $active_tab );
		?>

		<?php if ( ! empty( $_GET['affwp_notice'] ) && 'profile-updated' == $_GET['affwp_notice'] ) : ?>

			<p class="affwp-notice"><?php _e( 'Your affiliate profile has been updated', 'affiliate-wp' ); ?></p>

		<?php endif; ?>

		<?php
		/**
		 * Fires inside the affiliate dashboard above the tabbed interface.
		 *
		 * @since 0.2
		 * @since 1.8.2 Added the `$active_tab` parameter.
		 *
		 * @param int|false $affiliate_id ID for the current affiliate.
		 * @param string    $active_tab   Slug for the currently-active tab.
		 */
		do_action( 'affwp_affiliate_dashboard_notices', affwp_get_affiliate_id(), $active_tab );
		$pgConta = wc_get_page_permalink( 'myaccount' );
		?>

		<div class="woocommerce-MyAccount-navigation">
			<div class="menu-afiliada"><i class="fas fa-stream"></i> Menu da afiliação</div>
			<ul>
				<li class="--voltarpainel">
					<a href="<?php echo $pgConta; ?>"><span class="nome">Voltar</span></a>
				</li>
				<?php

				$tabs = affwp_get_affiliate_area_tabs();

				if ( $tabs ) {
					foreach ( $tabs as $tab_slug => $tab_title ) : ?>
						<?php
							if ( affwp_affiliate_area_show_tab( $tab_slug ) ) : 
							if ($tab_slug == 'urls') $tab_title = 'Divulgação';
							if ($tab_slug == 'settings') $tab_title = 'Perfil';
							if ($tab_slug == 'creatives') $tab_title = 'Banners';
							if ($tab_slug == 'coupons') $tab_title = 'Cupons';
							
						?>
						<li class="affwp-affiliate-dashboard-tab--<?php echo $tab_slug; echo $active_tab == $tab_slug ? ' is-active' : ''; ?>">
							<a href="<?php echo esc_url( affwp_get_affiliate_area_page_url( $tab_slug ) ); ?>"><span class="nome"><?php echo $tab_title; ?></span></a>
						</li>
						<?php endif; ?>
					<?php endforeach;
				}

				/**
				 * Fires immediately after core Affiliate Area tabs are output,
				 * but before the 'Log Out' tab is output (if enabled).
				 *
				 * @since 1.0
				 *
				 * @param int    $affiliate_id ID of the current affiliate.
				 * @param string $active_tab   Slug of the active tab.
				 */
				do_action( 'affwp_affiliate_dashboard_tabs', affwp_get_affiliate_id(), $active_tab );
				
				?>
				
				<li class="woocommerce-MyAccount-navigation-link--customer-logout">
					<a href="<?php echo esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) ?>"><span class="nome">Sair</span></a>
				</li>
			</ul>

		</div>


		<?php
		if ( ! empty( $active_tab ) && affwp_affiliate_area_show_tab( $active_tab ) ) :
			echo affwp_render_affiliate_dashboard_tab( $active_tab );
		endif;
		?>

		<?php
		/**
		 * Fires at the bottom of the affiliate dashboard.
		 *
		 * @since 0.2
		 * @since 1.8.2 Added the `$active_tab` parameter.
		 *
		 * @param int|false $affiliate_id ID for the current affiliate.
		 * @param string    $active_tab   Slug for the currently-active tab.
		 */
		do_action( 'affwp_affiliate_dashboard_bottom', affwp_get_affiliate_id(), $active_tab );
		?>

		

	<?php endif; ?>

</div>
