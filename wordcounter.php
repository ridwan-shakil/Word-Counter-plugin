<?php
/*
 * Plugin Name:       Word Counter
 * Plugin URI:        https://github.com/ridwan-shakil/Word-Counter-plugin.git
 * Description:       Counts the number of words in a content.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            MD.Ridwan
 * Author URI:        https://github.com/ridwan-shakil
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:		  https://github.com/ridwan-shakil/Word-Counter-plugin.git
 * Text Domain:       word-counter
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// Showing how many words the content has 
function wordcounter_count_words($content) {
	$striped_content = strip_tags($content);
	$total_words = str_word_count($striped_content);
	$label = __('Total words ', 'word-counter');
	$tag = 'h5';
	// apply filters that can be used to change the value of label and tag
	$label = apply_filters('word_counter_label', $label);
	$tag = apply_filters('word_counter_tag', $tag);
	$content = sprintf('<%s> %s : %s </%s>', $tag, $label, $total_words, $tag) . $content;

	return $content;
}
add_filter('the_content', 'wordcounter_count_words', 20);


// Showing Reading time 
function wordcounter_reading_time($content) {
	$striped_content = strip_tags($content);
	$total_words = str_word_count($striped_content);
	$reading_minute = floor($total_words / 200);
	$reading_second = ceil($total_words % 200 / (200 / 60));
	$label = 'Total Reading Time :';
	$tag = 'h5';
	// apply filters that can be used to change the value of label and tag
	$label = apply_filters('wordcounter_reading_time_lable', $label);
	$tag = apply_filters('wordcounter_reading_time_tag', $tag);

	$content = sprintf('<%s> %s %s Minute %s second</%s> ', $tag, $label, $reading_minute, $reading_second, $tag) . $content;

	return $content;
}

add_filter('the_content', 'wordcounter_reading_time', 10);





// Testing 

// function cng_wordcounter_reading_time_lable($label) {
// 	$label = 'Time will take to read :';
// 	return $label;
// }

// add_filter('wordcounter_reading_time_lable', 'cng_wordcounter_reading_time_lable');


// function cng_wordcounter_reading_time_tag($tag) {
// 	$tag = 'h5';
// 	return $tag;
// }

// add_filter('wordcounter_reading_time_tag', 'cng_wordcounter_reading_time_tag');
