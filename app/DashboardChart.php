<?php
/**
 * Created by PhpStorm.
 * User: connorskipton
 * Date: 9/30/18
 * Time: 7:59 PM
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Khill\Lavacharts\Lavacharts;

class DashboardChart extends Model
{

    /**
     * @param User $user
     * @throws \Exception
     * @return array
     */
    public function getChart($user)
    {
        $lava = new Lavacharts;
        $data = $lava->DataTable();

        try {
            $data->addDateColumn('Day of Month')
                ->addNumberColumn('Goal')
                ->addNumberColumn('Actual');

            if (!empty($user[0]->target_date)) {
                $startTime = strtotime($user[0]->created_at);
                $endTime = strtotime($user[0]->target_date);

                // Loop between timestamps, 24 hours at a time
                for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                    $thisDate = date('Y-m-d', $i); // 2010-05-01, 2010-05-02, etc
                    $foods = Food::getFoodsEatenByUserPerDay($user[0]->user_id, $thisDate);
                    $caloriesEaten = $foods['calories_eaten_per_day'];
                    $data->addRow([
                        $thisDate,
                        $user[0]->calories_day,
                        $caloriesEaten,
                    ]);
                }
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
