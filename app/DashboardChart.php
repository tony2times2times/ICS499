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

    const CHARTLENGTH = "10";

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
                ->addNumberColumn('Goal')
                ->addNumberColumn('Actual');

            //TODO implement when finishing charts
            // Set timezone
            //date_default_timezone_set('UTC');
            //
            //// Start date
            //$date = date("c", time());
            //// End date
            //$endDate = date("Y-m-d", strtotime("+" . \self::CHARTLENGTH . " day", strtotime($date)));
            //
            //while (strtotime($date) <= strtotime($endDate)) {
            //
            //
            //
            //    $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            //
            //    $foods = FoodEaten::getFoodsEatenPerDay($date);
            //}

            // Random Data
            for ($a = 1; $a < 30; $a++) {
                $rowData = [
                    "2017-4-$a",
                    rand(800, 1000),
                    rand(800, 1000),
                ];

                $data->addRow($rowData);
            }

            $lava->LineChart('Calories', $data, [
                'title' => 'Calories Burned',
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
