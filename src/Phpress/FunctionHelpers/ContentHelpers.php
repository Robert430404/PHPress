<?php

namespace Phpress\FunctionHelpers;

class ContentHelpers
{
    /**
     * This runs the content through output formatting
     *
     * @param  integer $id      this is the content wordpress id
     * @param  string  $key     this is the content wordpress meta key
     * @param  boolean $boolean this is the boolean to control return type for single
     * @return string           this is the formatted content after filtering
     */
    static function formatMetaContent($id, $key, $boolean)
    {
        $rawContent = get_post_meta($id, $key, $boolean);
        $filteredContent = apply_filters('the_content', $rawContent);
        $formattedContent = preg_replace("/\r\n|\r|\n/", '', $filteredContent);

        return $formattedContent;
    }

    /**
     * This runs the content through output formatting
     *
     * @param  string $content this is the content
     * @return string          this is the formatted content after filtering
     */
    static function formatPostContent($content)
    {
        $rawContent = apply_filters('the_content', $content);
        $formattedContent = preg_replace("/\r\n|\r|\n/", '', $rawContent);

        return $formattedContent;
    }

    /**
     * This runs the excerpt through output formatting
     *
     * @param  string  $excerpt this is the excerpt
     * @param  integer $length  this is the length of the excerpt
     * @return string           this is the formatted excerpt agit fter filtering
     */
    static function formatPostExcerpt($excerpt, $length = 255)
    {
        $excerpt = strip_tags($excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $rawExcerpt = substr($excerpt, 0, $length) . '...';
        $formattedExcerpt = preg_replace("/\r\n|\r|\n/", '', $rawExcerpt);

        return $formattedExcerpt;
    }

    /**
     * This creates a single call to retrieve the image from wordpress
     *
     * @param  integer $id      this is the content wordpress id
     * @param  string  $key     this is the content wordpress meta key
     * @param  boolean $boolean this is the boolean to control return type for single
     * @return string           this is the url of the image from WordPress
     */
    static function getMetaImage($id, $key, $boolean)
    {
        $imageId = get_post_meta($id, $key, $boolean);
        $imageUrl = wp_get_attachment_url($imageId);

        return $imageUrl;
    }

    /**
     * This creates a single call to retrieve the image from wordpress
     *
     * @param  integer $postId this is the post id
     * @return string          this is the url of the image from WordPress
     */
    static function getPostThumbnail($postId)
    {
        $thumbnail = get_post_thumbnail_id($postId);
        $imageUrl = wp_get_attachment_url($thumbnail);

        return $imageUrl;
    }
}