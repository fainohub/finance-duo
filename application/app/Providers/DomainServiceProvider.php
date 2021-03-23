<?php

namespace App\Providers;

use FinanceDuo\Groups\Domain\Group;
use FinanceDuo\Groups\Domain\GroupRepository;
use FinanceDuo\Groups\Infrastructure\Persistence\GroupDoctrineRepository;
use FinanceDuo\Auth\Domain\TokenCreator;
use FinanceDuo\Auth\Domain\TokenDecoder;
use FinanceDuo\Auth\Infrastructure\JWT\JWTTokenCreator;
use FinanceDuo\Auth\Infrastructure\JWT\JWTTokenDecoder;
use FinanceDuo\Expenses\Domain\Category;
use FinanceDuo\Expenses\Domain\CategoryRepository;
use FinanceDuo\Expenses\Domain\Expense;
use FinanceDuo\Expenses\Domain\ExpenseRepository;
use FinanceDuo\Expenses\Infrastructure\Persistence\CategoryDoctrineRepository;
use FinanceDuo\Expenses\Infrastructure\Persistence\ExpenseDoctrineRepository;
use FinanceDuo\Users\Domain\PasswordEncryptor;
use FinanceDuo\Users\Domain\User;
use FinanceDuo\Users\Domain\UserRepository;
use FinanceDuo\Users\Infrastructure\PHPPasswordEncryptor;
use FinanceDuo\Users\Infrastructure\Persistence\UserDoctrineRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvide
 * @package App\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Domain Services
        $this->app->bind(TokenCreator::class, JWTTokenCreator::class);

        $this->app->bind(TokenDecoder::class, JWTTokenDecoder::class);

        $this->app->bind(PasswordEncryptor::class, PHPPasswordEncryptor::class);

        //Repositories
        $this->app->bind(UserRepository::class, function($app) {
            return new UserDoctrineRepository($app['em'], $app['em']->getClassMetaData(User::class));
        });

        $this->app->bind(GroupRepository::class, function($app) {
            return new GroupDoctrineRepository($app['em'], $app['em']->getClassMetaData(Group::class));
        });

        $this->app->bind(ExpenseRepository::class, function($app) {
            return new ExpenseDoctrineRepository($app['em'], $app['em']->getClassMetaData(Expense::class));
        });

        $this->app->bind(CategoryRepository::class, function($app) {
            return new CategoryDoctrineRepository($app['em'], $app['em']->getClassMetaData(Category::class));
        });
    }
}
