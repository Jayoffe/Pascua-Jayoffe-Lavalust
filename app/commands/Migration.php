<?php


class Migration
{

    public static $command = 'migration';


    public static $description = 'Run database migrations';


    public static $arguments = [

        '[action]' => 'Action: run, create-migration, rollback, rollback-all, refresh, status',

        '[name]' => 'Migration class name for create-migration',

    ];


    protected static $route_map = [

        'run' => '/migration/migrate',

        'create-migration' => '/migration/create/',

        'rollback' => '/migration/rollback',

        'rollback-all' => '/migration/rollback-all',

        'refresh' => '/migration/refresh',

        'status' => '/migration/status',

    ];


    public function handle($action = null, array $flags = [], $name = null)
    {

        $action = $action ?? 'run';

        global $argv;

        $name = $name ?? ($argv[3] ?? null);


        if (!isset(static::$route_map[$action])) {

            echo danger("Unknown migration action: \"{$action}\"");

            echo "Available actions: "

                . implode(', ', array_keys(static::$route_map))

                . PHP_EOL;

            exit(1);

        }


        if ($action === 'create-migration') {


            if (!$name) {

                echo danger("Migration name is required.");

                echo "Example: php lava migration create-migration create_users_table"

                    . PHP_EOL;

                exit(1);

            }


            $route = static::$route_map[$action] . $name;


        } else {


            $route = static::$route_map[$action];

        }


        $index = PUBLIC_DIR . 'index.php';


        if (!file_exists($index)) {

            echo danger("index.php not found at: {$index}");

            exit(1);

        }


        $command = sprintf(

            'php %s %s',

            escapeshellarg($index),

            escapeshellarg($route)

        );


        passthru($command);

    }

}