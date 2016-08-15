<?php

namespace Phpress\Tests\WPQueryTests;

use Phpress\ClassAbstractions\WPQuery;

class ArgsTests {
    public function checkIfArray()
    {
        $query    = new WPQuery();
        $baseArgs = $query->getArgs();

        echo var_dump($baseArgs);

        if(is_array($baseArgs))
        {
            echo 'Base Args: PASS';
        }
        else
        {
            echo 'Base Args: FAIL';
        }

        $chainedMethods = $query->setPostType('posts')
                                ->setTotalPosts(10)
                                ->setOrder('ASC')
                                ->setPage(1)
                                ->setAuthor(0)
                                ->setAuthorName('Test Name')
                                ->setPostStatus('publish')
                                ->setCategory(0)
                                ->setCategoryName('Test Category')
                                ->setTag(0)
                                ->setTagName('Test Tag')
                                ->setTaxQuery([
                                    'taxonomy' => 'post-type-tax',
                                    'field'    => 'post-field',
                                    'terms'    => 'post-field-value',
                                ])
                                ->setMetaQuery([
                                    'meta_key'     => 'meta-key-name',
                                    'meta_value'   => 'key-value',
                                    'meta_compare' => '!='
                                ])
                                ->getArgs();

        if(is_array($chainedMethods))
        {
            echo 'Chained Methods: PASS';
        }
        else
        {
            echo 'Chained Methods: FAIL';
        }
    }
}