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

	$style_id       = 'staff-post';
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
                     'name' => 'American',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.14',
                 ),
                 array(
                     'name' => 'Economy',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-1',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.4',
                 ),
                 array(
                     'name' => 'Ecuador',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.17',
                 ),
                 array(
                     'name' => 'Embassy',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.13',
                 ),
                 array(
                     'name' => 'Frustrated',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.15',
                 ),
                 array(
                     'name' => 'Lifestyle',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-7',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.6',
                 ),
                 array(
                     'name' => 'Sports',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-15',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.7',
                 ),
                 array(
                     'name' => 'tech',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-17',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.5',
                 ),
                 array(
                     'name' => 'WikiLeaks',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.16',
                 ),
                 array(
                     'name' => 'World',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.9',
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
                     'post_title' => 'U.S. Student, Barred From Israel Over Boycott, Goes to Court',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.265',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Kevin Tway’s winning highlights from the 2018 Safeway Open 2018',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.242',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Packers’ Ha Ha Clinton-Dix expects to play elsewhere next season',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.237',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Chiefs News: Bill Belichick has high praise for Patrick Mahomes',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.246',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Idlib frontline: Sense of an ending for Syria’s war – BBC News',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.264',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Tsunami floods into Indonesian city in terrifying new footage',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.258',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Thirty years on, there are still lessons to be learned from “Matilda”',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.132',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'France airlifts two bears into Pyrenees, evading roadblocks',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.213',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Rock & Roll Hall nominations: The good, the bad and the hair metal',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.183',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => '#HimToo poster boy flips the narrative after mom’s viral tweet',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.185',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Announcing U.N. exit, Nikki Haley reveals a clue about her next move',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.267',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'China: Interpol chief under investigation after disappearance',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.260',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Oklahoma Football: Lincoln Riley discusses Mike Stoops’ firing',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.240',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Lil Wayne uses Instagram to offer his take on the OBJ ESPN interview',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.241',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Glitchy defense, inflated lines costing Tide bettors money',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.245',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'New spinning ball turbine could bring green energy to windy cities',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.218',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'MLB playoffs 2018: The Red Sox are just better. Now what, Yankees?',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.235',
                     'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'State Bicycle Co 6061 BLACK LABEL V2 ZOMBIE GREEN Bike',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.220',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Lebanon wines bring villages back to life and emigrants home',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.219',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Gasoline Motor Co X Sailor Jerry Custom Triumph Scrambler',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.215',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => '1961 Ferrari 400 Superamerica SWB Coupe Aerodinamico',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.214',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Maltese family keeps ancient salt-harvesting tradition alive',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.210',
                     'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'A Star Is Born: Lady Gaga and Bradley Cooper film not in Vue cinemas',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.194',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Carrie Underwood’s ‘Spinning Bottles’ Mesmerizes 2018 AMA Awards',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.187',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Giraffes Inherit Spot Patterns From Their Mamas, Study Says',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.181',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Anglophones and Francophones still approach Islam differently',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.164',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'The Nobel chemistry prize goes for work that harnesses evolution',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.162',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Florida’s gubernatorial race offers the starkest choice in the mid-terms',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.159',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Britain’s Supreme Court rules in favour of two Christian bakers',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.156',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'AMAs 2018: Twenty One Pilots Perform Electrifying ‘Jumpsuit’',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.186',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Kelly: It’s time to stop making excuses for Dolphins’ struggling offense',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.233',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'An endangered frog takes centre stage at the Supreme Court',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.167',
                     'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Brazilian voters wanted change — and they got it. Now what happens?',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.269',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'How established firms are winning over millennial consumers',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.160',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Omega Speedmaster HODINKEE 10th Anniversary Limited Edition Watch',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.216',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Jodie Whittaker makes a charismatic start as the new Doctor Who',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.165',
                     'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Australia Has a Plan to Keep Immigrants Out of Its Largest Cities',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.263',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Rwandan entrepreneur woos drinkers with beetroot wine',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.212',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Kanye West will meet Trump, talk about prison reform on Thursday',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.184',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Blackburn responds to Taylor Swift’s support for Tennessee Democrats',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.189',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'The American dream doesn’t exist in many neighbourhoods',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.166',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Dodgers vs. Brewers: Game times set for start of NLCS at Miller Park',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.238',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Duterte: Philippines President Confirms He Does Not Have Cancer',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.270',
                     'thumbnail_id'      => '%%media.primary.thumb-9%%',
                 ),
                 array(
                     'post_title' => 'Pope compares having an abortion to ‘hiring a hit man’',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.272',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'China’s About to Sell Dollar Bonds in Middle of a Trade War',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.266',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'John Sentamu announces his retirement as Archbishop of York',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.161',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'UN calls for investigation into jailed Venezuelan leader’s death',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.262',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'France’s Macron, Celebrated Abroad, Faces Isolation at Home',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.9%%',
                     ),
                     'the_id' => 'posts.primary.268',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Meghan Markle’s Ex-Husband Trevor Engelson Gets Remarried',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.191',
                     'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'Jennifer Lopez’s 2018 AMA performance brought the house down',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.179',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Palmyra priest statue among haul of recovered Syrian relics',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.208',
                     'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'The scandalous love affair that fuelled John Stuart Mill’s feminism',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.163',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Yoko Ono releases new version of John Lennon’s Imagine',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.188',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Kirk Cousins on pace to shatter a Vikings all-time record in 2018',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.239',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Baker says she’s honored to make UK royal wedding cake',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.217',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => '6 Of The Best: Limited Edition Luxury Watches On Mr Porter',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.6%%',
                     ),
                     'the_id' => 'posts.primary.221',
                     'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_title' => 'What is Auburn’s offensive identity midway through the season?',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.244',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'This Is Us sings the bittersweet ballad of Rebecca Pearson',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.190',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => '“The Bill Murray Stories” chronicles the star’s strange appearing act',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.158',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Notebook: Paul Moala joins Notre Dame’s freshman numbers game',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.7%%',
                     ),
                     'the_id' => 'posts.primary.243',
                     'thumbnail_id'      => '%%media.primary.thumb-8%%',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'Front Page',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'prepare_vc_css' => true,
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '3-col-0',
                         ),
                     ),
                     'the_id' => 'posts.primary.88',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'About Us',
                     'post_content_file' => $demo_path . 'post-content-2.txt',
                     'post_excerpt' => 'The vice president doubled down on his calls for the author, an unnamed top Trump administration official, to resign...',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '3-col-0',
                         ),
                     ),
                     'the_id' => 'posts.primary.87',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Banner Single',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'http://demo.betterstudio.com/publisher/staff-post/wp-content/uploads/sites/478/2018/12/300x250-post-single.jpg',
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
                     'the_id' => 'posts.primary.287',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Index Sidebar Banner',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'http://demo.betterstudio.com/publisher/staff-post/wp-content/uploads/sites/478/2018/12/300x250-sidebar-index.jpg',
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
                     'the_id' => 'posts.primary.74',
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
                             'meta_value' => 'style-3',
                         ),
                         array(
                             'meta_key' => 'color',
                             'meta_value' => '#f30d54',
                         ),
                         array(
                             'meta_key' => 'social_icons',
                             'meta_value' => '0',
                         ),
                     ),
                     'the_id' => 'posts.primary.82',
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
                            'logo_image'        => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
                            'logo_image_retina' => '%%bf_product_demo_media_url:{media.primary.logo-main-retina}:\'full\'%%',
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
                     'option_value' => '%%posts.primary.88%%',
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
                                 'banner' => '287',
                                 'count' => '3',
                                 'columns' => '3',
                                 'orderby' => 'rand',
                                 'order' => 'ASC',
                                 'align' => 'right',
                                 'paragraph' => '6',
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
                             'banner' => '%%posts.primary.74%%',
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
                         'widget_id' => 'bs-thumbnail-listing-2',
                         'widget_settings' => array(
                             'title' => 'Editors\' Picks',
                             'count' => '3',
                             'order_by' => 'popular',
                             'columns' => '1',
                             'pagination-show-label' => '1',
                             'listing-settings' => array(
                                 'thumbnail-type' => 'featured-image',
                                 'title-limit' => '60',
                                 'excerpt' => '0',
                                 'excerpt-limit' => '115',
                                 'subtitle' => '0',
                                 'subtitle-limit' => '0',
                                 'subtitle-location' => 'after-title',
                                 'format-icon' => '1',
                                 'term-badge' => '1',
                                 'term-badge-count' => '1',
                                 'term-badge-tax' => 'category',
                                 'show-ranking' => '',
                                 'meta' => array(
                                     'show' => '0',
                                     'author' => '1',
                                     'date' => '1',
                                     'date-format' => 'standard',
                                     'view' => '0',
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
                         ),
                     ),
                     array(
                         'widget_id' => 'better-social-counter',
                         'widget_settings' => array(
                             'title' => 'Follow us',
                             'style' => 'style-11',
                             'columns' => '1',
                             'order' => array(
                                 'facebook' => '1',
                                 'twitter' => '1',
                                 'youtube' => '1',
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
                 ),
                 'footer-1' => array(
                     'remove_all_widgets' => true,
                     array(
                         'widget_id' => 'bs-about',
                         'widget_settings' => array(
                             'logo_img' => '%%bf_product_demo_media_url:{media.primary.logo-main}:\'full\'%%',
                             'link_facebook' => '#',
                             'link_twitter' => '#',
                             'link_google' => '#',
                             'link_instagram' => '#',
                             'link_email' => '#',
                             'link_youtube' => '#',
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
             ),
         ),
      //
      // ->Media
      //
      'media' => 
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
                             'title' => 'Home',
                             'page_id' => '%%posts.primary.88%%',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.9%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.4%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.5%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.6%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.7%%',
                             'taxonomy' => 'category',
                         ),
                     ),
                 ),
                 array(
                     'menu-location' => 'footer-menu',
                     'menu-name' => 'Footer Navigation',
                     'items' => array(
                         array(
                             'item_type' => 'page',
                             'title' => 'Home',
                             'page_id' => '%%posts.primary.88%%',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.4%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.5%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.6%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.7%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.9%%',
                             'taxonomy' => 'category',
                         ),
                     ),
                 ),
             ),
         ),	);
}
