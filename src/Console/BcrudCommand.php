<?php

namespace Bipin\Bcrud\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;

class BcrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bcrud:generator
    {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD operations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/{$name}.php"), $modelTemplate);
    }

    protected function controller($name)
    {
        $controllerTemplate = str_replace(
        [
            '{{modelName}}',
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}'
        ],
        [
            $name,
            strtolower(str_plural($name)),
            strtolower($name)
        ],
        $this->getStub('Controller')
    );

    file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
    }

    protected function migration($name)
    {
        $migrationTemplate = str_replace(
        [
            '{{modelName}}',
            '{{modelNamePluralLowerCase}}',
            '{{modelNameFirstUpper}}'
        ],
        [
            $name,
            strtolower(str_plural($name)),
            ucfirst(strtolower(str_plural($name))),
        ],
        $this->getStub('migration')
        );
        $date_time = date('Y_m_d_his');
        $plural_name = str_plural(strtolower($name));

        file_put_contents("database/migrations/{$date_time}_create_{$plural_name}_table.php", $migrationTemplate);
    }

    protected function request($name)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if(!file_exists($path = app_path('/Http/Requests')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        $this->controller($name);
        $this->model($name);
        $this->request($name);
        $this->migration($name);

        File::append(base_path('routes/api.php'), 'Route::resource(\'' . str_plural(strtolower($name)) . "', '{$name}Controller');");
    }
}
