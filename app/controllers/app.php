<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    // public function latest() {
    //     global $wp_query;
    //         $q = clone $wp_query;
    //         \App\dd($q);
    //     $tag = \get_term_by('slug', 'instaphoto', 'post_tag');
    //     return new \WP_Query([
    //         'posts_per_page' => 1,
    //         'post_type' => ['post'],
    //         'tag__not_in' => [$tag->term_id]
    //     ]);
    // }
}
