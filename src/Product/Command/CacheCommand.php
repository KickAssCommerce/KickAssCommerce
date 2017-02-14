<?php

namespace KickAss\Commerce\Product\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Cache\Adapter\Filesystem\FilesystemCachePool;

class CacheCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('product:cache:clear')
            ->setDescription('Flushes product cache')
            ->setHelp("Removed all cache entries tagged 'product'");
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Flushing',
            '============',
            '',
        ]);

        $filesystemAdapter = new Local(APP_BASE_DIR . 'storage/cache/api/');
        $filesystem        = new Filesystem($filesystemAdapter);

        $pool = new FilesystemCachePool($filesystem);

        try {
            $pool->clearTags(['products']);

            $output->writeln(['done']);
        } catch(\Exception $e) {
            $output->writeln(['error while flushing']);
        }

    }
}
