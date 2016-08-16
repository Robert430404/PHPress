<?php

namespace Phpress\Tests\WPQueryTests;

use Phpress\Tests\TestHelpers;
use Phpress\ClassAbstractions\WPQuery;

class ArgsTests
{
    public function testBaseArgs()
    {
        $i = 0;

        TestHelpers::output('Base Args Test   ', 'STARTED');

        $query    = new WPQuery();
        $baseArgs = $query->getArgs();

        if(is_array($baseArgs))
        {
            TestHelpers::output('Base Args Array  ', 'PASS');

            if(!empty($baseArgs))
            {
                TestHelpers::output('Base Args Built  ', 'PASS');
            }
            else
            {
                TestHelpers::output('Base Args Built  ', 'FAIL');
                $i++;
            }
        }
        else
        {
            TestHelpers::output('Base Args Array  ', 'FAIL');
            $i++;
        }

        TestHelpers::output('Base Args Test   ', 'ENDED');
        TestHelpers::output('Base Args Results', $i . ' Tests Failed');

        return null;
    }

    public function testMethodChaining()
    {
        $query = new WPQuery();

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


        $this->assertNotEmpty($chainedMethods);

        return $chainedMethods;
    }
}