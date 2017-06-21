<?php

namespace ALR\APIBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOAuthClientCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('oauth:client:create')
            ->setDescription('Criar um novo OAuth client para o usuário')
            ->addOption('redirect-uri', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Sets the redirect uri. Use multiple times to set multiple uris.', null)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris($input->getOption('http://' . $this->getContainer()->getParameter('domain') + '/api'));
        $client->setAllowedGrantTypes(['client_credentials']);
        $clientManager->updateClient($client);

        $output->writeln(sprintf('client_id=%s', $client->getRandomId()));
        $output->writeln(sprintf('client_secret=%s', $client->getSecret()));
    }


}