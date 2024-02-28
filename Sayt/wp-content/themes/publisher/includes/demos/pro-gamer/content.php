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

	$style_id       = 'pro-gamer';
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
                     'name' => 'Champions',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-1',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.2',
                 ),
                 array(
                     'name' => 'Cory Barlog',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.11',
                 ),
                 array(
                     'name' => 'Events',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.3',
                 ),
                 array(
                     'name' => 'God of War',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.12',
                 ),
                 array(
                     'name' => 'Matches',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-7',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.5',
                 ),
                 array(
                     'name' => 'News',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.13',
                 ),
                 array(
                     'name' => 'Platform',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-5',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.6',
                 ),
                 array(
                     'name' => 'Video',
                     'taxonomy' => 'post_format',
                     'the_id' => 'taxonomy.primary.19',
                 ),
                 array(
                     'name' => 'PS4',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.14',
                 ),
                 array(
                     'name' => 'Sony Entertainment',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.15',
                 ),
                 array(
                     'name' => 'videos',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-17',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.10',
                 ),
             ),
         ),
      //
      // ->Posts
      //
      'posts' => 
         array(
           'multi_steps' => false,
           array(
                 array(
                     'post_title' => 'Final Fantasy 15, Shadow Of The Tomb Raider Crossover Announced',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.192',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Free Monster Hunter-Like RPG Dauntless Gets Open Beta Next Month',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.199',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Breach is an ambitious action-RPG from ex-BioWare devs, first trailer revealed',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.347',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Extinction Review - A Giant Mess',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.358',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Detective Pikachu Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.354',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Surviving Mars Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.356',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Splinter Cell\'s Sam Fisher Teased For New Ghost Recon Wildlands Update',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                     ),
                     'the_id' => 'posts.primary.310',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Spyro\'s Remastered Graphics Showcased In Reignited Trilogy Images',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                     ),
                     'the_id' => 'posts.primary.311',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'We Absolutely Wrecked Far Cry 5\'s Graphics And Created A Trippy Mess',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                     ),
                     'the_id' => 'posts.primary.312',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Top 10 UK Games Chart: Far Cry 5, Sea Of Thieves, FIFA 18 Remain At Top',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                     ),
                     'the_id' => 'posts.primary.316',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'New Xbox One Games Sale Includes Discounts On Many Add-Ons',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                     ),
                     'the_id' => 'posts.primary.319',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Which Baseball Video Game Is Right For You? Here\'s All The Key Info',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.195',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'GTA 5: What\'s New For GTA Online On PS4, Xbox One, And PC This Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.196',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Fortnite Players Get Free Pickaxe And Skin Available With Amazon',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.198',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Steam PC Game Sale: Save On Darkest Dungeon, Dying Light, And More',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.201',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Need for Speed Payback',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'IGN',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'www.ign.com',
                         ),
                     ),
                     'the_id' => 'posts.primary.350',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Fortnite v3.5.2 Update Introduces 50v50 Mode; Read Patch Notes Here',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.190',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Call of Duty: WW2 Adds Free Coaching And Feedback Through Alexa',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.154',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'God Of War PS4 Director Reacts To High Scores In Emotional Video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.156',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'New Fortnite Freebies Available Now To Make Up For Recent Server',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.155',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.158',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Overwatch PTR Patch Notes Reveal New Update\'s Big Hero Changes',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.149',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Top 10 UK Games Chart: God Of War PS4 Claims No.1 And Breaks Series Record',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.112',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Game Release Dates In April 2018 For Nintendo Switch, PS4, Xbox One',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.111',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => '3 5 Top New Games Out This Week On Switch, PS4, Xbox One, And PC',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.118',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'New Game Release Dates Of 2018: God of War, Super Smash Bros.',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.109',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Nintendo Switch Adding South Park And 15 More Games This Coming Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.114',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Switch Weekly Roundup: Sneak Peek at Dark Souls Remastered Footage',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-11%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.119',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Nintendo Switch\'s Labo Is Already Letting People Do Some Cool Stuff',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.107',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Assassin\'s Creed Origins',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-12%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'IGN',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'www.ign.com',
                         ),
                     ),
                     'the_id' => 'posts.primary.351',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Fortnite: Battle Royale Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.352',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Far Cry 5 Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.349',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'PS4 Vs Xbox One - Which Console Has The Best Exclusive Games?',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.318',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'God Of War PS4 Almost Didn\'t Have One Of Its Best, Most Important Characters',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.152',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Splinter Cell\'s Sam Fisher Comes To Ghost Recon Wildlands Update This Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.203',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'God Of War PS4 Guide: How Armor, Skills, And Enchantments Work',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.171',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Ghost Recon Wildlands Update Is Out With Splinter Cell Mission And More',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.194',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'TOP of Group B! TI8 The International 2018 Highlights Dota 2',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.357',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'After Fortnite Update, Freebies Now Available To Make Up For Server Problems',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.197',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Fortnite Week 10 Challenges Leaked: Skydive Through Floating Rings',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.160',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'PUBG, Fortnite Have New Battle Royale Competition - GameSpot Daily',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.315',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Call Of Duty: WW2s Divisions Being Overhauled-Heres What\'s Changing',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.313',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Big Call Of Duty: WW2 Update Is Out Now On PS4, Xbox One, And PC',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.308',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Fortnite Challenges For Week 4: All Ice Cream Truck Locations And More',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.317',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Some GTA 4 Songs Being Removed, But New Ones Will Take Their Place',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.193',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Why Overwatch\'s Retribution Mode Is Only Available For A Limited Time',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.314',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.113',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Star Wars Battlefront 2 Taught EA A Lesson It Says It Won\'t Forget',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.157',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Far Cry 5 Last Of Us-Inspired Map Headlines Arcades Best Of The Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                     ),
                     'the_id' => 'posts.primary.320',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Here Is When God Of War PS4 Pre-Loading Begins; Unlock Time Confirmed',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-7%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.153',
                     'thumbnail_id' => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'The Witcher 3\'s Geralt Gets A New Figure, And It Comes With His Bathtub',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-6%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.151',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Sailing The Dalmation Islands: Split to Dubrovnik',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.361',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'MGS 5 For $5, And More PC Games On Sale At The Humble Store In The US',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-10%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.200',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'We’re Giving Away A Limited Edition God Of War PS4 Pro For Free',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'IGN',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'www.ign.com',
                         ),
                     ),
                     'the_id' => 'posts.primary.159',
                     'thumbnail_id' => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Wolfenstein 2 On Nintendo Switch Requires An Internet Download',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-3%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.110',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Donkey Kong Plays Nintendo Switch When You Go Idle In Tropical Freeze',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.117',
                     'thumbnail_id' => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'GameStop: Get More Cash For Trade-Ins For A Limited Time In The US',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.115',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => '79 Gap Year Essentials for Backpackers Who Love Adventure',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.355',
                     'thumbnail_id' => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => '7 Must See Cities in Cuba That Will Steal Your Heart',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.353',
                     'thumbnail_id' => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Super Meat Boy Forever Brings Big Changes, But It\'s Still Hard As Hell',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                         'post_format' => '%%taxonomy.primary.19%%',
                     ),
                     'the_id' => 'posts.primary.116',
                     'thumbnail_id' => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Contact us',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.653',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Front Page',
                     'post_content_file' => $demo_path . 'post-content-2.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'prepare_vc_css' => true,
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.652',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Single Content',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'https://demo.betterstudio.com/publisher/pro-gamer/wp-content/uploads/sites/492/2018/10/468x60-single-post.jpg',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
                         ),
                         array(
                             'meta_key' => 'caption',
                             'meta_value' => '- Advertisement -',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.778',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Index Banner',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'https://demo.betterstudio.com/publisher/pro-gamer/wp-content/uploads/sites/492/2018/10/970x250-index-post.jpg',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
                         ),
                         array(
                             'meta_key' => 'caption',
                             'meta_value' => '- Advertisement -',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.669',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Sidebar Banner - 300 x 600',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'https://demo.betterstudio.com/publisher/pro-gamer/wp-content/uploads/sites/492/2018/10/300x600-single-sidebar.jpg',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
                         ),
                         array(
                             'meta_key' => 'caption',
                             'meta_value' => '- Advertisement -',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.651',
                 ),
                 array(
                     'post_type' => 'bsnp-newsletter',
                     'post_title' => 'Newsletter',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'feedburner',
                         ),
                         array(
                             'meta_key' => 'feedburner_id',
                             'meta_value' => '#',
                         ),
                         array(
                             'meta_key' => 'style',
                             'meta_value' => 'style-4',
                         ),
                         array(
                             'meta_key' => 'color',
                             'meta_value' => '#5e00fa',
                         ),
                         array(
                             'meta_key' => 'text_title',
                             'meta_value' => '',
                         ),
                         array(
                             'meta_key' => 'text_after',
                             'meta_value' => '',
                         ),
                         array(
                             'meta_key' => 'social_icons_sites',
                             'meta_value' => array(
                                 'facebook' => '1',
                                 'twitter' => '1',
                                 'google' => '1',
                                 'youtube' => '1',
                             ),
                         ),
                     ),
                     'the_id' => 'posts.primary.683',
                 ),
             ),
         ),
      //
      // ->Options
      //
      'options' => 
         array(
           'multi_steps' => false,
           array(
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options',
                     'option_value_file' => $demo_path . 'options.json',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options',
                     'option_value' => array(
                         'logo_image' => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
                         'logo_image_retina' => '%%bf_product_demo_media_url:{media.primary.logo-main-retina}:\'full\'%%',
                         'header_bg_image' => array(
                             'type' => 'top-center',
                             'img' => '%%bf_product_demo_media_url:{media.primary.header-bg}:\'full\'%%',
                         ),
                     ),
                     'merge_options' => true,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options_current_style',
                     'option_value' => $style_id,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'bs_' . 'publisher_theme_options_current_demo',
                     'option_value' => $style_id,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'page_on_front',
                     'option_value' => '%%posts.primary.652%%',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'show_on_front',
                     'option_value' => 'page',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'better_ads_manager',
                     'option_value' => array(
                         'ad_post_inline' => array(
                             array(
                                 'type' => 'banner',
                                 'campaign' => 'none',
                                 'banner' => '778',
                                 'count' => '3',
                                 'columns' => '3',
                                 'orderby' => 'rand',
                                 'order' => 'ASC',
                                 'align' => 'center',
                                 'paragraph' => '9',
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
      'widgets' => 
         array(
           'multi_steps' => false,
           array(
                 'primary-sidebar' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'better-ads',
                         'widget_settings' => array(
                             'type' => 'banner',
                             'banner' => '%%posts.primary.651%%',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'columns' => '1',
                         ),
                     ),
                     array(
                         'widget_id' => 'bs-mix-listing-3-1',
                         'widget_settings' => array(
                             'pagination-show-label' => '1',
                             'bs-text-color-scheme' => 'light',
                             'listing-settings' => array(
                                 'big-title-limit' => '82',
                                 'big-excerpt' => '1',
                                 'big-excerpt-limit' => '115',
                                 'big-subtitle' => '0',
                                 'big-subtitle-limit' => '0',
                                 'big-subtitle-location' => 'before-meta',
                                 'big-format-icon' => '1',
                                 'big-term-badge' => '1',
                                 'big-term-badge-count' => '1',
                                 'big-term-badge-tax' => 'category',
                                 'big-meta' => array(
                                     'show' => '1',
                                     'author' => '1',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '1',
                                     'review' => '1',
                                 ),
                                 'small-thumbnail-type' => 'featured-image',
                                 'small-title-limit' => '70',
                                 'small-subtitle' => '0',
                                 'small-subtitle-limit' => '0',
                                 'small-subtitle-location' => 'before-meta',
                                 'small-meta' => array(
                                     'show' => '1',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'next_prev',
                             'columns' => 1,
                         ),
                     ),
                 ),
                 'footer-1' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-thumbnail-listing-1',
                         'widget_settings' => array(
                             'title' => 'Latest Posts',
                             'count' => '3',
                             'order_by' => 'rand',
                             'columns' => 1,
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'thumbnail-type' => 'featured-image',
                                 'title-limit' => '60',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'before-meta',
                                 'show-ranking' => '0',
                                 'meta' => array(
                                     'show' => '1',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'none',
                         ),
                     ),
                 ),
                 'footer-2' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'custom_html',
                         'widget_settings' => array(
                             'title' => 'Newsletter',
                             'content' => '',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                         ),
                     ),
                     array(
                         'widget_id' => 'newsletter-pack',
                         'widget_settings' => array(
                             'newsletter' => '%%posts.primary.683%%',
                             'bs-text-color-scheme' => 'light',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'bf-widget-title-link' => 'Newsletter',
                             'bf-widget-title-style' => 't5-s1',
                         ),
                     ),
                 ),
                 'footer-3' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-thumbnail-listing-1',
                         'widget_settings' => array(
                             'title' => 'POPULAR POSTS',
                             'count' => '3',
                             'order_by' => 'popular',
                             'columns' => 1,
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'thumbnail-type' => 'featured-image',
                                 'title-limit' => '60',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'before-meta',
                                 'show-ranking' => '0',
                                 'meta' => array(
                                     'show' => '1',
                                     'author' => '0',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '1',
                                 ),
                             ),
                             'disable_duplicate' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                             'paginate' => 'none',
                         ),
                     ),
                 ),
             ),
         ),
      //
      // ->Media
      //
      'media' => 
         array(
           'multi_steps' => true,
           array(
	           'file'   => $demo_image_url . $prefix . 'Header-Logo.png',
	           'the_id' => 'media.primary.logo-main',
           ),
           array(
	           'file'   => $demo_image_url . $prefix . 'Header-Logo-Retina.png',
	           'the_id' => 'media.primary.logo-main-retina',
           ),

           array(
	           'file'   => $demo_image_url . $prefix . 'Header-BG.jpg',
	           'the_id' => 'media.primary.header-bg',
           ),
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
         ),
      //
      // ->Menus
      //
      'menus' => 
         array(
           'multi_steps' => false,
           array(
                 array(
                     'menu-location' => 'main-menu',
                     'menu-name' => 'Main Navigation',
                     'recently-edit' => true,
                     'items' => array(
                         array(
                             'item_type' => 'page',
                             'title' => 'News',
                             'page_id' => '%%posts.primary.652%%',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.6%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.5%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.10%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.3%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.2%%',
                             'taxonomy' => 'category',
                         ),
                     ),
                 ),
                 array(
                     'menu-location' => 'top-menu',
                     'menu-name' => 'Topbar Navigation',
                     'items' => array(
                         array(
                             'item_type' => 'page',
                             'title' => 'Latest Post',
                             'page_id' => '%%posts.primary.652%%',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'Contact',
                             'page_id' => '%%posts.primary.653%%',
                         ),
                     ),
                 ),
                 array(
                     'menu-location' => 'footer-menu',
                     'menu-name' => 'Footer Navigation',
                     'items' => array(
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.6%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.5%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.10%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.3%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.2%%',
                             'taxonomy' => 'category',
                         ),
                     ),
                 ),
             ),
         ),	);
}
