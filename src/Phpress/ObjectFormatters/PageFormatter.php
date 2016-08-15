<?php

namespace Phpress\ObjectFormatters;

use Phpress\FunctionHelpers\ContentHelpers;

class PageFormatter
{
    /**
     * @var object
     */
    private $contentHelpers;

    /**
     * PageFormatter constructor.
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
        $page = [
            'id'           => $queryObject->ID,
            'published'    => date('F d, Y', strtotime($queryObject->post_date)),
            'post_title'   => $queryObject->post_title,
            'post_image'   => $this->contentHelpers->getPostThumbnail($queryObject->ID),
            'post_content' => $this->contentHelpers->formatPostContent($queryObject->post_content),
            'post_link'    => $queryObject->post_name,
            'post_author'  => get_the_author_meta('user_nicename', $queryObject->post_author),
        ];

        return $page;
    }
}