<?php

namespace Phpress\ClassAbstractions;

class WPQuery extends \WP_Query
{
    /**
     * Container for the arguements for the query
     *
     * @var array
     */
    protected $args;

    /**
     * Container for the query post total
     *
     * @var integer
     */
    public $postType;

    /**
     * Container for the query post total
     *
     * @var integer
     */
    public $totalPosts;

    /**
     * Container for the query order
     *
     * @var string
     */
    public $order;

    /**
     * Container for the query order
     *
     * @var string
     */
    public $page;

    /**
     * CustomWPQuery constructor.
     */
    public function __construct()
    {
        $this->postType = 'posts';
        $this->totalPosts = '10';
        $this->order = 'ASC';
        $this->page = 1;
        $this->args = [];
    }

    /**
     * Sets the total for the query if called
     *
     * @param  Integer $postType Container for the query post total
     * @return object  $this
     */
    public function setPostType($postType)
    {
        if (isset($this->args['post_type'])) {
            unset($this->args['post_type']);
        }

        $this->postType = $postType;
        $this->args = array_merge($this->args, ['post_type' => $this->postType]);

        return $this;
    }

    /**
     * Sets the total for the query if called
     *
     * @param Integer $total Container for the query post total
     * @return object $this
     */
    public function setTotalPosts($total)
    {
        if (isset($this->args['posts_per_page'])) {
            unset($this->args['posts_per_page']);
        }

        $this->totalPosts = $total;
        $this->args = array_merge($this->args, ['posts_per_page' => $this->totalPosts]);

        return $this;
    }

    /**
     * Sets the order for the query if called
     *
     * @param  string $order Container for the query order
     * @return object $this
     */
    public function setOrder($order)
    {
        if (isset($this->args['order'])) {
            unset($this->args['order']);
        }

        $this->order = $order;
        $this->args = array_merge($this->args, ['order' => $this->order]);

        return $this;
    }

    /**
     * Sets the page that the posts are on (Used for pagination)
     *
     * @param  integer $page Container for the posts page
     * @return object  $this
     */
    public function setPage($page)
    {
        if (isset($this->args['paged'])) {
            unset($this->args['paged']);
        }

        $this->page = $page;
        $this->args = array_merge($this->args, ['paged' => $this->page]);

        return $this;
    }

    /**
     * Sets the author for the query if called
     *
     * @param  integer $author Container for the query author
     * @return object  $this
     */
    public function setAuthor($author)
    {
        if (isset($this->args['author'])) {
            unset($this->args['author']);
        }

        $this->args = array_merge($this->args, ['author' => $author]);

        return $this;
    }

    /**
     * Sets the author_name for the query if called
     *
     * @param  string $author Container for the query author_name
     * @return object $this
     */
    public function setAuthorName($author)
    {
        if (isset($this->args['author_name'])) {
            unset($this->args['author_name']);
        }

        $this->args = array_merge($this->args, ['author_name' => $author]);

        return $this;
    }

    /**
     * Sets the post_status for the query if called
     *
     * @param  string $status Container for the query post_status
     * @return object $this
     */
    public function setPostStatus($status)
    {
        if (isset($this->args['post_status'])) {
            unset($this->args['post_status']);
        }

        $this->args = array_merge($this->args, ['post_status' => $status]);

        return $this;
    }

    /**
     * Sets the cat for the query if called
     *
     * @param  integer $cat Container for the query cat
     * @return object  $this
     */
    public function setCategory($cat)
    {
        if (isset($this->args['cat'])) {
            unset($this->args['cat']);
        }

        $this->args = array_merge($this->args, ['cat' => $cat]);

        return $this;
    }

    /**
     * Sets the category_name for the query if called
     *
     * @param  string $catName Container for the query category_name
     * @return object $this
     */
    public function setCategoryName($catName)
    {
        if (isset($this->args['category_name'])) {
            unset($this->args['category_name']);
        }

        $this->args = array_merge($this->args, ['category_name' => $catName]);

        return $this;
    }

    /**
     * Sets the tag_id for the query if called
     *
     * @param  integer $tag Container for the query tag
     * @return object  $this
     */
    public function setTag($tag)
    {
        if (isset($this->args['tag_id'])) {
            unset($this->args['tag_id']);
        }

        $this->args = array_merge($this->args, ['tag_id' => $tag]);

        return $this;
    }

    /**
     * Sets the tag for the query if called
     *
     * @param  string $tagName Container for the query tag
     * @return object $this
     */
    public function setTagName($tagName)
    {
        if (isset($this->args['tag'])) {
            unset($this->args['tag']);
        }

        $this->args = array_merge($this->args, ['tag' => $tagName]);

        return $this;
    }

    /**
     * Sets the tax_query for the query if called
     *
     * @param  array $query Container for the query tax_query
     * @return object $this
     */
    public function setTaxQuery($query)
    {
        if (isset($this->args['tax_query'])) {
            unset($this->args['tax_query']);
        }

        $this->args = array_merge($this->args, ['tax_query' => $query]);

        return $this;
    }

    /**
     * Sets the meta query for the query if called
     *
     * @param  array $query Container for the query meta query
     * @return object $this
     */
    public function setMetaQuery($query)
    {
        if (isset($this->args['meta_query'])) {
            unset($this->args['meta_query']);
        }

        $this->args = array_merge($this->args, ['meta_query' => $query]);

        return $this;
    }

    /**
     * Returns the current args array
     * @return array These are the args for the query
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * Creates the query for manipulation inside of controller
     *
     * @return Object This is a WordPress Query Object
     */
    public function createQuery()
    {
        parent::__construct($this->args);
    }

    /**
     * Resets the query once the objects use is complete
     *
     * @return void
     */
    public function __destruct()
    {
        wp_reset_query();
    }
}