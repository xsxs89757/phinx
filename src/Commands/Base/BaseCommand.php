<?php


namespace Qifen\phinx\Commands\Base;

use Phinx\Console\Command\AbstractCommand;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputInterface;
use InvalidArgumentException;

abstract class BaseCommand extends AbstractCommand
{
    protected function locateConfigFile(InputInterface $input)
    {
        $configFile = $input->getOption('configuration');

        $useDefault = false;

        if ($configFile === null || $configFile === false) {
            $useDefault = true;
        }

        $cwd = config_path();

        // locate the phinx config file
        // In future walk the tree in reverse (max 10 levels)
        $locator = new FileLocator([
            $cwd . DIRECTORY_SEPARATOR,
        ]);

        if (!$useDefault) {
            // Locate() throws an exception if the file does not exist
            return $locator->locate($configFile, $cwd, true);
        }

        $possibleConfigFiles = ['phinx.php', 'phinx.json', 'phinx.yaml', 'phinx.yml'];
        foreach ($possibleConfigFiles as $configFile) {
            try {
                return $locator->locate('./plugin/qifen/phinx/' . $configFile, $cwd, true);
            } catch (InvalidArgumentException $exception) {
                $lastException = $exception;
            }
        }
        throw $lastException;
    }
}
