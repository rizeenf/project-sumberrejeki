<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Total Users')
            ->setSubtitle('2023')
            ->setHeight(300)
            ->addData('Total User', [6, 9, 3, 4, 10, 8])
            ->addData('Category Dus', [3, 2, 2, 1, 3, 3])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
