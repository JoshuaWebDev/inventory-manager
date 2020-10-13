<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call('ProdutoTableSeeder');
    }
}

class ProdutoTableSeeder extends Seeder
{
  public function run()
  {
    DB::insert('INSERT INTO produtos
      (nome, quantidade, valor, descricao)
      values (?, ?, ?, ?)',
      array('Geladeira', 2, 5900.00, 'Side by Side com gelo na porta')
    );

    DB::insert('INSERT INTO produtos
      (nome, quantidade, valor, descricao)
      values (?, ?, ?, ?)',
      array('Fogão', 5, 950.00, 'Painel automático e forno elétrico')
    );

    DB::insert('INSERT INTO produtos
      (nome, quantidade, valor, descricao)
      values (?, ?, ?, ?)',
      array('Microondas', 1, 1520.00, 'Manda SMS quando termina de esquentar')
    );

    DB::insert('INSERT INTO produtos
      (nome, quantidade, valor, descricao)
      values (?, ?, ?, ?)',
      array('Celular', 7, 820.00, 'Smartphone Galaxy J7 16 GB de memória')
    );
  }
}