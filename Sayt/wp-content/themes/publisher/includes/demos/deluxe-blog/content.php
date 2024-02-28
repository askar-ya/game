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

	$style_id       = 'deluxe-blog';
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
                     'name' => 'armani',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.6',
                 ),
                 array(
                     'name' => 'DavidBeckhams',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.7',
                 ),
                 array(
                     'name' => 'Fashion',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-3',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.2',
                 ),
                 array(
                     'name' => 'Lifestyle',
                     'taxonomy' => 'category',
                     'the_id' => 'taxonomy.primary.3',
                 ),
                 array(
                     'name' => 'luxury',
                     'taxonomy' => 'post_tag',
                     'the_id' => 'taxonomy.primary.8',
                 ),
                 array(
                     'name' => 'Photography',
                     'taxonomy' => 'category',
                     'term_meta' => array(
                         array(
                             'meta_key' => 'better_slider_style',
                             'meta_value' => 'style-17',
                         ),
                     ),
                     'the_id' => 'taxonomy.primary.4',
                 ),
                 array(
                     'name' => 'Video',
                     'taxonomy' => 'post_format',
                     'the_id' => 'taxonomy.primary.12',
                 ),
                 array(
                     'name' => 'Travel',
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
                     'name' => 'Versace',
                     'taxonomy' => 'post_tag',
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
                     'post_title' => 'Fashion: <i>Street Style</i> to Get You Through Fashion <i><b>Month Withdrawals</b></i>',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'www.vogue.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.vogue.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.123',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Model Who Breastfed on the Runway Is ‘Proud’ to Represent Working Moms',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.91',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => '16 Ways to Get People to Like You Immediately, According to Psychology',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.102',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'The 10 Best Places to Spend the Holidays, According to Travel Experts',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.101',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Pringles Made Chips Flavored Like Every Course of a Thanksgiving Dinner',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.100',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => '1 The One Simple Trick to Get Special Treatment From a Flight Attendant',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.99',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'This Is Bobby Flay’s Number One Restaurant Etiquette Rule He Never Breaks',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.98',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'The U.S. Just Issued a Travel Warning for a Popular Mexican Resort Town',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.95',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => '5 of Modern History’s Most Persistent Myths About the Gender Wage Gap',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.96',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'How To Tell If You’re In a Toxic Relationship — And What To Do About It',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.97',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'How Early Should You Get to the Airport? Here’s What Travel Experts Say',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.93',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'More Than Half of Teens Think They Spend Too Much Time on Their Phones',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'the_id' => 'posts.primary.88',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Frank And Oak founders among the most “optimistic” influencers in fashion',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.116',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Demi Lovato Just Cut Her Long Hair Into a Short, Sleek Asymmetrical Bob',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.70',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Rachel Hilbert Shares Her Foolproof Hack for the Perfect Beach Waves',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.64',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Bella Hadid’s Hairstylist Chad Wood on the Rules of a Spring Hair Revamp',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.65',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => '6 Over-the-Top Celebrity-Approved Facials That You Need to Know Exist',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.67',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Watch Out, Kylie Jenner: Serena Williams Is Launching Her Own Beauty Brand',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.68',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'A Victoria Beckham Model’s Easy Drugstore Hack for Drying Out Pimples',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.69',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Kim Kardashian Says Her Next Fragrance Bottle Will Be Shaped Like Her Body',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.63',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Beauty Entrepreneur Bobbi Brown Is Reinventing Herself as a Wellness Guru',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.62',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'The Secret to Getting Kate Middleton’s Hair Is Much Simpler Than You Think',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.58',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Bella Hadid’s Hairstylist Chad Wood on the Rules of a Spring Hair Revamp',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                     ),
                     'the_id' => 'posts.primary.55',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => '<b>Sasha Obama</b> Debuted A New Hairstyle <b><i>While Hanging Out With Cardi B</i></b>',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                         'post_format' => '%%taxonomy.primary.12%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'www.vogue.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.vogue.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.61',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'We Spoke With Iris van Herpen About Envisioning the Future of Femininity',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.114',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Turns Out Spring/Summer 2019 is Josep Font’s Last Collection for Delpozo',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.118',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'See Max Mara’s Iconic Cube Jacket Reinterpreted by Three Photographers',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.119',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'How Long Does It Take to Get a Passport? <i>Here’s <b>What Need to Know</b></i>',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.3%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'www.vogue.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.vogue.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.94',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => '<i>Barack</i> and <i>Michelle Obama</i> Are in Talks to Get Their Own <b>Netflix Show</b>',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'www.vogue.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.vogue.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.150',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => '<i><b>Like a True Punk</b></i>, Kristen Stewart Wore a <i>Rattail on The Cannes <b>Red Carpet</b></i>',
                     'post_format' => 'video',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.2%%',
                         'post_format' => '%%taxonomy.primary.12%%',
                     ),
                     'post_meta' => array(
                         array(
                             'meta_key' => '_bs_source_name',
                             'meta_value' => 'www.vogue.co.uk',
                         ),
                         array(
                             'meta_key' => '_bs_source_url',
                             'meta_value' => 'https://www.vogue.co.uk',
                         ),
                     ),
                     'the_id' => 'posts.primary.60',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => 'Virgin Atlantic Just Introduced Their Own Version of Basic Economy',
                     'post_content_file' => $demo_path . 'post-content-1.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.153',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Amazon Prime Membership Just Became Cheaper for Millions of People',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.152',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'The U.S. Just Issued a Travel Warning for a Popular Mexican Resort Town',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.151',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'Chris Hemsworth Is on the Most Adorable Vacation With His Family',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.144',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'An Adorable Baby Bunny Was Rescued From a Storm at Dublin Airport',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.145',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_title' => 'This 84-year-old Mayor, Bartender, and Librarian Is Her Town’s Only Resident',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.146',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'Extreme Winter Weather Has Ireland on Red Alert, and It Looks Scary',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.147',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'Kim, Kourtney, and Khloé Kardashian Are on a Girls’ Trip in Tokyo',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.148',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Why Meghan Markle’s Mutt Might Not Be Welcomed by the Royal Family',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.143',
                     'thumbnail_id'      => '%%media.primary.thumb-2%%',
                 ),
                 array(
                     'post_title' => '12 Pairs of Celebrity-approved Leggings That Are Perfect for Travel',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.141',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'In-flight Beauty Rituals to Steal From Sports Illustrated Swimsuit Models',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.5%%',
                     ),
                     'the_id' => 'posts.primary.139',
                     'thumbnail_id'      => '%%media.primary.thumb-4%%',
                 ),
                 array(
                     'post_title' => 'The Top 10 Things We Learned About Fashion Month From Social Media',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.127',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'L’Oréal’s Star-Studded Show at Paris Fashion Week Did Not Disappoint',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.126',
                     'thumbnail_id'      => '%%media.primary.thumb-6%%',
                 ),
                 array(
                     'post_title' => 'Alexandre de Betak Set the Scene for All Your Favourite Shows and Designers',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.120',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'Every Look Our Cover Girl Amber Witcomb Rocked on the Spring Runways',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.121',
                     'thumbnail_id'      => '%%media.primary.thumb-3%%',
                 ),
                 array(
                     'post_title' => 'Michael Kors is Back With Watch Hunger Stop: A Campaign to End World Hunger',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.122',
                     'thumbnail_id'      => '%%media.primary.thumb-5%%',
                 ),
                 array(
                     'post_title' => 'To Celebrate Bella Hadid’s 22nd, Here Are 22 of Her Best Red Carpet Moments',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.124',
                     'thumbnail_id'      => '%%media.primary.thumb-1%%',
                 ),
                 array(
                     'post_title' => 'This Canadian Jewellery Brand Designed a Talisman for the British Museum',
                     'post_content_file' => $demo_path . 'post-content.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_terms' => array(
                         'category' => '%%taxonomy.primary.4%%',
                     ),
                     'the_id' => 'posts.primary.125',
                     'thumbnail_id'      => '%%media.primary.thumb-7%%',
                 ),
                 array(
                     'post_type' => 'page',
                     'post_title' => 'About Me',
                     'post_content_file' => $demo_path . 'post-content-2.txt',
                     'post_excerpt_file' => $demo_path . 'post-excerpt.txt',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'page_layout',
                             'meta_value' => '1-col',
                         ),
                     ),
                     'the_id' => 'posts.primary.11',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Content Banner',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'https://demo.betterstudio.com/publisher/deluxe-blog/wp-content/uploads/sites/485/2018/11/336x280-post-single.jpg',
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
                     'the_id' => 'posts.primary.174',
                 ),
                 array(
                     'post_type' => 'better-banner',
                     'post_title' => 'Sidebar Banner',
                     'post_meta' => array(
                         array(
                             'meta_key' => 'type',
                             'meta_value' => 'image',
                         ),
                         array(
                             'meta_key' => 'img',
                             'meta_value' => 'https://demo.betterstudio.com/publisher/deluxe-blog/wp-content/uploads/sites/485/2018/11/336x280-sidebar-index.png',
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
                     'the_id' => 'posts.primary.52',
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
                             'meta_value' => '$',
                         ),
                     ),
                     'the_id' => 'posts.primary.54',
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
                         'off_canvas_logo' => '%%bf_product_demo_media_url:{media.primary.logo-off-canvas}:\'full\'%%',
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
                     'option_name' => 'show_on_front',
                     'option_value' => 'posts',
                 ),
                 array(
                     'type' => 'option',
                     'option_name' => 'better_ads_manager',
                     'option_value' => array(
                         'ad_post_inline' => array(
                             array(
                                 'type' => 'banner',
                                 'campaign' => 'none',
                                 'banner' => '174',
                                 'count' => '3',
                                 'columns' => '3',
                                 'orderby' => 'rand',
                                 'order' => 'ASC',
                                 'align' => 'right',
                                 'paragraph' => '2',
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
                         'widget_id' => 'bs-about',
                         'widget_settings' => array(
                             'content' => 'We started off the year just right with a trip to Phuket with our Revolve family. Take a look at all my favorite looks I wore on my Thailand trip.  ',
                             'logo_img' => '%%bf_product_demo_media_url:{media.primary.footer-logo}:\'full\'%%',
                             'about_link_url' => '#',
                             'link_facebook' => '#',
                             'link_twitter' => '#',
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
                     array(
                         'widget_id' => 'better-ads',
                         'widget_settings' => array(
                             'type' => 'banner',
                             'banner' => '%%posts.primary.52%%',
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
                         'widget_id' => 'bs-thumbnail-listing-1',
                         'widget_settings' => array(
                             'title' => 'Must Read Posts',
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
                                     'show' => '0',
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
                     array(
                         'widget_id' => 'bs-popular-categories',
                         'widget_settings' => array(
                             'exclude' => array(
                                 '',
                             ),
                             'title' => 'Categories',
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
                         'widget_id' => 'bs-instagram',
                         'widget_settings' => array(
                             'user_id' => 'betterstudio',
                             'title' => 'Follow on Instagram',
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
                             'newsletter' => '%%posts.primary.54%%',
                             'style' => 'style-9',
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
	                         'logo_img' => '%%bf_product_demo_media_url:{media.primary.footer-logo}:\'full\'%%',
                             'link_facebook' => '#',
                             'link_twitter' => '#',
                             'link_google' => '#',
                             'link_instagram' => '#',
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
                             'item_type' => 'custom',
                             'target' => '',
                             'title' => 'Home',
                             'url' => 'https://demo.betterstudio.com/publisher/deluxe-blog/',
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
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.5%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.4%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'About Me',
                             'page_id' => '%%posts.primary.11%%',
                         ),
                     ),
                 ),
                 array(
                     'menu-location' => 'top-menu',
                     'menu-name' => 'Top Navigation',
                     'items' => array(
                         array(
                             'item_type' => 'term',
                             'term_id' => '%%taxonomy.primary.3%%',
                             'taxonomy' => 'category',
                         ),
                         array(
                             'item_type' => 'page',
                             'title' => 'About Me',
                             'page_id' => '%%posts.primary.11%%',
                         ),
                     ),
                 ),
             ),
         ),	);
}
