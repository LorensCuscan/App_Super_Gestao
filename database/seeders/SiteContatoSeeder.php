<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\SiteContato;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 9999-9999';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Seja bem vindo ao sistema super gestão';
        $contato->save();
        */
        
       SiteContato::factory()->count(100)->create();
    }
}
