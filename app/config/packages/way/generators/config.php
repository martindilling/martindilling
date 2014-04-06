<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Where the templates for the generators are stored...
    |--------------------------------------------------------------------------
    |
    */
    'model_template_path' => app_path('config/packages/way/generators/templates/model.txt'),

    'scaffold_model_template_path' => app_path('config/packages/way/generators/templates/scaffolding/model.txt'),

    'controller_template_path' => app_path('config/packages/way/generators/templates/controller.txt'),

    'scaffold_controller_template_path' => app_path('config/packages/way/generators/templates/scaffolding/controller.txt'),

    'migration_template_path' => app_path('config/packages/way/generators/templates/migration.txt'),

    'seed_template_path' => app_path('config/packages/way/generators/templates/seed.txt'),

    'view_template_path' => app_path('config/packages/way/generators/templates/view.txt'),
    
//    'model_template_path' => 'vendor/way/generators/src/Way/Generators/templates/model.txt',
//
//    'scaffold_model_template_path' => 'vendor/way/generators/src/Way/Generators/templates/scaffolding/model.txt',
//
//    'controller_template_path' => 'vendor/way/generators/src/Way/Generators/templates/controller.txt',
//
//    'scaffold_controller_template_path' => 'vendor/way/generators/src/Way/Generators/templates/scaffolding/controller.txt',
//
//    'migration_template_path' => 'vendor/way/generators/src/Way/Generators/templates/migration.txt',
//
//    'seed_template_path' => 'vendor/way/generators/src/Way/Generators/templates/seed.txt',
//
//    'view_template_path' => 'vendor/way/generators/src/Way/Generators/templates/view.txt',


    /*
    |--------------------------------------------------------------------------
    | Where the generated files will be saved...
    |--------------------------------------------------------------------------
    |
    */
    'model_target_path'   => app_path('MDH/Entities'),

    'controller_target_path'   => app_path('controllers'),

    'migration_target_path'   => app_path('database/migrations'),

    'seed_target_path'   => app_path('database/seeds'),

    'view_target_path'   => app_path('views')

];
