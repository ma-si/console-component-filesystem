<?php

/**
 * Aist Filesystem Component (http://mateuszsitek.com/projects/filesystem)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Test\Aist\Filesystem\Console\Helper;

use Aist\Filesystem\Console\Helper\FilesystemHelper;
use Aist\Filesystem\Console\Helper\FilesystemHelperFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ProphecyInterface;

class FilesystemHelperFactoryTest extends TestCase
{
    /**
     * @var ContainerInterface|ProphecyInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);
    }

    public function testCallingFactoryReturnsHelperInstance()
    {
        $factory = new FilesystemHelperFactory();
        $this->assertInstanceOf(FilesystemHelperFactory::class, $factory);

        $class = $factory($this->container->reveal());

        $this->assertInstanceOf(FilesystemHelper::class, $class);
    }
}
