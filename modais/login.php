<?php 
echo '<div id="customer_login">';
	echo '<h2 class="has-text-align-center cursivo">Faça seu login</h2>';
	echo '<form class="woocommerce-form woocommerce-form-login login afc-login" method="post">';
		do_action( 'woocommerce_login_form_start' );

			echo '<label for="username"><input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="'.(!empty($_POST['username']) ? esc_attr( wp_unslash( $_POST['username'] ) ) : '').'" placeholder="Email ou nome de usuário" /><i class="fal fa-user"></i></label>';

			echo '<label for="password"><input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" /><i class="fal fa-lock-alt"></i></label>';

		do_action( 'woocommerce_login_form' );

			echo '<div class="lembrar-logar">';

				echo '<div>'; 
					echo '<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme lembrar-login"><input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Quero me manter logada</span></label>';
					echo '<p class="woocommerce-LostPassword lost_password"><a href="'.esc_url( wp_lostpassword_url() ).'">Ih! Esqueci minha senha.</a></p>';
				echo '</div>';

				wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' );

				echo '<button type="submit" class="button azul" name="login" value="Entrar">Entrar</button>';

			echo '</div>';
			
		do_action( 'woocommerce_login_form_end' );
	echo '</form>';	
echo '</div>';
