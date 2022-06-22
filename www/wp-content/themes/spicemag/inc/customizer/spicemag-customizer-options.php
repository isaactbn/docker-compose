<?php
/**
 * Customizer section options.
 *
 * @package spicemag
 *
 */

function spicemag_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'designexo_footer_copright_text',
			array(
				'sanitize_callback' =>  'spicemag_sanitize_text',
				'default' => __('Copyright &copy; 2022 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> SpiceMag theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'spicemag'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('designexo_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','spicemag'),
				'section' => 'designexo_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'spicemag_customizer_theme_settings' );

function spicemag_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}