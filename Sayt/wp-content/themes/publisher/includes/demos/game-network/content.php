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

	$style_id       = 'game-network';
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
                     'name' => 'Assassin',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.11',
                 ),
                 array(
                     'name' => 'Farcry',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.12',
                 ),
                 array(
                     'name' => 'Nintendo',
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
                     'name' => 'PC',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.3',
                 ),
                 array(
                     'name' => 'Pc Gamer',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.13',
                 ),
                 array(
                     'name' => 'Platform',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.14',
                 ),
                 array(
                     'name' => 'Playgrounds',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.15',
                 ),
                 array(
                     'name' => 'Video',
                     'taxonomy' => 'post_format',
                     'the_id' => 'taxonomy.primary.23',
                 ),
                 array(
                     'name' => 'PS3',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.20',
                 ),
                 array(
                     'name' => 'PS4',
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
                     'name' => 'Reviews',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-22',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.6',
                 ),
                 array(
                     'name' => 'Smart Phones',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.22',
                 ),
                 array(
                     'name' => 'Ubisoft',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.16',
                 ),
                 array(
                     'name' => 'videos',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.24',
                 ),
                 array(
                     'name' => 'Vita',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.21',
                 ),
                 array(
                     'name' => 'Xbox One',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-15',
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
                     'post_title' => 'Fortnite Players Get Free Pickaxe And Skin Available With Amazon',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.91',
                    'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Call of Duty: WW2 Adds Free Coaching And Feedback Through Alexa',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.81',
                    'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'New Xbox One Games Sale Includes Discounts On Many Add-Ons',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.110',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'God Of War PS4 Almost Didn\'t Have One Of Its Best, Most Important Characters',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.80',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'New Game Release Dates Of 2018: God of War, Super Smash Bros.',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.104',
                    'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Game Release Dates In April 2018 For Nintendo Switch, PS4, Xbox One',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.102',
                    'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Top 10 UK Games Chart: God Of War PS4 Claims No.1 And Breaks Series Record',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.101',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.100',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Nintendo Switch Adding South Park And 15 More Games This Coming Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.99',
                    'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Switch Weekly Roundup: Sneak Peek at Dark Souls Remastered Footage',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.98',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Nintendo Switch\'s Labo Is Already Letting People Do Some Cool Stuff',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.97',
                    'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Donkey Kong Plays Nintendo Switch When You Go Idle In Tropical Freeze',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.96',
                    'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Super Meat Boy Forever Brings Big Changes, But It\'s Still Hard As Hell',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.95',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Disgaea 1 Remake Releasing For Nintendo Switch And PS4 This Year',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.83',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'The Witcher 3\'s Geralt Gets A New Figure, And It Comes With His Bathtub',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.76',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'PUBG, Fortnite Have New Battle Royale Competition - GameSpot Daily',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.113',
                    'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Here Is When God Of War PS4 Pre-Loading Begins; Unlock Time Confirmed',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.72',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Some GTA 4 Songs Being Removed, But New Ones Will Take Their Place',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.67',
                    'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'God Of War PS4 Guide: How Armor, Skills, And Enchantments Work',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.66',
                    'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Splinter Cell\'s Sam Fisher Comes To Ghost Recon Wildlands Update This Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.63',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Ghost Recon Wildlands Update Is Out With Splinter Cell Mission And More',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.62',
                    'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Final Fantasy 15, Shadow Of The Tomb Raider Crossover Announced',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.59',
                    'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'MGS 5 For $5, And More PC Games On Sale At The Humble Store In The US',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.55',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Far Cry 5 Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.45',
                    'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Need for Speed Payback',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
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
                     'the_id' => 'posts.primary.44',
                    'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Extinction Review - A Giant Mess',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.43',
                    'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'MLB The Show 18',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.42',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Fortnite: Battle Royale Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.41',
                    'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Assassin\'s Creed Origins',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
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
                     'the_id' => 'posts.primary.40',
                    'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'PS4 Vs Xbox One - Which Console Has The Best Exclusive Games?',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.112',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Fortnite Challenges For Week 4: All Ice Cream Truck Locations And More',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.109',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Call Of Duty: WW2s Divisions Being Overhauled-Heres What\'s Changing',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.114',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Sea Of Thieves Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.115',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => '3 5 Top New Games Out This Week On Switch, PS4, Xbox One, And PC',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.105',
                    'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'God Of War PS4 Director Reacts To High Scores In Emotional Video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.82',
                    'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Big Call Of Duty: WW2 Update Is Out Now On PS4, Xbox One, And PC',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22,24%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=2kRduVQCwLk',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.70',
                    'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Attack on Titan 2 Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.77',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'GTA 5: What\'s New For GTA Online On PS4, Xbox One, And PC This Week',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                         'post_tag' => '%%taxonomy.primary.24%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=2kRduVQCwLk',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.89',
                    'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'We Absolutely Wrecked Far Cry 5\'s Graphics And Created A Trippy Mess',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.118',
                    'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'H1Z1 Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.78',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Fortnite Week 10 Challenges Leaked: Skydive Through Floating Rings',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,24,21%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=2kRduVQCwLk',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.92',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'God Of War Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.116',
                    'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Splinter Cell\'s Sam Fisher Teased For New Ghost Recon Wildlands Update',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.117',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Fortnite v3.5.2 Update Introduces 50v50 Mode; Read Patch Notes Here',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                         'post_tag' => '%%taxonomy.primary.24%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=2kRduVQCwLk',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.85',
                    'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Free Monster Hunter-Like RPG Dauntless Gets Open Beta Next Month',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                         'post_tag' => '%%taxonomy.primary.24%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_featured_embed_code',
                             'meta_value' => 'https://www.youtube.com/watch?v=2kRduVQCwLk',
                         ),
                         array(
                             'meta_key' => 'post_template',
                             'meta_value' => 'style-12',
                         ),
                     ),
                     'the_id' => 'posts.primary.90',
                    'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Spyro\'s Remastered Graphics Showcased In Reignited Trilogy Images',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.119',
                    'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Wolfenstein 2 On Nintendo Switch Requires An Internet Download',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.103',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Surviving Mars Review',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'gamestm.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.gamestm.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.87',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'We’re Giving Away A Limited Edition God Of War PS4 Pro For Free',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
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
                     'the_id' => 'posts.primary.73',
                    'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'After Fortnite Update, Freebies Now Available To Make Up For Server Problems',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.53',
                    'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Which Baseball Video Game Is Right For You? Here\'s All The Key Info',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.88',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Steam PC Game Sale: Save On Darkest Dungeon, Dying Light, And More',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.86',
                    'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Overwatch PTR Patch Notes Reveal New Update\'s Big Hero Changes',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.93',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Top 10 UK Games Chart: Far Cry 5, Sea Of Thieves, FIFA 18 Remain At Top',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'gamestm.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.gamestm.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.108',
                    'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Why Overwatch\'s Retribution Mode Is Only Available For A Limited Time',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.120',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'New Fortnite Freebies Available Now To Make Up For Recent Server',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                         'post_format' => '%%taxonomy.primary.23%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'gamestm.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.gamestm.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.84',
                    'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'GameStop: Get More Cash For Trade-Ins For A Limited Time In The US',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.94',
                    'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Far Cry 5 Last Of Us-Inspired Map Headlines Arcades Best Of The Week',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.10%%',
                         'post_tag' => '%%taxonomy.primary.22%%',
                     ),
                     'the_id' => 'posts.primary.71',
                    'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Star Wars Battlefront 2 Taught EA A Lesson It Says It Won\'t Forget',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                         'post_tag' => '%%taxonomy.primary.20,21%%',
                     ),
                     'the_id' => 'posts.primary.61',
                    'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Detective Pikachu Review',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.39',
                    'thumbnail_id'      => '%%media.primary.thumb-1%%',
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
                     'the_id' => 'posts.primary.135',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'About Us',
                     'post_content_file' => $demo_path . 'post-content-3.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.134',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Single Sidebar Banner',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.banner-sidebar-single}:\'full\'%%',
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
                     'the_id' => 'posts.primary.201',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Banner X Paragraph',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.banner-paragraph-x}:\'full\'%%',
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
                     'the_id' => 'posts.primary.193',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Sidebar Banner – 300 x 250',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.banner-sidebar-300-250}:\'full\'%%',
                         ),
                         array(
                             'meta_key' => 'url',
                             'meta_value' => 'https://betterstudio.com/publisher-wp-theme/pricing/',
                         ),
                         array(
                             'meta_key' => 'campaign',
                             'meta_value' => 'none',
                         ),
                     ),
                     'the_id' => 'posts.primary.178',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'After X Posts',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.banner-post-x}:\'full\'%%',
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
                     'the_id' => 'posts.primary.170',
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
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.banner-sidebar-300-600}:\'full\'%%',
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
                     'the_id' => 'posts.primary.25',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Header Banner - 468 x 60',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => '%%bf_product_demo_media_url:{media.primary.banner-header}:\'full\'%%',
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
                     'the_id' => 'posts.primary.24',
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
                             'meta_value' => '#bf1313',
                         ),
                     ),
                     'the_id' => 'posts.primary.195',
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
                         'logo_image_retina' => '',
                         'off_canvas_logo' => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
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
                     'option_name' => 'bs_' . 'publisher_theme_options[_current_demo',
                     'option_value' => $style_id,
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'page_on_front',
                     'option_value' => '%%posts.primary.135%%',
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
                                 'banner' => '193',
                                 'count' => '3',
                                 'columns' => '3',
                                 'orderby' => 'rand',
                                 'order' => 'ASC',
                                 'align' => 'center',
                                 'paragraph' => '6',
                             ),
                         ),
                         'header_aside_logo_type' => 'banner',
                         'header_aside_logo_banner' => '%%posts.primary.24%%',
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
                             'banner' => '%%posts.primary.201%%',
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
                         'widget_id' => 'bs-mix-listing-3-4',
                         'widget_settings' => array(
                             'title' => 'Game Reviews',
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'big-title-limit' => '82',
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
                                     'date' => '0',
                                     'date-format' => 'standard',
                                     'view' => '1',
                                     'share' => '0',
                                     'comment' => '0',
                                     'review' => '0',
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
                             'columns' => 1,
                         ),
                     ),
                     array(
                         'widget_id' => 'better-social-counter',
                         'widget_settings' => array(
                             'title' => 'Follow Us',
                             'style' => 'clean',
                             'columns' => '2',
                             'order' => array(
                                 'facebook' => '1',
                                 'twitter' => '1',
                                 'youtube' => '1',
                                 'instagram' => '1',
                                 'rss' => '1',
                             ),
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
                         'widget_id' => 'bs-likebox',
                         'widget_settings' => array(
                             'url' => 'https://www.facebook.com/ign/',
                             'title' => 'Facebook',
                             'bf-widget-title-color' => '#ffffff',
                             'bf-widget-title-bg-color' => '#4861a1',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                         ),
                     ),
                 ),
                 'footer-1' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-about',
                         'widget_settings' => array(
                             'content' => 'Publisher is the useful and powerful WordPress Newspaper, Magazine and Blog theme with great attention to details, incredible features, an intuitive user interface and everything else you need to create outstanding websites.
         
         • Email: info@yoursite.com
         • Phone: 844-698-6394',
                             'logo_img' => '%%bf_product_demo_media_url:{media.primary.footer-logo}:\'full\'%%',
                             'title' => '',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                         ),
                     ),
                 ),
                 'footer-2' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-popular-categories',
                         'widget_settings' => array(
                             'count' => '7',
                             'exclude' => array(
                                 '',
                             ),
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
                                 'font_code' => '',
                             ),
                         ),
                     ),
                 ),
                 'footer-3' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-about',
                         'widget_settings' => array(
                             'link_facebook' => '#',
                             'link_twitter' => '#',
                             'link_google' => '#',
                             'link_instagram' => '#',
                             'link_youtube' => '#',
                             'link_pinterest' => '#',
                             'title' => 'FOLLOW US',
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
                         'widget_id' => 'bs-subscribe-newsletter',
                         'widget_settings' => array(
                             'image' => '%%bf_product_demo_media_url:{media.primary.newsletter}:\'full\'%%',
                             'show-powered' => '0',
                             'bf-widget-title-icon' => array(
                                 'icon' => '',
                                 'type' => '',
                                 'height' => '',
                                 'width' => '',
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
                    'file'   => $demo_image_url . $prefix . 'Footer-Logo.png',
                    'the_id' => 'media.primary.footer-logo',
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
                array(
                    'file'   => $demo_image_url . $prefix . 'banner-sidebar-single.jpg',
                    'resize' => true,
                    'the_id' => 'media.primary.banner-sidebar-single',
                ),
                array(
                    'file'   => $demo_image_url . $prefix . 'banner-paragraph-x.jpg',
                    'resize' => true,
                    'the_id' => 'media.primary.banner-paragraph-x',
                ),
                array(
                    'file'   => $demo_image_url . $prefix . 'banner-sidebar-300-250.jpg',
                    'resize' => true,
                    'the_id' => 'media.primary.banner-sidebar-300-250',
                ),
                array(
                    'file'   => $demo_image_url . $prefix . 'banner-post-x.jpg',
                    'resize' => true,
                    'the_id' => 'media.primary.banner-post-x',
                ),
                array(
                    'file'   => $demo_image_url . $prefix . 'banner-sidebar-300-600.jpg',
                    'resize' => true,
                    'the_id' => 'media.primary.banner-sidebar-300-600',
                ),
                array(
                    'file'   => $demo_image_url . $prefix . 'banner-header.jpg',
                    'resize' => true,
                    'the_id' => 'media.primary.banner-header',
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
                             'page_id' => '%%posts.primary.135%%',
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
                             'term_id' => '%%taxonomy.primary.2%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.3%%',
                             'taxonomy' => 'category',
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
