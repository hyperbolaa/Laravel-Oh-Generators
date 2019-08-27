<?php

namespace Yish\Generators;

use Illuminate\Support\ServiceProvider;
use Yish\Generators\Commands\FormatterMakeCommand;
use Yish\Generators\Commands\PresenterMakeCommand;
use Yish\Generators\Commands\RepositoryMakeCommand;
use Yish\Generators\Commands\ServiceMakeCommand;
use Yish\Generators\Commands\TransformerMakeCommand;
use Yish\Generators\Commands\FoundationMakeCommand;
use Yish\Generators\Commands\ParserMakeCommand;
use Yish\Generators\Commands\TransportMakeCommand;

class GeneratorsServiceProvider extends ServiceProvider
{
    protected $commands = [
        //
    ];

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $devCommands = [
        'ServiceMake' => 'command.service.make',
        'RepositoryMake' => 'command.repository.make',
        'TransformerMake' => 'command.transformer.make',
        'PresenterMake' => 'command.presenter.make',
        'FormatterMake' => 'command.formatter.make',
        'FoundationMake' => 'command.foundation.make',
        'ParserMake' => 'command.parser.make',
        'TransportMake' => 'command.transport.make',
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands(array_merge(
            $this->commands, $this->devCommands
        ));
    }

    /**
     * Register the given commands.
     *
     * @param  array $commands
     * @return void
     */
    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            call_user_func_array([$this, "register{$command}Command"], []);
        }

        $this->commands(array_values($commands));
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerTransportMakeCommand()
    {
        $this->app->singleton('command.transport.make', function ($app) {
            return new TransportMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerParserMakeCommand()
    {
        $this->app->singleton('command.parser.make', function ($app) {
            return new ParserMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerServiceMakeCommand()
    {
        $this->app->singleton('command.service.make', function ($app) {
            return new ServiceMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRepositoryMakeCommand()
    {
        $this->app->singleton('command.repository.make', function ($app) {
            return new RepositoryMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerTransformerMakeCommand()
    {
        $this->app->singleton('command.transformer.make', function ($app) {
            return new TransformerMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerPresenterMakeCommand()
    {
        $this->app->singleton('command.presenter.make', function ($app) {
            return new PresenterMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerFormatterMakeCommand()
    {
        $this->app->singleton('command.formatter.make', function ($app) {
            return new FormatterMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerFoundationMakeCommand()
    {
        $this->app->singleton('command.foundation.make', function ($app) {
            return new FoundationMakeCommand($app['files']);
        });
    }
}
