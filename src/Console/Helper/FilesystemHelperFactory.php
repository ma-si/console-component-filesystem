<?php

/**
 * Aist Filesystem Component (http://mateuszsitek.com/projects/filesystem)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Filesystem\Console\Helper;

use Interop\Container\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Factory for FilesystemHelper
 */
class FilesystemHelperFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return FilesystemHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        return new FilesystemHelper(new Filesystem());
    }
}
