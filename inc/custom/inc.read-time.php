<?php

/* Calculate the estimated reading time for a given piece of $content.
*
* @param string $content Content to calculate read time for.
* @param int $wpm Estimated words per minute of reader.
*
* @returns	int $time Estimated reading time.
*/

function vannkorn_estimated_reading_time( $content = '', $wpm = 250 ) {
    $clean_content = strip_shortcodes( $content );
    $clean_content = strip_tags( $clean_content );
    $word_count = str_word_count( $clean_content );
    $time = ceil( $word_count / $wpm );
    return $time;
}