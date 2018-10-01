<?php
/**
 * Created by PhpStorm.
 * User: connorskipton
 * Date: 9/30/18
 * Time: 7:59 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Khill\Lavacharts\Lavacharts;

class DashboardChart extends Model
{

    /**
     * @throws \Exception
     * @return array
     */
    public function getChart()
    {
        $lava = new Lavacharts;
        $data = $lava->DataTable();

        try {
            $data->addDateColumn('Day of Month')
                ->addNumberColumn('Projected')
                ->addNumberColumn('Official');

            // Random Data
            for ($a = 1; $a < 30; $a++) {
                $rowData = [
                    "2017-4-$a",
                    rand(800, 1000),
                    rand(800, 1000),
                ];

                $data->addRow($rowData);
            }

            $lava->LineChart('Stocks', $data, [
                'title' => 'Stock Market Trends',
                'animation' => [
                    'startup' => TRUE,
                    'easing' => 'inAndOut',
                ],
                'colors' => ['blue', '#F4C1D8'],
            ]);

        } catch (\Exception $exception) {
            return compact('exception');
        }

        return compact('lava');
    }
}
