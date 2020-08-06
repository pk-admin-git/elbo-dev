<?php

use Illuminate\Database\Seeder;
use App\customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new App\customer;
        $customer->Name = 'Siemens AG';
        $customer->SubName = 'Smart Infastructur';
        $customer->SubSubName = 'RC-DE SI RSS-DE OST PM B';
        $customer->AdressStreet = 'Nonnendammallee';
        $customer->AdressNumber = '101';
        $customer->AdressPLZ = '13629';
        $customer->AdressCity = 'Berlin';
        $customer->AdressCountry = 'Deutschland';

        $customer->save();
    }
}
