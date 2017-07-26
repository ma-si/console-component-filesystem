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

trait CopyCommandAwareTrait
{
    /**
     * @param OutputInterface $output
     * @param $source
     * @param $target
     *
     * @return mixed
     */
    private function cp(OutputInterface $output, $source, $target)
    {
        $command = $this->getApplication()->find('filesystem:copy');

        $input = new ArrayInput([
            'command' => $command->getName(),
            '--source' => $source,
            '--target' => $target,
            '-f',
        ]);

        return $command->run($input, $output);
    }
}
