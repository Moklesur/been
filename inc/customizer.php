<?php
/**
 * ThemeTim WordPress Framework Theme Customizer.
 *
 * @package ThemeTim_WordPress_Framework
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themetim_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'title_tagline' )->title = __('Header', 'text_domain');
	$wp_customize->remove_section( 'background_image' );

	/**
	 * Class ThemeTim Divider
	 */
	class themetim_divider extends WP_Customize_Control {
		public $type = 'divider';
		public $label = '';
		public function render_content() { ?>
			<h3 style="margin-top:15px; margin-bottom:0;background:#2cde9a;padding:9px 5px;color:#fff;text-transform:uppercase; text-align: center;letter-spacing: 2px;"><?php echo esc_html( $this->label ); ?></h3>
			<?php
		}
	}

	/**
	 * ThemeTim Page
	 */

	if (class_exists('WP_Customize_Control')) {
		class WP_Customize_Pages_Control extends WP_Customize_Control {
			/**
			 * Render the control's content.
			 */
			public function render_content() {
				$get_page = wp_dropdown_pages(
					array(
						'name'                  => '_default_pages_' . $this->id,
						'depth'                 => 0,
						'child_of'              => 0,
						'echo'                  => 0,
						'id'                    => null, // string
						'class'                 => null, // string
						'show_option_none'      => __( '&mdash; Select &mdash;' ), // string
						'show_option_no_change' => null, // string
						'option_none_value'     => '0', // string
						'selected'              => $this->value(),
					)
				);

				$get_page = str_replace( '<select', '<select ' . $this->get_link(), $get_page );

				printf(
					'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
					$this->label,
					$get_page
				);
			}
		}
	}

	/*********************************************
	 * General
	 *********************************************/
	$wp_customize->add_section( 'general_settings', array(
		'title' => __( 'General Settings', 'text_domain' ),
		'description' => '',
		'priority' => 15,
	) );

	/*********************************************
	 * Social Links
	 *********************************************/
	$wp_customize->add_section( 'social_settings', array(
		'title' => __( 'Social Media', 'text_domain' ),
		'description' => '',
		'priority' => 60,
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'header_social', array(
			'label' => __('Header Social', 'themetidy'),
			'section' => 'social_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/********************* Header Social ************************/
	$wp_customize->add_setting( 'header_fb', array(
		'default'           => 'https://www.facebook.com/',
	) );
	$wp_customize->add_control( 'header_fb', array(
		'label' => __( 'Facebook', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_fb'
	) );
	$wp_customize->add_setting( 'header_tw', array(
		'default'           => 'https://twitter.com',
	) );
	$wp_customize->add_control( 'header_tw', array(
		'label' => __( 'Twitter', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_tw'
	) );
	$wp_customize->add_setting( 'header_li', array(
		'default'           => 'https://linkedin.com',
	) );
	$wp_customize->add_control( 'header_li', array(
		'label' => __( 'Linkedin', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_li'
	) );
	$wp_customize->add_setting( 'header_pint', array(
		'default'           => 'https://pinterest.com',
	) );
	$wp_customize->add_control( 'header_pint', array(
		'label' => __( 'Pinterest', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_pint'
	) );
	$wp_customize->add_setting( 'header_ins', array(
		'default'           => 'https://instagram.com',
	) );
	$wp_customize->add_control( 'header_ins', array(
		'label' => __( 'Instagram', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_ins'
	) );
	$wp_customize->add_setting( 'header_dri', array(
		'default'           => 'https://dribbble.com',
	) );
	$wp_customize->add_control( 'header_dri', array(
		'label' => __( 'Dribbble', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_dri'
	) );
	$wp_customize->add_setting( 'header_plus', array(
		'default'           => 'https://plus.google.com',
	) );
	$wp_customize->add_control( 'header_plus', array(
		'label' => __( 'Plus Google', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_plus'
	) );
	$wp_customize->add_setting( 'header_you', array(
		'default'           => 'https://youtube.com',
	) );
	$wp_customize->add_control( 'header_you', array(
		'label' => __( 'YouTube', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_you'
	) );

	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'footer_social', array(
			'label' => __('Footer Social', 'text_domain'),
			'section' => 'social_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/********************* Footer Social ************************/
	$wp_customize->add_setting( 'social_footer_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'social_footer_enable', array(
		'label' => __( 'Enable Footer Social', 'text_domain' ),
		'type' => 'checkbox',
		'section' => 'social_settings',
		'settings' => 'social_footer_enable'
	) );

	$wp_customize->add_setting( 'footer_fb', array(
		'default'           => 'https://www.facebook.com/',
	) );
	$wp_customize->add_control( 'footer_fb', array(
		'label' => __( 'Facebook', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_fb'
	) );
	$wp_customize->add_setting( 'footer_tw', array(
		'default'           => 'https://twitter.com',
	) );
	$wp_customize->add_control( 'footer_tw', array(
		'label' => __( 'Twitter', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_tw'
	) );
	$wp_customize->add_setting( 'footer_li', array(
		'default'           => 'https://linkedin.com',
	) );
	$wp_customize->add_control( 'footer_li', array(
		'label' => __( 'Linkedin', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_li'
	) );
	$wp_customize->add_setting( 'footer_pint', array(
		'default'           => 'https://pinterest.com',
	) );
	$wp_customize->add_control( 'footer_pint', array(
		'label' => __( 'Pinterest', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_pint'
	) );
	$wp_customize->add_setting( 'footer_ins', array(
		'default'           => 'https://instagram.com',
	) );
	$wp_customize->add_control( 'footer_ins', array(
		'label' => __( 'Instagram', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_ins'
	) );
	$wp_customize->add_setting( 'footer_dri', array(
		'default'           => 'https://dribbble.com',
	) );
	$wp_customize->add_control( 'footer_dri', array(
		'label' => __( 'Dribbble', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_dri'
	) );
	$wp_customize->add_setting( 'footer_plus', array(
		'default'           => 'https://plus.google.com',
	) );
	$wp_customize->add_control( 'footer_plus', array(
		'label' => __( 'Plus Google', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_plus'
	) );
	$wp_customize->add_setting( 'footer_you', array(
		'default'           => 'https://youtube.com',
	) );
	$wp_customize->add_control( 'footer_you', array(
		'label' => __( 'YouTube', 'text_domain' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'footer_you'
	) );

	/*********************************************
	 * Header
	 *********************************************/
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'header_logo', array(
			'label' => __('Logo', 'themetidy'),
			'section' => 'title_tagline',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/********************* Logo ************************/
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'site_logo',
			array(
				'label'          => __( '', 'text_domain' ),
				'type'           => 'image',
				'section'        => 'title_tagline',
			)
		)
	);
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'header_top', array(
			'label' => __('Header Top', 'themetidy'),
			'section' => 'title_tagline',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/********************* Top Header ************************/
	$wp_customize->add_setting( 'social_header_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'social_header_enable', array(
		'label' => __( 'Enable Header Social', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('## Please Go Back To Social Media Settings For Social Links ##', 'text_domain'),
		'section' => 'title_tagline',
		'settings' => 'social_header_enable'
	) );
	$wp_customize->add_setting( 'top_header_account_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'top_header_account_enable', array(
		'label' => __( 'Enable Login Register', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'title_tagline',
		'settings' => 'top_header_account_enable'
	) );

	$wp_customize->add_setting( 'top_header_account', array(
		'default'           => 'Account',
	) );
	$wp_customize->add_control( 'top_header_account', array(
		'label' => __( 'My Account', 'text_domain' ),
		'type' => 'text',
		'section' => 'title_tagline',
		'settings' => 'top_header_account',
		'description'   => __('## Title of the link ##', 'text_domain')
	) );

	$wp_customize->add_setting(
		'header_myaccount'
	);
	$wp_customize->add_control(
		new WP_Customize_Pages_Control(
			$wp_customize,
			'header_myaccount',
			array(
				'label'    => 'My Account Page',
				'settings' => 'header_myaccount',
				'section'  => 'title_tagline'
			)
		)
	);

	$wp_customize->add_setting(
		'header_login_register'
	);
	$wp_customize->add_control(
		new WP_Customize_Pages_Control(
			$wp_customize,
			'header_login_register',
			array(
				'label'    => 'Login / Register Page',
				'settings' => 'header_login_register',
				'section'  => 'title_tagline'
			)
		)
	);
	$wp_customize->add_setting( 'cart_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'cart_enable', array(
		'label' => __( 'Enable Cart', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'title_tagline',
		'settings' => 'cart_enable'
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'header_bottom', array(
			'label' => __('Bottom Header', 'themetidy'),
			'section' => 'title_tagline',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting( 'bottom_header_search', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'bottom_header_search', array(
		'label' => __( 'Enable Search', 'text_domain' ),
		'type' => 'checkbox',
		'section' => 'title_tagline',
		'settings' => 'bottom_header_search'
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'header_favicon', array(
			'label' => __('Favicon', 'themetidy'),
			'section' => 'title_tagline',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/*********************************************
	 * Footer
	 *********************************************/
	$wp_customize->add_section( 'footer_settings', array(
		'title' => __( 'Footer', 'text_domain' ),
		'description' => '',
		'priority' => 20,
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'footer_top', array(
			'label' => __('Top Footer', 'themetidy'),
			'section' => 'footer_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/********************* Top Footer ************************/
	$wp_customize->add_setting( 'social_footer_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'social_footer_enable', array(
		'label' => __( 'Enable Footer Social', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('## Please Go Back To Social Media Settings For Social Links ##', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'social_footer_enable'
	) );

	$wp_customize->add_setting( 'newsletter_footer_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'newsletter_footer_enable', array(
		'label' => __( 'Enable Footer Newsletter', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'newsletter_footer_enable'
	) );
	$wp_customize->add_setting( 'top_footer_newsletter_title', array(
		'default'           => 'Newsletter',
	) );
	$wp_customize->add_control( 'top_footer_newsletter_title', array(
		'label' => __( 'Heading', 'text_domain' ),
		'type' => 'text',
		'section' => 'footer_settings',
		'settings' => 'top_footer_newsletter_title',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'top_footer_newsletter_url', array(
		'default'           => 'https://www.yourmailchimpurl.com',
	) );
	$wp_customize->add_control( 'top_footer_newsletter_url', array(
		'label' => __( 'Mail Chimp URL', 'text_domain' ),
		'type' => 'textarea',
		'section' => 'footer_settings',
		'settings' => 'top_footer_newsletter_url',
		'description'   => __('', 'text_domain')
	) );

	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'footer_middle', array(
			'label' => __('Middle Footer', 'themetidy'),
			'section' => 'footer_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);

	/********************* Middle Footer ************************/
	$wp_customize->add_setting( 'middle_footer_text_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'middle_footer_text_enable', array(
		'label' => __( 'Enable Description', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'middle_footer_text_enable'
	) );

	$wp_customize->add_setting( 'middle_footer_text_heading', array(
		'default'           => 'About',
	) );
	$wp_customize->add_control( 'middle_footer_text_heading', array(
		'label' => __( 'Heading', 'text_domain' ),
		'type' => 'text',
		'section' => 'footer_settings',
		'settings' => 'middle_footer_text_heading',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'middle_footer_text', array(
		'default'           => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
	) );
	$wp_customize->add_control( 'middle_footer_text', array(
		'label' => __( 'Description', 'text_domain' ),
		'type' => 'textarea',
		'section' => 'footer_settings',
		'settings' => 'middle_footer_text',
		'description'   => __('', 'text_domain')
	) );


	$wp_customize->add_setting( 'middle_footer_nav_heading_1', array(
		'default'           => 'The Service',
	) );
	$wp_customize->add_control( 'middle_footer_nav_heading_1', array(
		'label' => __( 'Heading', 'text_domain' ),
		'type' => 'text',
		'section' => 'footer_settings',
		'settings' => 'middle_footer_nav_heading_1',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'middle_footer_nav_1_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'middle_footer_nav_1_enable', array(
		'label' => __( 'Enable Nav 1', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'middle_footer_nav_1_enable'
	) );

	$wp_customize->add_setting( 'middle_footer_nav_heading_2', array(
		'default'           => 'Information',
	) );
	$wp_customize->add_control( 'middle_footer_nav_heading_2', array(
		'label' => __( 'Heading', 'text_domain' ),
		'type' => 'text',
		'section' => 'footer_settings',
		'settings' => 'middle_footer_nav_heading_2',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'middle_footer_nav_2_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'middle_footer_nav_2_enable', array(
		'label' => __( 'Enable Nav 2', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'middle_footer_nav_2_enable'
	) );

	$wp_customize->add_setting( 'middle_footer_nav_heading_3', array(
		'default'           => 'Follow Us',
	) );
	$wp_customize->add_control( 'middle_footer_nav_heading_3', array(
		'label' => __( 'Heading', 'text_domain' ),
		'type' => 'text',
		'section' => 'footer_settings',
		'settings' => 'middle_footer_nav_heading_3',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'middle_footer_nav_3_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'middle_footer_nav_3_enable', array(
		'label' => __( 'Enable Nav 3', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'middle_footer_nav_3_enable'
	) );

	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'footer_bottom', array(
			'label' => __('Bottom Footer', 'themetidy'),
			'section' => 'footer_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);
	/********************* Bottom Footer ************************/
	$wp_customize->add_setting( 'bottom_footer_copyright_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'bottom_footer_copyright_enable', array(
		'label' => __( 'Enable Copyright', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'bottom_footer_copyright_enable'
	) );
	$wp_customize->add_setting( 'bottom_footer_copyright', array(
		'default'           => '© 2016 ThemeTim. All Rights Reserved.',
	) );
	$wp_customize->add_control( 'bottom_footer_copyright', array(
		'label' => __( 'Text', 'text_domain' ),
		'type' => 'text',
		'section' => 'footer_settings',
		'settings' => 'bottom_footer_copyright',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'bottom_footer_nav_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'bottom_footer_nav_enable', array(
		'label' => __( 'Enable Nav', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'footer_settings',
		'settings' => 'bottom_footer_nav_enable'
	) );

	/*********************************************
	 * Blog
	 *********************************************/
	$wp_customize->add_section( 'blog_settings', array(
		'title' => __( 'Blog', 'text_domain' ),
		'description' => '',
		'priority' => 81,
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'blog', array(
			'label' => __('Blog Section', 'themetidy'),
			'section' => 'blog_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);
	$wp_customize->add_setting( 'blog_sidebar_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'blog_sidebar_enable', array(
		'label' => __( 'Enable Sidebar', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'blog_settings',
		'settings' => 'blog_sidebar_enable'
	) );
	$wp_customize->add_setting( 'excerpt_lenght', array(
		'default'           => '60',
	) );
	$wp_customize->add_control( 'excerpt_lenght', array(
		'type'        => 'number',
		'section'     => 'blog_settings',
		'settings' => 'excerpt_lenght',
		'label'       => __('Excerpt length', 'text_domain'),
		'description' => __('Excerpt length Default: 60 words', 'text_domain'),
		'input_attrs' => array(
			'min'   => 10,
			'max'   => 200,
			'step'  => 5,
		),
	) );
	$wp_customize->add_setting( 'blog_social_sharing_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'blog_social_sharing_enable', array(
		'label' => __( 'Enable Social Sharing', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'blog_settings',
		'settings' => 'blog_social_sharing_enable'
	) );

	/*********************************************
	 * Shop
	 *********************************************/
	$wp_customize->add_section( 'shop_settings', array(
		'title' => __( 'Shop', 'text_domain' ),
		'description' => '',
		'priority' => 82,
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'shop', array(
			'label' => __('Widget', 'themetidy'),
			'section' => 'shop_settings',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting( 'shop_sidebar_enable', array(
		'default'           => '1',
	) );
	$wp_customize->add_control( 'shop_sidebar_enable', array(
		'label' => __( 'Enable Widget', 'text_domain' ),
		'type' => 'checkbox',
		'description'   => __('', 'text_domain'),
		'section' => 'shop_settings',
		'settings' => 'shop_sidebar_enable'
	) );


	/*********************************************
	 * Color
	 *********************************************/
	$wp_customize->add_setting(
		'bg_text_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bg_text_color',
			array(
				'label'         => __('Body Text Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'bg_text_color'
			)
		)
	);
	$wp_customize->add_setting(
		'heading_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'heading_color',
			array(
				'label'         => __('Heading Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'heading_color'
			)
		)
	);
	$wp_customize->add_setting(
		'link_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'         => __('Link Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'link_color'
			)
		)
	);
	$wp_customize->add_setting(
		'link_hover_color',
		array(
			'default'           => '#555',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_hover_color',
			array(
				'label'         => __('Link Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'link_hover_color'
			)
		)
	);
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'header_color', array(
			'label' => __('Header Color', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting(
		'header_bg_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_bg_color',
			array(
				'label'         => __('Header Background', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'header_bg_color'
			)
		)
	);
	$wp_customize->add_setting(
		'header_text_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_text_color',
			array(
				'label'         => __('Header Text Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'header_text_color'
			)
		)
	);

	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'footer_color', array(
			'label' => __('Footer Color', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting(
		'footer_bg_color',
		array(
			'default'           => '#ddd',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bg_color',
			array(
				'label'         => __('Footer Background', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'footer_bg_color'
			)
		)
	);
	$wp_customize->add_setting(
		'footer_text_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label'         => __('Footer Text Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'footer_text_color'
			)
		)
	);
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'default', array(
			'label' => __('Default Button', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting(
		'btn_default_bg',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_default_bg',
			array(
				'label'         => __('Default BG Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_default_bg'
			)
		)
	);

	$wp_customize->add_setting(
		'btn_default_text',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_default_text',
			array(
				'label'         => __('Default Text Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_default_text'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_default_border',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_default_border',
			array(
				'label'         => __('Default Border Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_default_border'
			)
		)
	);

	$wp_customize->add_setting(
		'btn_default_bg_hover',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_default_bg_hover',
			array(
				'label'         => __('Default BG Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_default_bg_hover'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_default_text_hover',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_default_text_hover',
			array(
				'label'         => __('Default Text Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_default_text_hover'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_default_border_hover',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_default_border_hover',
			array(
				'label'         => __('Default Border Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_default_border_hover'
			)
		)
	);
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'primary', array(
			'label' => __('Primary Button', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting(
		'btn_primary_bg',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_primary_bg',
			array(
				'label'         => __('Primary BG Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_primary_bg'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_primary_text',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_primary_text',
			array(
				'label'         => __('Primary Text Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_primary_text'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_primary_border',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_primary_border',
			array(
				'label'         => __('Primary Border Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_primary_border'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_primary_bg_hover',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_primary_bg_hover',
			array(
				'label'         => __('Primary BG Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_primary_bg_hover'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_primary_text_hover',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_primary_text_hover',
			array(
				'label'         => __('Primary Text Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_primary_text_hover'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_primary_border_hover',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_primary_border_hover',
			array(
				'label'         => __('Primary Border Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_primary_border_hover'
			)
		)
	);
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'success', array(
			'label' => __('Primary Button', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting(
		'btn_success_bg',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_success_bg',
			array(
				'label'         => __('Success BG Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_success_bg'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_success_text',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_success_text',
			array(
				'label'         => __('Success Text Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_success_text'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_success_border',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_success_border',
			array(
				'label'         => __('Success Border Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_success_border'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_success_bg_hover',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_success_bg_hover',
			array(
				'label'         => __('Success BG Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_success_bg_hover'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_success_text_hover',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_success_text_hover',
			array(
				'label'         => __('Success Text Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_success_text_hover'
			)
		)
	);
	$wp_customize->add_setting(
		'btn_success_border_hover',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_success_border_hover',
			array(
				'label'         => __('Success Border Hover Color', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'btn_success_border_hover'
			)
		)
	);

	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'extracolor', array(
			'label' => __('Extra Color', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);
	$wp_customize->add_setting(
		'text_color_1',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_color_1',
			array(
				'label'         => __('Text Color 1', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'text_color_1'
			)
		)
	);
	$wp_customize->add_setting(
		'text_color_2',
		array(
			'default'           => '#ccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_color_2',
			array(
				'label'         => __('Text Color 2', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'text_color_2'
			)
		)
	);
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'extrabg', array(
			'label' => __('Extra BG', 'themetidy'),
			'section' => 'colors',
			'settings' => 'themetim_options[divider]'
		) )
	);
	$wp_customize->add_setting(
		'bg_color_1',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bg_color_1',
			array(
				'label'         => __('BG Color 1', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'bg_color_1'
			)
		)
	);
	$wp_customize->add_setting(
		'bg_color_2',
		array(
			'default'           => '#ccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bg_color_2',
			array(
				'label'         => __('BG Color 2', 'text_domain'),
				'section'       => 'colors',
				'settings'      => 'bg_color_2'
			)
		)
	);

	/*********************************************
	 * Typography
	 *********************************************/
	$wp_customize->add_section( 'typography', array(
		'title' => __( 'Typography', 'text_domain' ),
		'description' => '',
		'priority' => 40,
	) );

	$wp_customize->add_setting(
		'body_font_family',
		array(
			'default' => 'Open+Sans',
			'capability'     => 'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'body_font_family',
		array(
			'type' => 'select',
			'label' => 'Body Font',
			'section' => 'typography',
			'choices' => array(
				'Open+Sans' => 'Open Sans',
				'Abel' => 'Abel',
				'Roboto' => 'Roboto',
				'Cormorant+Garamond' => 'Cormorant Garamond',
				'Lato' => 'Lato',
				'Raleway' => 'Raleway',
				'Oswald' => 'Oswald',
				'Josefin+Slab' => 'Josefin Slab',
				'Dosis' => 'Dosis',
				'Josefin+Sans' => 'Josefin Sans',
				'Tangerine' => 'Tangerine',
				'Gidugu' => 'Gidugu',
				'PT+Sans' => 'PT Sans',
				'PT+Serif' => 'PT Serif',
				'Droid+Sans' => 'Droid Sans',
				'Droid+Serif' => 'Droid Serif',
				'Titillium+Web' => 'Titillium Web',
				'Hind' => 'Hind',
				'Bree+Serif' => 'Bree Serif',
				'Exo' => 'Exo',
				'Exo+2' => 'Exo 2',
				'Play' => 'Play',
			),
		)
	);
	$wp_customize->add_setting( 'body_font_size', array(
		'default'           => '14',
	) );
	$wp_customize->add_control( 'body_font_size', array(
		'label' => __( 'Font Size', 'text_domain' ),
		'type' => 'number',
		'section' => 'typography',
		'settings' => 'body_font_size',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'body_font_weight', array(
		'default'           => '300,400',
	) );
	$wp_customize->add_control( 'body_font_weight', array(
		'label' => __( 'Font Weight', 'text_domain' ),
		'type' => 'text',
		'section' => 'typography',
		'settings' => 'body_font_weight',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting('heading_font_family', array(
		'default'        => 'Open+Sans',
		'capability'     => 'edit_theme_options',
	));
	$wp_customize->add_control( 'heading_font_family', array(
		'label'   => 'Heading Font',
		'section' => 'typography',
		'type'    => 'select',
		'choices' => array(
			'Open+Sans' => 'Open Sans',
			'Abel' => 'Abel',
			'Roboto' => 'Roboto',
			'Cormorant+Garamond' => 'Cormorant Garamond',
			'Lato' => 'Lato',
			'Raleway' => 'Raleway',
			'Oswald' => 'Oswald',
			'Josefin+Slab' => 'Josefin Slab',
			'Dosis' => 'Dosis',
			'Josefin+Sans' => 'Josefin Sans',
			'Tangerine' => 'Tangerine',
			'Gidugu' => 'Gidugu',
			'PT+Sans' => 'PT Sans',
			'PT+Serif' => 'PT Serif',
			'Droid+Sans' => 'Droid Sans',
			'Droid+Serif' => 'Droid Serif',
			'Titillium+Web' => 'Titillium Web',
			'Hind' => 'Hind',
			'Bree+Serif' => 'Bree Serif',
			'Exo' => 'Exo',
			'Exo+2' => 'Exo 2',
			'Play' => 'Play',
		),
	));
	$wp_customize->add_setting( 'heading_font_weight', array(
		'default'           => '400,700',
	) );
	$wp_customize->add_control( 'heading_font_weight', array(
		'label' => __( 'Font Weight', 'text_domain' ),
		'type' => 'text',
		'section' => 'typography',
		'settings' => 'heading_font_weight',
		'description'   => __('', 'text_domain')
	) );
	/**
	 * ThemeTim Divider
	 */
	$wp_customize->add_setting('themetim_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new themetim_divider( $wp_customize, 'section_gap', array(
			'label' => __('Section Gap', 'themetidy'),
			'section' => 'typography',
			'settings' => 'themetim_options[divider]'
		) )
	);

	$wp_customize->add_setting( 'section_gap_1', array(
		'default'           => '80',
	) );
	$wp_customize->add_control( 'section_gap_1', array(
		'label' => __( 'Section Gap 1', 'text_domain' ),
		'type' => 'number',
		'section' => 'typography',
		'settings' => 'section_gap_1',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'section_gap_2', array(
		'default'           => '80',
	) );
	$wp_customize->add_control( 'section_gap_2', array(
		'label' => __( 'Section Gap 2', 'text_domain' ),
		'type' => 'number',
		'section' => 'typography',
		'settings' => 'section_gap_2',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'section_gap_3', array(
		'default'           => '50',
	) );
	$wp_customize->add_control( 'section_gap_3', array(
		'label' => __( 'Section Gap 3', 'text_domain' ),
		'type' => 'number',
		'section' => 'typography',
		'settings' => 'section_gap_3',
		'description'   => __('', 'text_domain')
	) );
	$wp_customize->add_setting( 'section_gap_4', array(
		'default'           => '50',
	) );
	$wp_customize->add_control( 'section_gap_4', array(
		'label' => __( 'Section Gap 4', 'text_domain' ),
		'type' => 'number',
		'section' => 'typography',
		'settings' => 'section_gap_4',
		'description'   => __('', 'text_domain')
	) );


}
add_action( 'customize_register', 'themetim_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themetim_customize_preview_js() {
	wp_enqueue_script( 'themetim_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'themetim_customize_preview_js' );


