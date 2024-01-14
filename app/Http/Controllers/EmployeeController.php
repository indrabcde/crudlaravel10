<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Illuminate\Support\Facades\Session;
use App\Models\Religion;

class EmployeeController extends Controller
{
    public function index(){

            
            $data = Employee::paginate(5);
            
            Session::put('halaman_url', request()->fullUrl());

            return view('datapegawai', compact('data'));
    
    }

    public function tambahpegawai(){
        $dataagama = Religion::all();
        return view('tambahdata', compact('dataagama'));
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();

        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id){
        $data = Employee::find($id);
        //dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success','Data Berhasil Diubah');
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Diubah');

    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Dihapus');

    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('datapegawai.pdf');
    }

    public function exportexcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);

        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));
        return \redirect()->back();

    }
}
