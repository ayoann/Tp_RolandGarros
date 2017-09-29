<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class InitDatabaseCommand
 * @package AppBundle\Command
 */
class InitDatabaseCommand extends Command
{
    const DROP_DATABASE = "doctrine:database:drop";
    const CREATE_DATABASE = "doctrine:database:create";
    const UPDATE_DATABASE = "doctrine:schema:update";
    const IMPORT_DATABASE = "doctrine:database:import";
    const FILE_NAME = "./src/AppBundle/Data/fixtures.sql";

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('rg:database:init')

            // the short description shown while running "php bin/console list"
            ->setDescription('Drop, create, init and populate Rolang Garros Database.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Drop, create, init and populate Rolang Garros Database...')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // 1) drop the existing database
        try {
            $command = $this->getApplication()->find(self::DROP_DATABASE);

            $arguments = array(
                'command' => self::DROP_DATABASE,
                '--force'  => true,
            );

            $greetInput = new ArrayInput($arguments);
            $command->run($greetInput, $output);
        } catch (\Exception $exception) {}

        // 2) create the database
        $command = $this->getApplication()->find(self::CREATE_DATABASE);

        $arguments = array(
            'command' => self::CREATE_DATABASE,
        );

        $greetInput = new ArrayInput($arguments);
        $command->run($greetInput, $output);

        // 3) update schema
        $command = $this->getApplication()->find(self::UPDATE_DATABASE);

        $arguments = array(
            'command' => self::UPDATE_DATABASE,
            '--force' => true,
        );

        $greetInput = new ArrayInput($arguments);
        $command->run($greetInput, $output);

        // 4) insert fixtures SQL
        $command = $this->getApplication()->find(self::IMPORT_DATABASE);

        $arguments = array(
            'command' => self::IMPORT_DATABASE,
            'file' => self::FILE_NAME,
        );

        $greetInput = new ArrayInput($arguments);
        $command->run($greetInput, $output);
    }
}