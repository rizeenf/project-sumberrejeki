<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalVisitor
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Total Visitor')
            ->setSubtitle('2023')
            ->setHeight(300)
            ->addData('Total Visitor', [36, 29, 13, 34, 50, 38])
            ->addData('Category Dus', [53, 42, 42, 21, 13, 33])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
