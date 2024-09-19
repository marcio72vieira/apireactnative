<?php

namespace Database\Seeders;

use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se não encontrar o registro com o nome 'Energia', crie o registro
        if(!Bill::where('name', 'Energia')->first()){
            Bill::create([
                'name' => 'Energia',
                'bill_value' => '147.52',
                'due_date' => '2024-05-23',
            ]);
        }

        if(!Bill::where('name', 'Faculdade')->first()){
            Bill::create([
                'name' => 'Faculdade',
                'bill_value' => '447.52',
                'due_date' => '2024-05-07',
            ]);
        }
    }
}
