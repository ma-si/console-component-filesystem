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
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Dump file command
 */
class DumpFileCommand extends Command
{
    const NAME = 'filesystem:dump-file';

    const DESCRIPTION = 'Filesystem dump file.';

    const HELP = <<< 'EOT'
Filesystem dump file.
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
                    'target',
                    't',
                    InputOption::VALUE_REQUIRED,
                    'Target path.'
                ),
                new InputOption(
                    'content',
                    'c',
                    InputOption::VALUE_REQUIRED,
                    'Content.'
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
        $io = new SymfonyStyle($input, $output);

        $target = $input->getOption('target');
        $content = $input->getOption('content');

        try {
            $filesystem->dumpFile($target, $content);
            if (! $output->isQuiet()) {
                $output->writeln(sprintf('  - Saved <info>%s</info>', $target));
            }
            $logger->info(
                self::class,
                [
                    'target' => $target,
                    'content' => $content,
                ]
            );
        } catch (\Exception $exception) {
            if (! $output->isQuiet()) {
                $io->error($exception->getMessage());
            }
            $logger->error(
                self::class,
                [
                    'code' => $exception->getCode(),
                    'message' => $exception->getMessage(),
                    'target' => $target,
                    'content' => $content,
                ]
            );

            return 1;
        }

        return 0;
    }
}
