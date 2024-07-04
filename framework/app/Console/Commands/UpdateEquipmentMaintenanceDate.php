<?php

namespace App\Console\Commands;

use App\Equipment;
use Illuminate\Console\Command;

class UpdateEquipmentMaintenanceDate extends Command
{
    protected $signature = 'equipment:update-maintenance-date';
    protected $description = 'Update the next maintenance date for all equipment.';

    public function handle()
    {
        $equipments = Equipment::all();

        foreach ($equipments as $equipment) {
            $this->updateNextMaintenanceDate($equipment->id);
        }

        $this->info('Next maintenance dates updated successfully.');
    }

    protected function updateNextMaintenanceDate($equipmentId)
    {
        $equipment = Equipment::find($equipmentId);
        $equipment->next_maintenance_date = $equipment->next_maintenance_date->addMonths(6);
        $equipment->save();
    }
}