<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {name? : El nombre del administrador} {email? : El correo electrónico del administrador} {password? : La contraseña del administrador} {password_confirmation? : La confirmación de la contraseña del administrador}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear un administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name') ?? $this->ask('Ingrese el nombre del administrador');
        $email = $this->argument('email') ?? $this->ask('Ingrese el correo electrónico del administrador');
        $password = $this->argument('password') ?? $this->secret('Ingrese la contraseña del administrador');
        $passwordConfirmation = $this->argument('password_confirmation') ?? $this->secret('Confirme la contraseña del administrador');
        $superadmin = $this->confirm('¿Es este administrador un superadministrador?');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $this->error('Error al crear el administrador:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'superadmin' => $superadmin,
        ]);

        $this->info('Administrador creado exitosamente.');
    }
}
