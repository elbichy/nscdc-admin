<?php

namespace App\Http\Controllers;

use App\Redeployment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Alert;


class RedeploymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    

    public function index()
    {
        return view('redeployments');
    }

    public function redeployments(){
        $redeployments = Redeployment::orderBy('created_at', 'DESC')->get();
        return DataTables::of($redeployments)
                ->editColumn('created_at', function ($redeployment) {
                    return $redeployment->created_at->toFormattedDateString();
                })
                ->addColumn('view', function($redeployment) {
                    return '
                        <a href="/redeployment/'.$redeployment->id.'/edit" style="margin-right:10px;" class="blue-text"><i class="small material-icons">edit</i></a>
                        <a href="/redeployment/'.$redeployment->id.'/download" class="green-text"><i class="small material-icons">cloud_download</i></a>
                    ';
                })
                ->rawColumns(['view'])
                ->make();
    }

    
    
    public function create()
    {
        return view('create');
    }

    
    
    public function store(Request $request)
    {
        $validation = $request->validate([
            'type' => 'required',
            'fullname' => 'required',
            'service_number' => 'required',
            'file_number' => 'required',
            'rank' => 'required',
            'from' => 'required',
            'to' => 'required',
            'date' => 'required'
        ]);
        
        $ref_number = Str::random(12);
        $insert = Redeployment::create([
            'type' => $request->type,
            'fullname' => $request->fullname,
            'service_number' => $request->service_number,
            'file_number' => $request->file_number,
            'ref_number' => $ref_number,
            'rank' => $request->rank,
            'from' => $request->from,
            'to' => $request->to,
            'created_at' => Carbon::create($request->date),
        ]);

        if($insert){
            Alert::success('Redeployment created successfully!', 'Success!')->autoclose(3500);
            return redirect()->route('dashboard');
        }
    }

    
    
    public function show(Redeployment $redeployment)
    {
        //
    }

    
    
    public function edit(Redeployment $redeployment)
    {
        return view('edit', compact('redeployment', $redeployment));
    }

    
    
    public function update(Request $request, Redeployment $redeployment)
    {
        $validation = $request->validate([
            'type' => 'required',
            'fullname' => 'required',
            'service_number' => 'required',
            'file_number' => 'required',
            'rank' => 'required',
            'from' => 'required',
            'to' => 'required',
            'date' => 'required'
        ]);

        $redeployment->update([
            'type' => $request->type,
            'fullname' => $request->fullname,
            'service_number' => $request->service_number,
            'file_number' => $request->file_number,
            'rank' => $request->rank,
            'from' => $request->from,
            'to' => $request->to,
            'updated_at' => Carbon::create($request->date),
        ]);
        Alert::success('Redeployment updated successfully!', 'Success!')->autoclose(3500);
        return redirect()->route('redeployment_all');
    }

    
    
    public function destroy(Redeployment $redeployment)
    {
        $redeployment->delete();
        Alert::success('Redeployment deleted successfully!', 'Success!')->autoclose(3500);
        return redirect()->route('redeployment_all');
    }

    public function download(Redeployment $redeployment){
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(resource_path('docs/template.docx'));
        $templateProcessor->setValue('svcNo', $redeployment->service_number);
        $templateProcessor->setValue('date', Carbon::parse($redeployment->created_at)->format('jS F, Y'));
        $templateProcessor->setValue('fullname', strtoupper($redeployment->fullname));
        $templateProcessor->setValue('rank', $redeployment->rank);
        $templateProcessor->setValue('title', $redeployment->type == 'internal' ? strtoupper($redeployment->type).' REDEPLOYMENT' : 'REDEPLOYMENT');
        $templateProcessor->setValue('from', $redeployment->from);
        $templateProcessor->setValue('to', $redeployment->to);
        $templateProcessor->saveAs(storage_path('app/docs/'.$redeployment->fullname.'.docx'));
        return response()->download(storage_path('app/docs/'.$redeployment->fullname.'.docx'));
    }
}
