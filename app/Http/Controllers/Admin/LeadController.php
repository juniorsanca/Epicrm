<?php

namespace App\Http\Controllers\Admin;

//use App\User;
use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;
use Maatwebsite\Excel\Facades\Excel;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('lead_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lead::query()
                ->select(sprintf('%s.*', (new Lead)->getTable()))
                ->with('tenant')
                ->when($request->input('tenant_id'), function ($query) use ($request) {
                    $query->where('tenant_id', $request->input('tenant_id'));
                });
            $table = DataTables::of($query);

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $crudRoutePart    = 'leads';
                $permissionPrefix = 'lead_management_';

                return view('partials.datatableActions', compact('crudRoutePart', 'row', 'permissionPrefix'));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('asset', function ($row) {
                return $row->asset ? $row->asset->name : "";
            });
            $table->editColumn('text', function ($row) {
                return $row->text ? Str::limit($row->text, 50) : "";
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        return view('admin.leads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('note_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$assets = Asset::all()->pluck('name', 'id');

        return view('admin.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'client' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'coast' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10',
            'description' => 'required|string|max:255',


        ]);

        $lead = Lead::create([
            'client' => $request->input('client'),
            'company' => $request->input('company'),
            'coast' => $request->input('coast'),
            'origin' => $request->input('origin'),
            'state' => $request->input('state'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('admin.leads.index', $lead)->withMessage('Lead has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
        return view('admin.leads.show', compact('lead'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
        abort_if(Gate::denies('lead_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'client' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'coast' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10',
            'description' => 'required|string|max:255',


        ]);

        $lead = Lead::find($id);
        $lead->update([
            'date' => $request->date,
            'client' => $request->client,
            'company' => $request->company,
            'coast' => $request->coast,
            'origin' => $request->origin,
            'state' => $request->state,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.leads.index')->withMessage('Lead has been edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
        abort_if(Gate::denies('lead_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->delete();

        return redirect()->back()->withMessage('Lead has been deleted successfully');
    }

    public function export()
    {
        abort_if(Gate::denies('lead_management_export'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return Excel::download(new LeadsExport, 'leads.xlsx');

    }

    public function import(Request $request)
    {
        abort_if(Gate::denies('lead_management_import'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$aze = Lead::all();
        Excel::import(new LeadsImport, $request->file('import_file'));

        /*
        dd($aze);
        die();
        */
        //Excel::import(new LeadsImport, 'leads.xlsx');

        return redirect()->back()->withMessage( 'Lead has been added successfully');
    }
}