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

	$style_id       = 'romantic-blog';
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
						'name'     => 'Beautiful',
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
						'name'     => 'Flowers',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.7',
					),
					array(
						'name'     => 'LIFESTYLE',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'Lovely',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
					),
					array(
						'name'     => 'My Wife',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.9',
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
						'name'     => 'TRAVEL',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Wedding',
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
						'post_title'        => 'How Benefit Cosmetics Stays Young',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.59',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Royal Portraits In Vogue',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.95',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Vogue’s Dream Bond Boys',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.118',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Appearances | Adwoa Aboah',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.117',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Father’s Day: Gift Ideas',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.115',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Appearances | Daniel Kaluuya',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.113',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'The Best Tapas In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.99',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Appearances | Karen Elson',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.98',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Clara Amfo’s Carnival Playlist',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.97',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Vogue’s Insider Guide To Milan',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.92',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'The Best New Theatre In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.93',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'What Would Neneh Cherry Do?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.91',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'On Our Playlist: Amber Mark',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.120',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'The Bunka Method',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.88',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Luxury MBAs, Buyers Beware',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.85',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Self Tanning Goes Upscale',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.71',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Can Cannabis Beauty Go Mass?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.72',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'The ‘Asian-ification’ of Beauty',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.73',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Fast Fashion for the Face',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.68',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'The Dawn of Designer Botox?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.66',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Subverting Selfie Culture',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.65',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'You Can’t Smell the Internet',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.64',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Is Mascara Losing Its Relevance?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.63',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'The Best Brunch In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.94',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Why I Took An Adult Gap Year',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.119',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Royal Weddings In Vogue',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.122',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'The Meaning Of Meghan',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.123',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'How Bitcoin Went Luxury',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.125',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Tracking the Rise of ‘Clean’ Beauty',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.70',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Lil Miquela’s Hi-Tech Essentials',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.111',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Unpacking the Fenty Frenzy',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.69',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Can Aesop Keep Its Cool?',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.67',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'In Conversation: Kiki Smith',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.96',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Karlie Kloss’s Hi-Tech Essentials',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.116',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Best City Breaks',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.138',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'The Return Of The Buffet',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.121',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Where To Go In Athens',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.90',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Insider Guide To Seoul',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.145',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'The Vogue Guide To Dublin',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.151',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'London Ice Cream Guide',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.150',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Alexa Chung’s Guide To Tokyo',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.149',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'The Joys Of Adult Backpacking',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.148',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'The Best Burgers In London',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.147',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Best On-Screen Interiors',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.146',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'London’s Best Bakeries',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.144',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'The Best Beaches In The UK',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.143',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Insider Guide To Rome',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.142',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'How To Travel Alone',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.140',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'About Me',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.170',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
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
						'the_id'            => 'posts.primary.10',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_type'    => 'better-banner',
						'post_title'   => 'Content Banner',
						'post_meta'    => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/romantic-blog/wp-content/uploads/sites/476/2018/11/300x250-post-single.jpg',
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
						'the_id'       => 'posts.primary.168',
						'thumbnail_id' => '%%media.primary.thumb-2%%',
					),
					array(
						'post_type'    => 'better-banner',
						'post_title'   => 'Sidebar Banner',
						'post_meta'    => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/romantic-blog/wp-content/uploads/sites/476/2018/11/300x250-sidebar-index.jpg',
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
						'the_id'       => 'posts.primary.43',
						'thumbnail_id' => '%%media.primary.thumb-9%%',
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
							'off_canvas_logo'   => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
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
						'option_value' => '%%posts.primary.10%%',
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
									'banner'    => '168',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'right',
									'paragraph' => '1',
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
								'content'              => 'We started off the year just right with a trip to Phuket with our Revolve family. Take a look at all my favorite looks I wore on my Thailand trip.',
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'about_link_url'       => '#',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_instagram'       => '#',
								'link_email'           => 'betterstudio.com@gmail.com',
								'link_youtube'         => '#',
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
								'banner'               => '%%posts.primary.43%%',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'MUST-READ ARTICLES',
								'count'                 => '5',
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
							'widget_id'       => 'bs-likebox',
							'widget_settings' => array(
								'url'                  => 'https://www.facebook.com/wendyslookbook',
								'title'                => 'FIND US ON FACEBOOK',
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
							'widget_id'       => 'bs-instagram',
							'widget_settings' => array(
								'user_id'              => 'wendyslookbook',
								'photo_count'          => '9',
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
					'file'   => $demo_image_url . $prefix . 'Header-Logo.png',
					'the_id' => 'media.primary.logo-main',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Header-Logo-Retina.png',
					'the_id' => 'media.primary.logo-main-retina',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Mobile-Logo.png',
					'the_id' => 'media.primary.logo-mobile',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Off-Canvas-Logo.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'profile.png',
					'the_id' => 'media.primary.logo-footer',
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
								'page_id'   => '%%posts.primary.10%%',
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
								'title'     => 'About Me',
								'page_id'   => '%%posts.primary.170%%',
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
								'page_id'   => '%%posts.primary.10%%',
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
								'title'     => 'About Me',
								'page_id'   => '%%posts.primary.170%%',
							),
						),
					),
				),
			),
	);
}
