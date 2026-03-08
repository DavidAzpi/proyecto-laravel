<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pedido;
use App\Models\Coche;
use App\Models\User;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $user = User::where('role', 'user')->first();
        
        $coches = Coche::take(3)->get();
        
        if ($admin && $user && $coches->count() >= 3) {
            Pedido::create([
                'user_id' => $user->id,
                'coche_id' => $coches[0]->id,
                'precio' => $coches[0]->precio,
                'nombre_cliente' => $user->name,
                'email_cliente' => $user->email,
                'metodo_pago' => 'transferencia'
            ]);

            Pedido::create([
                'user_id' => $admin->id,
                'coche_id' => $coches[1]->id,
                'precio' => $coches[1]->precio,
                'nombre_cliente' => 'Cliente Externo',
                'email_cliente' => 'externo@ejemplo.com',
                'metodo_pago' => 'tarjeta'
            ]);

            Pedido::create([
                'user_id' => $user->id,
                'coche_id' => $coches[2]->id,
                'precio' => $coches[2]->precio,
                'nombre_cliente' => $user->name,
                'email_cliente' => $user->email,
                'metodo_pago' => 'cripto'
            ]);
        }
    }
}
