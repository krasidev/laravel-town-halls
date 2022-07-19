<?php

namespace App\Repository\Panel;

use App\Models\TownHall;
use LazyElePHPant\Repository\Repository;

class TownHallRepository extends Repository
{
    public function model()
    {
        return TownHall::class;
    }

    public function data($data)
    {
		$townHalls = $this->getModel()
			->select('town_halls.*');

        $datatable = datatables()->eloquent($townHalls);

        $datatable->addColumn('actions', function($town_hall) {
			return view('panel.town-halls.table.table-actions', compact('town_hall'));
		});

        return $datatable->make(true);
    }
}
