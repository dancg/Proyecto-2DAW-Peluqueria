<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteTmpFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:delete-tmp-folder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminar carpeta temporal al crear o modificar imágenes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Este problema me surge cuando pongo una foto de perfil, creo una marca/artículo
        // y editando una marca/artículo.
        // Con esta línea me borra la carpeta temporal cada vez que se ejecute el comando
        File::deleteDirectory(storage_path('app/public/livewire-tmp'));
    }
}
