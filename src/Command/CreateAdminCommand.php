<?php
// src/Command/CreateAdminCommand.php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Crée un utilisateur administrateur',
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Créer l'admin
        $admin = new User();
        $admin->setEmail('armandodapa10@gmail.com');
        $admin->setFirstName('Armando');
        $admin->setLastName('Dapa');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin123'));
        $admin->setIsVerified(true);

        $this->entityManager->persist($admin);
        $this->entityManager->flush();

        $io->success('Administrateur créé avec succès !');
        $io->info('Email: armandodapa10@gmail.com');
        $io->info('Mot de passe: admin123');

        return Command::SUCCESS;
    }
}