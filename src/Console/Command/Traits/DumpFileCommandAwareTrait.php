<?php

/**
 * Aist Filesystem Component (http://mateuszsitek.com/projects/filesystem)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Filesystem\Console\Command\Traits;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\OutputInterface;

trait DumpFileCommandAwareTrait
{
    /**
     * @param OutputInterface $output
     * @param $target
     * @param $content
     *
     * @return integer
     */
    private function write(OutputInterface $output, $target, $content)
    {
        $command = $this->getApplication()->find('filesystem:dump-file');

        $input = new ArrayInput([
            'command' => $command->getName(),
            '--target' => $target,
            '--content' => $content,
        ]);

        return $command->run($input, $output);
    }
}
