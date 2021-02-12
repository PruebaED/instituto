<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Matricula;
use App\Models\Curso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

    	User::truncate();
    	Grupo::truncate();
    	Matricula::truncate();
        User::factory(10)->create();
        Grupo::factory(20)->create();
        Matricula::factory(15)->create();

        $user = User::factory()
            ->has(Grupo::factory()->count(3))
            ->create();

        self::seedUsuario();
        self::seedCursoDePrueba();

    }

    private static function seedUsuario() {

        $usuario1 = new User;
        $usuario1->name = 'Guillermo Gómez';
        $usuario1->email = '5569136@alu.murciaeduca.es';
        $usuario1->password = bcrypt('guillermogomez');
        $usuario1->usuario_av = 81055;
        $usuario1->save();

    }

    private static function seedCursoDePrueba() {

        $curso1 = new Curso;
        $curso1->shortname = 'Curso des';
        $curso1->fullname = 'Curso de Desarrollo en Entorno Servidor';
        $curso1->save();

    }

}
