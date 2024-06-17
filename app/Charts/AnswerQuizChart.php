<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Result;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AnswerQuizChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalUsers = Result::with('user')->whereYear('created_at', $tahun)->whereMonth('created_at', $i)->get();
            $dataBulan[] = Carbon::create()->month($i)->locale('id')->isoFormat('MMMM');
            $totalUserLakiLaki[] = $totalUsers->where('user.gender', 'Laki-Laki')->count();
            $totalUserPerempuan[] = $totalUsers->where('user.gender', 'Perempuan')->count();
        }
        return $this->chart->lineChart()
            ->setTitle('Data Akses Latihan')
            ->setSubtitle('Total pengguna yang menjawab Latihan tahun ' . date('Y'))
            ->addData('Laki-Laki', $totalUserLakiLaki)
            ->addData('Perempuan', $totalUserPerempuan)
            ->setXAxis($dataBulan)
            ->setFontFamily('Poppins')
            ->setFontColor('#566a7f')
            ->setColors(['#696cff', '#ff6384']);
    }
}
