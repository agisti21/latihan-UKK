<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans=laporan::latest()->paginate(5);

        return view('laporans\index',compact('laporans'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\laporans  $laporans
     * @return \Illuminate\Http\Response
     */
    // public function show(laporan $laporan)
    // {
    //     return view('laporans.show',compact('laporans'));
    // }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';

        $laporans = laporan::whereBetween('created_at', [$startDate,$endDate])->latest()->paginate(5);
        
        return view('laporans.index', compact('laporans', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function print(Request $request)
    {

       
        $laporans = $request->transaction;
        $from = $request->startDate;
        $to = $request->endDate;

        $title ="Laporan Peminjaman From: ".$from."To:".$to;
        $redirect = route('laporan');   
        if(isset($from) && isset($to)){
            $startDate = $from;
            $endDate = $to;

            $laporans = laporan::whereBetween('created_at', [$startDate,$endDate])->latest()->paginate(5);
            $startDate = explode(' ', $startDate)[0];
            $endDate = explode(' ', $endDate)[0];

            return view('laporans.print', compact('laporans', 'startDate', 'endDate', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            $laporans = laporan::latest()->paginate(5);

            return view('laporans.print', compact('laporans', 'redirect'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
  
    }
}
