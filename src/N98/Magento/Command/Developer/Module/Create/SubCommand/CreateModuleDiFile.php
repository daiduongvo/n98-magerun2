<?php

namespace N98\Magento\Command\Developer\Module\Create\SubCommand;

use N98\Magento\Command\SubCommand\AbstractSubCommand;

class CreateModuleDiFile extends AbstractSubCommand
{
    /**
     * @return boolean|null
     */
    public function execute()
    {
        $outFile = $this->config->getString('moduleDirectory') . '/etc/di.xml';

        \file_put_contents(
            $outFile,
            $this->getCommand()->getHelper('twig')->render(
                'dev/module/create/app/code/module/etc/di.xml.twig',
                $this->config->getArray('twigVars')
            )
        );

        $this->output->writeln('<info>Created file: <comment>' . $outFile . '<comment></info>');
    }
}
