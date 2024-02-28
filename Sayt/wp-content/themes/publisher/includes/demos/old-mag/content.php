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

	$style_id       = 'old-mag';
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
						'name'     => 'Aromatherapy',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'      => 'Business',
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
						'name'      => 'Culture',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-7',
							),
						),
						'the_id'    => 'taxonomy.primary.4',
					),
					array(
						'name'      => 'Entertainment',
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
						'name'     => 'Holiday',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.14',
					),
					array(
						'name'     => 'Lifestyle',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.6',
					),
					array(
						'name'     => 'Margaret',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'Netflix',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Romance',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Vanessa Hudgens',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.13',
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
						'post_title'        => 'Rwandan entrepreneur woos drinkers with beetroot wine',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.276',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'How established firms are winning over millennial consumers',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.243',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Britain’s Supreme Court rules in favour of two Christian bakers',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.238',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'New spinning ball turbine could bring green energy to windy cities',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.275',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Omega Speedmaster HODINKEE 10th Anniversary Limited Edition Watch',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.273',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => '1961 Ferrari 400 Superamerica SWB Coupe Aerodinamico',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.272',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => '6 Of The Best: Limited Edition Luxury Watches On Mr Porter',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.266',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'An endangered frog takes centre stage at the Supreme Court',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.252',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'The scandalous love affair that fuelled John Stuart Mill’s feminism',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.248',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'The American dream doesn’t exist in many neighbourhoods',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.246',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Jodie Whittaker makes a charismatic start as the new Doctor Who',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.245',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => '“The Bill Murray Stories” chronicles the star’s strange appearing act',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.240',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Powell Places Risky Bet as He Stokes Too-Good-to-Be-True Economy',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.120',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Jennifer Lopez\'s 2018 AMA performance brought the house down',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.196',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => '#HimToo poster boy flips the narrative after mom\'s viral tweet',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.194',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'AMAs 2018: Twenty One Pilots Perform Electrifying ‘Jumpsuit’',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.193',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Giraffes Inherit Spot Patterns From Their Mamas, Study Says',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.191',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Blackburn responds to Taylor Swift\'s support for Tennessee Democrats',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.190',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'A Star Is Born: Lady Gaga and Bradley Cooper film not in Vue cinemas',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.181',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Cramer Remix: PPG just turned whole swaths of this market toxic',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.126',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Goodbye Google+: Privacy breach spells end of social network',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.123',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'U.S. News & World Report: Lancaster, Pa., tops best places to retire list',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.119',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Billionaire Maezawa\'s Secret Behind SpaceX Moon Trip: Work Less',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.118',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Rock & Roll Hall nominations: The good, the bad and the hair metal',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.192',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'France airlifts two bears into Pyrenees, evading roadblocks',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.278',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Google files appeal against Europe’s $5BN antitrust fine for Android',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.114',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'CEO: Oil, Gas Is Shell\'s Core Business For The Foreseeable Future',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.127',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Meghan Markle\'s Ex-Husband Trevor Engelson Gets Remarried',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.183',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'FAO Schwarz coming back to New York in time for holiday shopping',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.122',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'This Is Us sings the bittersweet ballad of Rebecca Pearson',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.189',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Thirty years on, there are still lessons to be learned from “Matilda”',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.253',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Anglophones and Francophones still approach Islam differently',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.249',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Palmyra priest statue among haul of recovered Syrian relics',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.280',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Carrie Underwood\'s \'Spinning Bottles\' Mesmerizes 2018 AMA Awards',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.185',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Yoko Ono releases new version of John Lennon\'s Imagine',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.187',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Mega Millions hits $548M, could be 9th largest jackpot in lottery history',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.125',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Long-Delayed Audit Finds NJ Transit Has \'No Strategic Plan\' To Suck Less',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.116',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Kanye West will meet Trump, talk about prison reform on Thursday',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.188',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'The Wing Debuts San Francisco Restaurant That’s All About Women',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.124',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'The Nobel chemistry prize goes for work that harnesses evolution',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.251',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Gasoline Motor Co X Sailor Jerry Custom Triumph Scrambler',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.271',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Rockford Park District agrees to lease Magic Waters to Six Flags',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.121',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Baker says she\'s honored to make UK royal wedding cake',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.274',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Florida’s gubernatorial race offers the starkest choice in the mid-terms',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.247',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Lebanon wines bring villages back to life and emigrants home',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.277',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'State Bicycle Co 6061 BLACK LABEL V2 ZOMBIE GREEN Bike',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.269',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Maltese family keeps ancient salt-harvesting tradition alive',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.279',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'John Sentamu announces his retirement as Archbishop of York',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.4%%',
						),
						'the_id'            => 'posts.primary.250',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'About Us',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.46',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Front Page',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '1-col',
							),
						),
						'the_id'            => 'posts.primary.45',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Post Content',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'http://demo.betterstudio.com/publisher/old-mag/wp-content/uploads/sites/466/2019/01/300x250-post-single.jpg',
							),
							array(
								'meta_key'   => 'url',
								'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
							),
							array(
								'meta_key'   => 'campaign',
								'meta_value' => 'none',
							),
						),
						'the_id'     => 'posts.primary.288',
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
								'meta_value' => 'http://demo.betterstudio.com/publisher/old-mag/wp-content/uploads/sites/466/2019/01/336x280-sidebar-index.jpg',
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
						'the_id'     => 'posts.primary.42',
					),
					array(
						'post_type'  => 'better-banner',
						'post_title' => 'Index Horizontal Banner',
						'post_meta'  => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'http://demo.betterstudio.com/publisher/old-mag/wp-content/uploads/sites/466/2019/01/970x90-post-index.jpg',
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
						'the_id'     => 'posts.primary.40',
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
								'meta_value' => 'style-3',
							),
						),
						'the_id'     => 'posts.primary.44',
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
							'resp_logo_image'   => '%%bf_product_demo_media_url:{media.primary.logo-mobile}:\'full\'%%',
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
						'option_value' => '%%posts.primary.45%%',
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
									'banner'    => '288',
									'count'     => '3',
									'columns'   => '3',
									'orderby'   => 'rand',
									'order'     => 'ASC',
									'align'     => 'right',
									'paragraph' => '4',
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
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'HIGHLIGHTS',
								'count'                 => '6',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '88',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
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
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.42%%',
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
								'newsletter'           => '44',
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
					'file'   => $demo_image_url . $prefix . 'Mobile-Logo.png',
					'the_id' => 'media.primary.logo-mobile',
				),
				array(
					'file'   => $demo_image_url . $prefix . 'Off-Canvas-Logo.png',
					'the_id' => 'media.primary.logo-off-canvas',
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
								'page_id'   => '%%posts.primary.45%%',
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
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
						),
					),
					array(
						'menu-location' => 'top-menu',
						'menu-name'     => 'Top Navigation',
						'items'         => array(
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.2%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'page',
								'title'     => 'About Us',
								'page_id'   => '%%posts.primary.46%%',
							),
						),
					),
					array(
						'menu-location' => 'footer-menu',
						'menu-name'     => 'Footer Navigation',
						'items'         => array(
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
								'term_id'   => '%%taxonomy.primary.6%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.5%%',
								'taxonomy'  => 'category',
							),
						),
					),
				),
			),
	);
}
