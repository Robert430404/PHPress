<?php

namespace Phpress\ObjectFormatters;

use Phpress\FunctionHelpers\ContentHelpers;

class PostFormatter {
    /**
     * @var object
     */
    private $contentHelpers;

    /**
     * PostFormatter constructor.
     *
     * @param ContentHelpers $contentHelpers
     */
    public function __construct(ContentHelpers $contentHelpers)
    {
        $this->contentHelpers = $contentHelpers;
    }

    /**
     * @param  object $queryObject
     * @return array
     */
    public function formatPosts($queryObject)
    {
        $posts = [];

        foreach($queryObject as $key => $post)
        {
            $posts[$key] = [
                'id'            => $post->ID,
                'published'     => date('F d, Y', strtotime($post->post_date)),
                'post_title'    => $post->post_title,
                'post_image'    => $this->contentHelpers->getPostThumbnail($post->ID),
                'post_content'  => $this->contentHelpers->formatPostContent($post->post_content),
                'post_excerpt'  => $this->contentHelpers->formatPostExcerpt($post->post_content, 255),
                'post_category' => get_the_category($post->ID),
                'post_link'     => $post->post_name,
                'post_author'   => get_the_author_meta('user_nicename' , $post->post_author),
            ];
        }

        return $posts;
    }
}