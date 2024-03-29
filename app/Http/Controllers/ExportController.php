<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;

class ExportController extends Controller
{
    public function reportPDF($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $data = [];
        if($reportType == 0)
        {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d'). ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        }
        else
        {
            $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d') . ' 23:59:59';
        }
        if($userId == 0)
        {
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'u.name as user')
                ->whereBetween('sales.created_at', [$from, $to])
                ->get();
        }
        else
        {
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'u.name as user')
                ->whereBetween('sales.created_at', [$from, $to])
                ->where('user_id', $userId)
                ->get();
        }
        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        $pdf = Pdf::loadView('pdf.reporte', compact('data', 'reportType', 'user', 'dateFrom', 'dateTo'));
        return $pdf->stream('salesReport.pdf');
    }

    public function reportExcel($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $reportName = 'Reporte de Ventas_' . uniqid() . '.xlsx';
        return Excel::download(new SalesExport($userId, $reportType, $dateFrom, $dateTo), $reportName);
    }
}