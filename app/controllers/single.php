<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller
{
    public function hide_big_image(){
        global $post;
        $meta = get_post_meta( $post->ID, 'hide_big_image', true );
        return $meta == '1';
    }
}
