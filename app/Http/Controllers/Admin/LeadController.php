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
use App\State;
use App\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Chart\Title;

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

        if (auth()->user()->roles()->first()->id == 2) {
            // rechercher par tenant_id
            $lead = Lead::where('tenant_id', auth()->user()->id)->get();
        } else {
            $lead = Lead::where('user_id', auth()->user()->id)->get();
            // rechercher par user_id
        }

        if ($request->ajax()) {

            /*
                $lead = Lead::query()->select(sprintf('%s.*', (new Lead)->getTable()))
                    ->with('user')
                    ->when($request->input('user_id'), function ($lead) use ($request) {
                        $lead->where('user_id', $request->input('user_id'));
                    });
                */
            /*
            $lead = Lead::query()->select(sprintf('%s.*', (new Lead)->getTable()))
                ->with('states')
                ->when($request->input('state_id'), function ($lead) use ($request) {
                    $lead->where('state_id', $request->input('state_id'));
                });
            */
            $table = DataTables::of($lead);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $crudRoutePart    = 'leads';
                $permissionPrefix = 'lead_management_';
                return view('partials.datatableActions', compact('crudRoutePart', 'row', 'permissionPrefix'));
            });

            //Afficher les colonnes avec les id,asset,text et actions
            $table->editColumn('id', function ($row) { return $row->id ? $row->id : ""; });
            $table->editColumn('asset', function ($row) { return $row->asset ? $row->asset->name : ""; });
            $table->editColumn('text', function ($row) { return $row->text ? Str::limit($row->text, 50) : ""; });
            $table->rawColumns(['actions']);

            return $table->make(true);
        }


        //states = State::all()->whereIn('id', $lead)->pluck("title", "id");
        //dd($states);
        return view('admin.leads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*code to get out */
         abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd(auth()->user()->id);

        if (auth()->user()->roles()->first()->id == 2) {
            // rechercher par tenant_id
        $users = \App\User::where('tenant_id', auth()->user()->id)->get()->pluck('name', 'id');;
        } else {
        $users = \App\User::where('id', auth()->user()->id)->get()->pluck('name', 'id');;
            // rechercher par user_id
        }

        //$users = \App\User::where('tenant_id', auth()->user()->id)->get()->pluck('name', 'id');;
        //$users = \App\User::pluck('name', 'id');;

        // $states = State::all()->pluck('title');
        //$states = \App\State::where('state_id', auth()->user()->id)->get()->pluck('title', 'id');;
        $states = State::pluck('title', 'id');

        //$x = State::all();
        //$lead = Lead::where('user_id', auth()->user()->id)->get();

        //dd($x);
        return view('admin.leads.create', compact('users', 'states'));
    }


    public function todo()
    {

        /*code to get out */
        //abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd(auth()->user()->id);

        //Afficher une liste avec des leads à faire ou Entrant !

        return view('admin.leads.todo');
    }



    public function waiting()
    {

        /*code to get out */
        abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd(auth()->user()->id);

        //Afficher une liste avec les leads en atente!

        return view('admin.leads.waiting', compact('users', 'states'));
    }


    public function do()
    {

        /*code to get out */
        abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd(auth()->user()->id);

        //Afficher une liste avec leads déjà fait !
        return view('admin.leads.do', compact('users', 'states'));
    }


    public function lost()
    {

        /*code to get out */
        abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd(auth()->user()->id);

        //Afficher la liste avec les leads classé comme perdu

        return view('admin.leads.lost', compact('users', 'states'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
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
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10',
            'description' => 'required|string|max:255',

        ]);

        $lead = Lead::create([
            'client' => $request->input('client'),
            'company' => $request->input('company'),
            'coast' => $request->input('coast'),
            'origin' => $request->input('origin'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
            'user_id'=> $request->input('tenant_id'),
            'state_id' => $request->input('state_id')

        ]);


        return redirect()->route('admin.leads.index', $lead)->withMessage('Le prospect a été crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        // dd($lead);
        abort_if(Gate::denies('lead_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10',
            'description' => 'required|string|max:255',


        ]);

        $lead = Lead::find($id);
        $lead->update([
            'client' => $request->client,
            'company' => $request->company,
            'coast' => $request->coast,
            'origin' => $request->origin,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'state_id' => $request->state_id
        ]);
        return redirect()->route('admin.leads.index')->withMessage('Le prospect a été mis à jour');

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

        return redirect()->back()->withMessage('Le prospect a été supprimé avec succès');
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

        return redirect()->back()->withMessage('Le prospect a été importé avec succès');
    }
}
