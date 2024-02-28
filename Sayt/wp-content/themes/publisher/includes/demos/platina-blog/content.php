<?php
/**
 * Returns content for default demo
 *
 * ->Taxonomies
 * ->Posts
 * ->Options
 * ->Widgets
 * ->Media
 * ->Menus
 *
 *
 * @return array
 */
function publisher_demo_raw_content() {

	$style_id       = 'platina-blog';
	$prefix         = $style_id . '-'; // prevent caching when user installs multiple demos continuously
	$demo_path      = PUBLISHER_THEME_PATH . 'includes/demos/' . $style_id . '/';
	$demo_image_url = publisher_get_demo_images_url( $style_id );

	return array(

		//
		// ->Taxonomies
		//
		'taxonomy' =>
			array(
				'multi_steps' => false,
				array(
					array(
						'name'     => 'Family',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'FASHION',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-1',
							),
						),
						'the_id'    => 'taxonomy.primary.2',
					),
					array(
						'name'     => 'Healthy',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.7',
					),
					array(
						'name'      => 'LIFESTYLE',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'NGO',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'      => 'PHOTOGRAPHY',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Santa Cruz',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'TRAVEL',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Trip',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.10',
					),
				),
			),
		//
		// ->Posts
		//
		'posts'    =>
			array(
				'multi_steps' => false,
				array(
					array(
						'post_title'        => 'Appearances | Daniel Kaluuya',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.146',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Appearances | Karen Elson',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.106',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'The Best Brunch In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.nomadicmatt.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.nomadicmatt.com',
							),
						),
						'the_id'            => 'posts.primary.107',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'How Bitcoin Went Luxury',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.135',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Luxury MBAs, Buyers Beware',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.119',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Royal Portraits In Vogue',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.113',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'In Conversation: Kiki Smith',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.112',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Where To Go In Athens',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.111',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'What Would Neneh Cherry Do?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.110',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Vogue’s Insider Guide To Milan',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.109',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'The Best New Theatre In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.108',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Clara Amfo’s Carnival Playlist',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.104',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'On Our Playlist: Amber Mark',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.140',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'The Best Tapas In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.102',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'How Benefit Cosmetics Stays Young',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.90',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Is Mascara Losing Its Relevance?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.89',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'You Can’t Smell the Internet',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.88',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'The Dawn of Designer Botox?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.85',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Can Aesop Keep Its Cool?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.84',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Fast Fashion for the Face',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.83',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Tracking the Rise of ‘Clean’ Beauty',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.81',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Self Tanning Goes Upscale',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.80',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'The ‘Asian-ification’ of Beauty',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.76',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'The Return Of The Buffet',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.139',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Why I Took An Adult Gap Year',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.137',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Karlie Kloss’s Hi-Tech Essentials',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.142',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'The Best Beaches In The UK',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.171',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Unpacking the Fenty Frenzy',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.87',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Subverting Selfie Culture',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.86',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Can Cannabis Beauty Go Mass?',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.2%%',
							'post_format' => '%%taxonomy.primary.14%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.nomadicmatt.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.nomadicmatt.com',
							),
						),
						'the_id'            => 'posts.primary.82',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'The Bunka Method',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.114',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Best City Breaks',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_format' => '%%taxonomy.primary.14%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.nomadicmatt.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://www.nomadicmatt.com',
							),
						),
						'the_id'            => 'posts.primary.173',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Royal Weddings In Vogue',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.145',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Lil Miquela’s Hi-Tech Essentials',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.148',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Appearances | Adwoa Aboah',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.141',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Father’s Day: Gift Ideas',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.143',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Insider Guide To Rome',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.172',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'London’s Best Bakeries',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.170',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Insider Guide To Seoul',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.162',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'The Meaning Of Meghan',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.144',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Vogue’s Dream Bond Boys',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.147',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'How To Travel Alone',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.169',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'The Vogue Guide To Dublin',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.160',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'London Ice Cream Guide',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.164',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Alexa Chung’s Guide To Tokyo',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.165',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'The Joys Of Adult Backpacking',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.166',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'The Best Burgers In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.167',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Best On-Screen Interiors',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.168',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'About Us',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.195',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-3.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.193',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Content Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/platina-blog/wp-content/uploads/sites/578/2018/11/336x280-post-single.jpg',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.190',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Sidebar Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/platina-blog/wp-content/uploads/sites/578/2018/11/300x250-sidebar-index.jpg',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/',
							),
							array(
								'meta_key'   => 'caption',
								'meta_value' => '- Advertisement -',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.57',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'Newsletter Post Sidebar',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'feedburner',
							),
							array(
								'meta_key'   => 'feedburner_id',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-4',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#0a0a0a',
							),
							array(
								'meta_key'   => 'text_title',
								'meta_value' => 'Subscribe to My Newsletter',
							),
							array(
								'meta_key'   => 'text_desc',
								'meta_value' => '',
							),
							array(
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'     => 'posts.primary.192',
					),
					array(
						'post_type'  => 'bsnp-newsletter',
						'post_title' => 'Newsletter',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'feedburner',
							),
							array(
								'meta_key'   => 'feedburner_id',
								'meta_value' => '#',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-4',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#000000',
							),
							array(
								'meta_key'   => 'text_title',
								'meta_value' => '',
							),
							array(
								'meta_key'   => 'text_desc',
								'meta_value' => '',
							),
							array(
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'     => 'posts.primary.53',
					),
				),
			),
		//
		// ->Options
		//
		'options'  =>
			array(
				'multi_steps' => false,
				array(
					array(
						'type'              => 'option',
						'option_name'       => 'bs_' . 'publisher_theme_options',
						'option_value_file' => $demo_path . 'options.json',
					),
					array(
						'type'          => 'option',
						'option_name'   => 'bs_' . 'publisher_theme_options',
						'option_value'  => array(
							'logo_image'        => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
							'logo_image_retina' => '%%bf_product_demo_media_url:{media.primary.logo-main-retina}:\'full\'%%',
						),
						'merge_options' => true,
					),
					array(
						'type'         => 'option',
						'option_name'  => 'bs_' . 'publisher_theme_options_current_style',
						'option_value' => $style_id,
					),
					array(
						'type'         => 'option',
						'option_name'  => 'bs_' . 'publisher_theme_options_current_demo',
						'option_value' => $style_id,
					),
					array(
						'type'         => 'option',
						'option_name'  => 'page_on_front',
						'option_value' => '%%posts.primary.193%%',
					),
					array(
						'type'         => 'option',
						'option_name'  => 'show_on_front',
						'option_value' => 'page',
					),
					array(
						'type'          => 'option',
						'option_name'   => 'better_ads_manager',
						'option_value'  => array(
							'ad_post_inline' => array(
								array(
									'type'      => 'banner',
									'campaign'  => 'none',
									'banner'    => '190',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'right',
									'paragraph' => '5',
								),
							),
						),
						'merge_options' => true,
					),
				),
			),
		//
		// ->Widgets
		//
		'widgets'  =>
			array(
				'multi_steps' => false,
				array(
					'primary-sidebar' => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'content'              => 'We started off the year just right with a trip to Phuket with our Revolve family.',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'about_link_url'       => '#',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_instagram'       => '#',
								'link_email'           => '#',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.57%%',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'columns'              => '1',
							),
						),
						array(
							'widget_id'       => 'newsletter-pack',
							'widget_settings' => array(
								'newsletter'           => '192',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'bf-widget-title-link' => '#',
							),
						),
						array(
							'widget_id'       => 'bs-popular-categories',
							'widget_settings' => array(
								'exclude'              => array(
									'',
								),
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Must Read Articles',
								'count'                 => '3',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '1',
									'meta'              => array(
										'show'        => '1',
										'author'      => '0',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '0',
									),
								),
								'disable_duplicate'     => '0',
								'bf-widget-title-icon'  => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'              => 'none',
							),
						),
						array(
							'widget_id'       => 'bs-instagram',
							'widget_settings' => array(
								'user_id'              => 'wendyslookbook',
								'photo_count'          => '9',
								'style'                => '3',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
					'footer-1'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-about',
							'widget_settings' => array(
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
								'bf-widget-title-icon' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
					),
				),
			),
		//
		// ->Media
		//
		'media'    =>
			array(
				'multi_steps' => true,
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-1.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-1',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-2.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-2',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-3.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-3',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-4.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-4',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-5.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-5',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-6.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-6',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-7.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-7',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-8.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-8',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'thumb-9.jpg',
					'resize' => true,
					'the_id' => 'media.primary.thumb-9',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'profile.png',
					'resize' => true,
					'the_id' => 'media.primary.logo-footer',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Header-Logo.png',
					'the_id' => 'media.primary.logo-main',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Header-Logo-Retina.png',
					'the_id' => 'media.primary.logo-main-retina',
				),
			),
		//
		// ->Menus
		//
		'menus'    =>
			array(
				'multi_steps' => false,
				array(
					array(
						'menu-location' => 'main-menu',
						'menu-name'     => 'Main Navigation',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.193%%',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'page',
								'title'     => 'About Us',
								'page_id'   => '%%posts.primary.195%%',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Top Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'page',
								'title'     => 'About Us',
								'page_id'   => '%%posts.primary.195%%',
							),
						),
					),
					array(
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'Home',
								'page_id'   => '%%posts.primary.193%%',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.3%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'page',
								'title'     => 'About Us',
								'page_id'   => '%%posts.primary.195%%',
							),
						),
					),
				),
			),
	);
}
