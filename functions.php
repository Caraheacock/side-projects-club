<?php

/*
 * Side Projects Club
 */

/* Puzzle Pieces required file */
require_once('puzzle_pieces/puzzle_pieces.php');

/*
 * Puzzle Page Builder config
 * Only include if the plugin is active
 */
if (class_exists('PuzzlePageBuilder')) require_once('theme/miscellaneous/puzzle_config.php');

/* Theme setup */
foreach (glob(get_stylesheet_directory() . '/theme/setup/*.php') as $filename) {
    include $filename;
}

?>
