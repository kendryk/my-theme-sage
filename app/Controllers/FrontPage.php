<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{

    public function helloWorld() {
        return "Bonjour le monde !";
    }

    public function number() {
        return 10;
    }

    public function lastPosts() {
        $query = new WP_Query([
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3
        ]);

        $titles = [];
        while($query->have_posts()) {
            $query->the_post();
            $titles[] = get_the_title();
        }

        return $titles;
    }

}
