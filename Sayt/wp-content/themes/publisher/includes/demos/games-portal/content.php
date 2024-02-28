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

	$style_id       = 'games-portal';
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
						'name'     => 'Action',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.16',
					),
					array(
						'name'     => 'Erangle',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.20',
					),
					array(
						'name'      => 'interviews',
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
						'name'     => 'Magazine',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.17',
					),
					array(
						'name'     => 'news',
						'taxonomy' => 'category',
						'the_id'   => 'taxonomy.primary.3',
					),
					array(
						'name'     => 'PC',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.18',
					),
					array(
						'name'      => 'platforms',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-5',
							),
						),
						'the_id'    => 'taxonomy.primary.5',
					),
					array(
						'name'     => 'Player Game',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.19',
					),
					array(
						'name'     => 'PlayStation 4',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.15',
					),
					array(
						'name'     => 'Gallery',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.12',
					),
					array(
						'name'     => 'Video',
						'taxonomy' => 'post_format',
						'the_id'   => 'taxonomy.primary.13',
					),
					array(
						'name'      => 'Reviews',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-15',
							),
						),
						'the_id'    => 'taxonomy.primary.6',
					),
					array(
						'name'      => 'videos',
						'taxonomy'  => 'category',
						'term_meta' => array(
							array(
								'meta_key'   => 'better_slider_style',
								'meta_value' => 'style-17',
							),
						),
						'the_id'    => 'taxonomy.primary.9',
					),
					array(
						'name'     => 'videos',
						'taxonomy' => 'post_tag',
						'the_id'   => 'taxonomy.primary.21',
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
						'post_title'        => '3 5 Top New Games Out This Week On Switch, PS4, Xbox One, And PC',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.262',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Fortnite Players Get Free Pickaxe And Skin Available With Amazon',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.276',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Ghost Recon Wildlands Update Is Out With Splinter Cell Mission And More',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.521',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Detective Pikachu Review',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.354',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Surviving Mars Review',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.356',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Splinter Cell\'s Sam Fisher Teased For New Ghost Recon Wildlands Update',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.310',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Spyro\'s Remastered Graphics Showcased In Reignited Trilogy Images',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.311',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'We Absolutely Wrecked Far Cry 5\'s Graphics And Created A Trippy Mess',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.312',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Call Of Duty: WW2s Divisions Being Overhauled-Heres What\'s Changing',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.313',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'PUBG, Fortnite Have New Battle Royale Competition - GameSpot Daily',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.315',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Top 10 UK Games Chart: Far Cry 5, Sea Of Thieves, FIFA 18 Remain At Top',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.316',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Fortnite Challenges For Week 4: All Ice Cream Truck Locations And More',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.317',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Which Baseball Video Game Is Right For You? Here\'s All The Key Info',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.274',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'GTA 5: What\'s New For GTA Online On PS4, Xbox One, And PC This Week',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.275',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Free Monster Hunter-Like RPG Dauntless Gets Open Beta Next Month',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.277',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'MLB The Show 18',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.357',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Steam PC Game Sale: Save On Darkest Dungeon, Dying Light, And More',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.278',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'God Of War PS4 Almost Didn\'t Have One Of Its Best, Most Important Characters',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.265',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Call of Duty: WW2 Adds Free Coaching And Feedback Through Alexa',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.266',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'God Of War PS4 Director Reacts To High Scores In Emotional Video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.268',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'New Fortnite Freebies Available Now To Make Up For Recent Server',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.267',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.269',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Fortnite Week 10 Challenges Leaked: Skydive Through Floating Rings',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.270',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Top 10 UK Games Chart: God Of War PS4 Claims No.1 And Breaks Series Record',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.256',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.257',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'GameStop: Get More Cash For Trade-Ins For A Limited Time In The US',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.259',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Donkey Kong Plays Nintendo Switch When You Go Idle In Tropical Freeze',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.261',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Switch Weekly Roundup: Sneak Peek at Dark Souls Remastered Footage',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-11%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.263',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Nintendo Switch\'s Labo Is Already Letting People Do Some Cool Stuff',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.252',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Extinction Review - A Giant Mess',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.358',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'H1Z1 Review',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.353',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Fortnite: Battle Royale Review',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'the_id'            => 'posts.primary.352',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'New Xbox One Games Sale Includes Discounts On Many Add-Ons',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.319',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Splash Damage ends development of its team-based shooter Dirty Bomb',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.6%%',
							'post_format' => '%%taxonomy.primary.13%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.355',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'We’re Giving Away A Limited Edition God Of War PS4 Pro For Free',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'IGN',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.ign.com',
							),
						),
						'the_id'            => 'posts.primary.508',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Far Cry 5 Last Of Us-Inspired Map Headlines Arcades Best Of The Week',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.320',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'Wolfenstein 2 On Nintendo Switch Requires An Internet Download',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.254',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Final Fantasy 15, Shadow Of The Tomb Raider Crossover Announced',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.21%%',
							'post_format' => '%%taxonomy.primary.13%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=1HiVB_sz1DA',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.520',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Star Wars Battlefront 2 Taught EA A Lesson It Says It Won\'t Forget',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.21%%',
							'post_format' => '%%taxonomy.primary.13%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=1HiVB_sz1DA',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.519',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => '50 percent of all wars in EVE Online are started by just 5 groups',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.349',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_title'        => 'Big Call Of Duty: WW2 Update Is Out Now On PS4, Xbox One, And PC',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.308',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Game Release Dates In April 2018 For Nintendo Switch, PS4, Xbox One',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.255',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Splinter Cell\'s Sam Fisher Comes To Ghost Recon Wildlands Update This Week',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.523',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'Assassin\'s Creed Origins',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'IGN',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.ign.com',
							),
						),
						'the_id'            => 'posts.primary.351',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'EVE Online\'s spin-off FPS is entering closed alpha in November',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.347',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'The Witcher 3\'s Geralt Gets A New Figure, And It Comes With His Bathtub',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.5%%',
							'post_tag'    => '%%taxonomy.primary.21%%',
							'post_format' => '%%taxonomy.primary.13%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=1HiVB_sz1DA',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.506',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
					),
					array(
						'post_title'        => 'Super Meat Boy Forever Brings Big Changes, But It\'s Still Hard As Hell',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.260',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
					),
					array(
						'post_title'        => 'Night in the Woods\' OST gets awesome limited edition vinyl',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.350',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Some GTA 4 Songs Being Removed, But New Ones Will Take Their Place',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.510',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
					),
					array(
						'post_title'        => 'God Of War PS4 Guide: How Armor, Skills, And Enchantments Work',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-9%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.509',
						'thumbnail_id'      => '%%media.primary.thumb-1%%',
					),
					array(
						'post_title'        => 'MGS 5 For $5, And More PC Games On Sale At The Humble Store In The US',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-10%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.511',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'After Fortnite Update, Freebies Now Available To Make Up For Server Problems',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.3%%',
							'post_tag'    => '%%taxonomy.primary.21%%',
							'post_format' => '%%taxonomy.primary.13%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=1HiVB_sz1DA',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.522',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'Why Overwatch\'s Retribution Mode Is Only Available For A Limited Time',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.9%%',
						),
						'the_id'            => 'posts.primary.314',
						'thumbnail_id'      => '%%media.primary.thumb-4%%',
					),
					array(
						'post_title'        => 'New Game Release Dates Of 2018: God of War, Super Smash Bros.',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.253',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Here Is When God Of War PS4 Pre-Loading Begins; Unlock Time Confirmed',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.507',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Fortnite v3.5.2 Update Introduces 50v50 Mode; Read Patch Notes Here',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-5%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.3%%',
						),
						'the_id'            => 'posts.primary.273',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'Nintendo Switch Adding South Park And 15 More Games This Coming Week',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-7%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.2%%',
						),
						'the_id'            => 'posts.primary.258',
						'thumbnail_id'      => '%%media.primary.thumb-2%%',
					),
					array(
						'post_title'        => 'PS4 Vs Xbox One - Which Console Has The Best Exclusive Games?',
						'post_format'       => 'video',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category'    => '%%taxonomy.primary.9%%',
							'post_tag'    => '%%taxonomy.primary.21%%',
							'post_format' => '%%taxonomy.primary.13%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_featured_embed_code',
								'meta_value' => 'https://www.youtube.com/watch?v=1HiVB_sz1DA',
							),
							array(
								'meta_key'   => 'post_template',
								'meta_value' => 'style-12',
							),
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.318',
						'thumbnail_id'      => '%%media.primary.thumb-3%%',
					),
					array(
						'post_title'        => 'Get 12 indie games for just $5 with Fanatical\'s Origins Bundle',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.6%%',
						),
						'post_meta'         => array(
							array(
								'meta_key'   => '_bs_source_name',
								'meta_value' => 'www.pcgamer.com',
							),
							array(
								'meta_key'   => '_bs_source_url',
								'meta_value' => 'www.pcgamer.com',
							),
						),
						'the_id'            => 'posts.primary.361',
						'thumbnail_id'      => '%%media.primary.thumb-8%%',
					),
					array(
						'post_title'        => 'Overwatch PTR Patch Notes Reveal New Update\'s Big Hero Changes',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'thumbnail_id'      => '%%media.primary.thumb-12%%',
						'post_terms'        => array(
							'category' => '%%taxonomy.primary.5%%',
						),
						'the_id'            => 'posts.primary.264',
						'thumbnail_id'      => '%%media.primary.thumb-6%%',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Content Post',
						'post_content_file' => $demo_path . 'post-content.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
						'the_id'            => 'posts.primary.556',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'Frontpage',
						'post_content_file' => $demo_path . 'post-content-1.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
						'prepare_vc_css'    => true,
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.122',
					),
					array(
						'post_type'         => 'page',
						'post_title'        => 'About Us',
						'post_content_file' => $demo_path . 'post-content-2.txt',
						'post_excerpt_file' => $demo_path . 'post-excerpt-1.txt',
						'post_meta'         => array(
							array(
								'meta_key'   => 'page_layout',
								'meta_value' => '3-col-0',
							),
						),
						'the_id'            => 'posts.primary.121',
					),
					array(
						'post_type'    => 'better-banner',
						'post_title'   => 'banner in content',
						'post_meta'    => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/games-portal/wp-content/uploads/sites/576/2018/10/336x280-post.jpg',
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
						'the_id'       => 'posts.primary.29',
					),
					array(
						'post_type'    => 'better-banner',
						'post_title'   => 'Bannet After  X Count Post',
						'post_meta'    => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/games-portal/wp-content/uploads/sites/576/2018/10/index-post.jpg',
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
						'the_id'       => 'posts.primary.28',
					),
					array(
						'post_type'    => 'better-banner',
						'post_title'   => '300 x 250',
						'post_meta'    => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'image',
							),
							array(
								'meta_key'   => 'img',
								'meta_value' => 'https://demo.betterstudio.com/publisher/games-portal/wp-content/uploads/sites/576/2018/10/index-sidebar.jpg',
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
						'the_id'       => 'posts.primary.26',
					),
					array(
						'post_type'    => 'bsnp-newsletter',
						'post_title'   => 'newsletter',
						'post_meta'    => array(
							array(
								'meta_key'   => 'type',
								'meta_value' => 'feedburner',
							),
							array(
								'meta_key'   => 'feedburner_id',
								'meta_value' => 'dsfgsdfgd',
							),
							array(
								'meta_key'   => 'style',
								'meta_value' => 'style-5',
							),
							array(
								'meta_key'   => 'color',
								'meta_value' => '#ee0000',
							),
							array(
								'meta_key'   => 'text_desc',
								'meta_value' => 'Sign up here to get the latest news and updates delivered directly to your inbox.',
							),
							array(
								'meta_key'   => 'social_icons',
								'meta_value' => '0',
							),
						),
						'the_id'       => 'posts.primary.25',
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
						'option_value' => '%%posts.primary.122%%',
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
									'banner'    => '29',
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
							'widget_id'       => 'better-ads',
							'widget_settings' => array(
								'type'                 => 'banner',
								'banner'               => '%%posts.primary.26%%',
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
								'title'                 => 'Top weekly posts',
								'count'                 => '6',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'bs-text-color-scheme'  => 'light',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '82',
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
								'bf-widget-bg-color'    => '#1b1b1b',
								'bf-widget-title-icon'  => array(
									'icon'      => '',
									'type'      => '',
									'height'    => '',
									'width'     => '',
									'font_code' => '',
								),
								'paginate'              => 'more_btn',
							),
						),
					),
					'footer-1'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'bs-thumbnail-listing-1',
							'widget_settings' => array(
								'title'                 => 'Featured Posts',
								'count'                 => '3',
								'order_by'              => 'rand',
								'columns'               => 1,
								'pagination-show-label' => '1',
								'listing-settings'      => array(
									'thumbnail-type'    => 'featured-image',
									'title-limit'       => '60',
									'subtitle'          => '0',
									'subtitle-limit'    => '0',
									'subtitle-location' => 'before-meta',
									'show-ranking'      => '0',
									'meta'              => array(
										'show'        => '1',
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
					),
					'footer-2'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'newsletter-pack',
							'widget_settings' => array(
								'newsletter'           => '%%posts.primary.25%%',
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
					'footer-3'        => array(
						'remove_all_widgets' => true,
						array(
							'widget_id'       => 'better-social-counter',
							'widget_settings' => array(
								'style'                => 'style-6',
								'columns'              => '3',
								'order'                => array(
									'facebook'   => '1',
									'twitter'    => '1',
									'youtube'    => '1',
									'instagram'  => '1',
									'dribbble'   => '1',
									'vimeo'      => '1',
									'soundcloud' => '1',
									'pinterest'  => '1',
									'rss'        => '1',
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
						'menu-name'     => 'Main Menu',
						'recently-edit' => true,
						'items'         => array(
							array(
								'item_type' => 'page',
								'title'     => 'News',
								'page_id'   => '%%posts.primary.122%%',
							),
							array(
								'item_type' => 'term',
								'term_id'   => '%%taxonomy.primary.6%%',
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
								'term_id'   => '%%taxonomy.primary.9%%',
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
								'page_id'   => '%%posts.primary.122%%',
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
								'term_id'   => '%%taxonomy.primary.9%%',
								'taxonomy'  => 'category',
							),
							array(
								'item_type' => 'page',
								'title'     => 'About Us',
								'page_id'   => '%%posts.primary.121%%',
							),
						),
					),
				),
			),
	);
}
