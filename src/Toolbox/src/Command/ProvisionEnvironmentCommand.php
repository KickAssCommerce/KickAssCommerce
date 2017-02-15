<?php

namespace KickAss\Toolbox\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProvisionEnvironmentCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('toolbox:provision')
            ->setDescription('Run basic commands to get your installation ready for ' . getenv('ENV_ENVIRONMENT'))
            ->addArgument(
                'branch',
                InputArgument::OPTIONAL,
                'which branch should we use, current by default'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $branch = $input->getArgument('branch') ?? '$(git rev-parse --abbrev-ref HEAD)';

        // set up the right branch
        $gitCheckAndPull = shell_exec("git fetch origin && git checkout {$branch} && git pull origin {$branch}");
        $output->writeln($gitCheckAndPull);

        // composer install
        $composerInstall = shell_exec("composer install");
        $output->writeln($composerInstall);
    }
}
