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

	$style_id       = 'celebs-mag';
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
						'name'      => 'BEAUTY',
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
						'name'      => 'CULTURE',
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
						'name'      => 'FASHION',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'LIVING',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'RUNWAY',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'VIDEO',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.8',
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
						'post_title'        => 'Kim Kardashian Says Her Next Fragrance Bottle Will Be Shaped Like Her Body',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.169',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Olivia Newton-John Continues to Battle Cancer with Medical Cannabis',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.144',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'To Celebrate Bella Hadid’s 22nd, Here Are 22 of Her Best Red Carpet Moments',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.193',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'This Canadian Jewellery Brand Designed a Talisman for the British Museum',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.194',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'See Max Mara’s Iconic Cube Jacket Reinterpreted by Three Photographers',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.188',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Turns Out Spring/Summer 2019 is Josep Font’s Last Collection for Delpozo',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.187',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Bella Hadid’s Hairstylist Chad Wood on the Rules of a Spring Hair Revamp',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.171',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Beauty Entrepreneur Bobbi Brown Is Reinventing Herself as a Wellness Guru',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.170',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'A Victoria Beckham Model’s Easy Drugstore Hack for Drying Out Pimples',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.168',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Watch Out, Kylie Jenner: Serena Williams Is Launching Her Own Beauty Brand',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.164',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Like a True Punk, Kristen Stewart Wore a Rattail on the Cannes Red Carpet',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.163',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Sasha Obama Debuted A Colorful New Hairstyle While Hanging Out With Cardi B',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.162',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Mormon Church Speaks Publicly Against Utah Medical Cannabis Initiative',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.142',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Los Angeles Launches Crackdown on 105 Unlicensed Cannabis Businesses',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.143',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Study Finds Whole-Plant Medicines More Effective Than CBD-Only Extracts',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.145',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Michael Kors is Back With Watch Hunger Stop: A Campaign to End World Hunger',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.191',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Tennessee Health Department Issues Warning About Dangers of CBD Products',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.141',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Guam Legislators Approve Measures to Speed up Medical Cannabis Access',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.140',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Ricki Lake’s New Documentary Weed the People Shows Benefits of Cannabis',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.139',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Former Los Angeles County Deputy Pleads Guilty To Drug Trafficking Charge',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.138',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Volunteer Period Opens for Foria Study on Cannabis Menstrual Suppositories',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.137',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'U.S. Customs Walks Back Ban on Canadians who Work in Cannabis Industry',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.132',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Stylist Kate Young’s Favorite Beauty Tip Comes Courtesy of Sienna Miller',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.118',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'The FDA Warns That These Popular Supplements Are Tainted With Rx Drugs',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.117',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Halle Berry’s Trainer Explains How to Make the Beach Your Gym This Summer',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.116',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Paris Jackson Goes Back to the Same Hair Color She Had at 12-Years-Old',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.113',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Margot Robbie’s Hairstylist Explains Why Everyone Has a Lob Right Now',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.111',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Makeup Artist Joyce Bonelli Says She Wasn’t Fired by the Kardashians',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.110',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Adwoa Aboah Opens Up About Her Suicide Attempt on World Mental Health Day',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.106',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Colorado’s Mandatory Pesticide Testing Poses a Problem for Cannabis Growers',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_format' => '%%taxonomy.primary.12%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Publisher Theme',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.135',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Paris Fashion Week: Street Style to Get You Through Fashion Month Withdrawals',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.192',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Every Look Our Cover Girl Amber Witcomb Rocked on the Spring Runways',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.190',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Demi Lovato Just Cut Her Long Hair Into a Short, Sleek Asymmetrical Bob',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.4%%',
							'post_format' => '%%taxonomy.primary.12%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Publisher Theme',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.166',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Before and After: 9 Models Who Transformed Their Hair for Fashion Week',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.115',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Lila Moss, Kate Moss’s Daughter, is the New Face of Marc Jacobs Beauty',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.114',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Rachel Hilbert Shares Her Foolproof Hack for the Perfect Beach Waves',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.167',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Depay shines as Netherlands thump Germany to heap pressure on Loew',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_format' => '%%taxonomy.primary.12%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Publisher Theme',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.237',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Frank And Oak founders among the most “optimistic” influencers in fashion',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.185',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Watch: British swimmer breaks world record for longest staged sea swim',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.240',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Alexandre de Betak Set the Scene for All Your Favourite Shows and Designers',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_format' => '%%taxonomy.primary.12%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'Publisher Theme',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.189',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => '6 Over-the-Top Celebrity-Approved Facials That You Need to Know Exist',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.165',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'O’Neill under pressure? Talking points ahead of Ireland’s clash with Denmark',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.243',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'We Spoke With Iris van Herpen About Envisioning the Future of Femininity',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.183',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Bella Hadid’s Hairstylist Chad Wood on the Rules of a Spring Hair Revamp',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.158',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'L’Oréal’s Star-Studded Show at Paris Fashion Week Did Not Disappoint',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.195',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Defending champion Paul Dunne falls further behind British Masters leaders',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.245',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Wall Street Analyst Estimates U.S. Cannabis Market Will Reach $47 Billion',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.146',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Matt Doherty makes first start for Ireland as clash with Denmark gets underway',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.246',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'The Top 10 Things We Learned About Fashion Month From Social Media',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.196',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'On and offstage brawls erupt after Khabib beats McGregor in UFC fight',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.235',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Serena Williams wins US open match in designer tutu following catsuit ban',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.241',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Chris Gunter believes Wales can cope with physical Republic of Ireland',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.239',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Kylie Jenner, Bella Hadid, and More Celebrities Show Off Their Tiny Tattoos',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.112',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Leo Cullen delighted with Leinster’s ruthless streak after Wasps trouncing',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.244',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Ireland earn first point of Nations League in scoreless draw with Denmark',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.247',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Scotland slump to Nations League defeat in Israel despite taking lead',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.248',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Herbal Essences\'s New Packaging is a BIG Move for the Haircare Industry',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.119',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Turin out: Italy moves forward with joint-Milan d’Ampezzo Olympic bid',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.242',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Kristen Stewart’s Latest Punk Move on the Red Carpet Is Pure Comfort-Centric',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.108',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'The Secret to Getting Kate Middleton’s Hair Is Much Simpler Than You Think',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.160',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
							array(
								'meta_key'   => '_bs_review_criteria',
								'meta_value' => array(
									array(
										'label' => 'Design',
										'rate'  => '8',
										'icon'  => array(
											'icon'      => '',
											'type'      => '',
											'height'    => '',
											'width'     => '',
											'font_code' => '',
										),
										'color' => '',
									),
								),
							),
							array(
								'meta_key'   => '_affiliate_icon',
								'meta_value' => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
							),
						),
						'the_id'            => 'posts.primary.85',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Banner Single',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'http://demo.betterstudio.com/publisher/celebs-mag/wp-content/uploads/sites/484/2018/12/300x250-post-single.jpg',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
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
						'the_id'     => 'posts.primary.348',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index Sidebar Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'http://demo.betterstudio.com/publisher/celebs-mag/wp-content/uploads/sites/484/2018/12/300x600-sidebar-index.jpg',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
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
						'the_id'     => 'posts.primary.62',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'http://demo.betterstudio.com/publisher/celebs-mag/wp-content/uploads/sites/484/2018/12/970x250-post-index.jpg',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
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
						'the_id'     => 'posts.primary.60',
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
								'meta_key'   => 'color',
								'meta_value' => '#86856d',
							),
							array(
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'     => 'posts.primary.82',
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
							'header_bg_image'   => array(
								'type' => 'cover',
								'img'  => '%%bf_product_demo_media_url:{media.primary.header-bg}:\'full\'%%',
							),
							'footer_bg_image'   => array(
								'type' => 'cover',
								'img'  => '%%bf_product_demo_media_url:{media.primary.footer-bg}:\'full\'%%',
							),
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
						'option_value' => '%%posts.primary.85%%',
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
									'banner'    => '348',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'left',
									'paragraph' => '3',
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
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.62%%',
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
							'widget_id'       => 'better-social-counter',
							'widget_settings' => array(
								'title'                => 'FOLLOW US ON FACEBOOK',
								'style'                => 'style-7',
								'columns'              => '1',
								'order'                => array(
									'instagram' => '1',
									'facebook'  => '1',
									'twitter'   => '1',
									'youtube'   => '1',
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
								'title'                 => 'Most Popular Posts',
								'count'                 => '5',
								'order_by'              => 'popular',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '65',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '1',
									'meta'              => array(
										'show'        => '0',
										'author'      => '0',
										'date'        => '1',
										'date-format' => 'standard',
										'view'        => '0',
										'share'       => '0',
										'comment'     => '0',
										'review'      => '1',
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
							'widget_id'       => 'newsletter-pack',
							'widget_settings' => array(
								'newsletter'           => '%%posts.primary.82%%',
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
								'logo_img'             => '%%bf_product_demo_media_url:{media.primary.logo-footer}:\'full\'%%',
								'link_facebook'        => '#',
								'link_twitter'         => '#',
								'link_google'          => '#',
								'link_instagram'       => '#',
								'link_email'           => '#',
								'link_youtube'         => '#',
								'title'                => '',
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
					'file'   => $demo_image_url . $prefix . 'Off-Canvas-Logo.png',
					'the_id' => 'media.primary.logo-off-canvas',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Header-BG.jpg',
					'the_id' => 'media.primary.header-bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Footer-BG.jpg',
					'the_id' => 'media.primary.footer-bg',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Footer-Logo.png',
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
								'page_id'   => '%%posts.primary.85%%',
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
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
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
								'page_id'   => '%%posts.primary.85%%',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.4%%',
								'taxonomy'  => 'category',
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
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
							),
						),
					),
				),
			),
	);
}
