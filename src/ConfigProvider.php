<?php

/**
 * Aist Filesystem Component (http://mateuszsitek.com/projects/filesystem)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Filesystem;

use Aist\Filesystem\Console\Command\CopyCommand;
use Aist\Filesystem\Console\Command\DumpFileCommand;
use Aist\Filesystem\Console\Helper\FilesystemHelper;
use Aist\Filesystem\Console\Helper\FilesystemHelperFactory;

/**
 * ConfigProvider for Aist Queue
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'console' => [
                'commands' => $this->getCommands(),
                'helpers' => $this->getHelpers(),
            ],
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                FilesystemHelper::class => FilesystemHelperFactory::class,
            ],
        ];
    }

    /**
     * Returns the commands array
     *
     * @return array
     */
    public function getCommands()
    {
        return [
            CopyCommand::class,
            DumpFileCommand::class,
        ];
    }

    /**
     * Returns the helpers array
     *
     * @return array
     */
    public function getHelpers()
    {
        return [
            'filesystem' => FilesystemHelper::class,
        ];
    }
}
