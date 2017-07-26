<?php

/**
 * Aist Filesystem Component (http://mateuszsitek.com/projects/filesystem)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Filesystem\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Copy command
 */
class CopyCommand extends Command
{
    const NAME = 'filesystem:copy';

    const DESCRIPTION = 'Filesystem cp.';

    const HELP = <<< 'EOT'
Filesystem cp.
EOT;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription(self::DESCRIPTION)
            ->setHelp(self::HELP)
            ->setDefinition([
                new InputOption(
                    'source',
                    's',
                    InputOption::VALUE_REQUIRED,
                    'Source path.'
                ),
                new InputOption(
                    'target',
                    't',
                    InputOption::VALUE_REQUIRED,
                    'Target path.'
                ),
                new InputOption(
                    'force',
                    'f',
                    InputOption::VALUE_NONE,
                    'Force overwrite.'
                ),
            ])
        ;
    }

    /**
     * Executes the command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Strange issue
         * Without this we can't use $this->getHelper('name')
         * but $this->getApplication()->getHelperSet()->get('name')
         */
        $this->setApplication($this->getApplication());
        $filesystem = $this->getHelper('filesystem');
        $logger = $this->getHelper('logger');

        $source = $input->getOption('source');
        $target = $input->getOption('target');
        $overwrite = $input->getOption('force');

        try {
            $filesystem->copy($source, $target, $overwrite);
            if ($output->getVerbosity() >= OutputInterface::VERBOSITY_NORMAL) {
                $output->writeln(sprintf('Copied <info>%s</info> to <info>%s</info>', $source, $target));
            }
            $logger->info(
                self::class,
                [
                    'source' => $source,
                    'target' => $target,
                    'overwrite' => $overwrite,
                ]
            );
        } catch (\Exception $exception) {
            if (! $output->isQuiet()) {
                $output->writeln(sprintf('<error>%s</error>', $exception->getMessage()));
            }
            $logger->error(
                self::class,
                [
                    'code' => $exception->getCode(),
                    'message' => $exception->getMessage(),
                    'source' => $source,
                    'target' => $target,
                    'overwrite' => $overwrite,
                ]
            );

            return 1;
        }

        return 0;
    }
}
