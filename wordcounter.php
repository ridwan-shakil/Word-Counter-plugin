<?php
/*
 * Plugin Name:       Word Counter
 * Plugin URI:        https://github.com/ridwan-shakil/Word-Counter-plugin.git
 * Description:       Counts the number of words in a content.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            MD.Ridwan
 * Author URI:        https://github.com/ridwan-shakil
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       word-counter
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// function wordcounter_activation_hook(){
// };
// register_activation_hook(__FILE__, 'wordcounter_activation_hook');

function wordcounter_count_words($content)
{
    $striped_content = strip_tags($content);
    $total_words = str_word_count($striped_content);
    $lebel = __('Total words: ', 'word-counter');

    $content .= $lebel . $total_words;

    return $content;
}
add_filter('the_content', 'wordcounter_count_words');
