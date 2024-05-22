<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\City;
use App\Models\Subject;
use App\Models\Responsable;
use App\Models\EducationLevel;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tickets = Ticket::with(['city', 'educationLevel', 'status', 'responsable', 'subject'])
                ->whereNull('deleted_at') // Filtra tickets eliminados
                ->get();
            return DataTables::of($tickets)->make();
        }

        return view('tickets.index');
    }

    public function ticketIndex()
    {
        return view('indexUser');
    }

    public function searchTicket($curp, $folio)
    {
        $ticket = Ticket::where('curp', $curp)->where('folio', $folio)->first();
        return response()->json($ticket);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    public function getAvailableTimes($date)
    {
        $times = array('07:00:00', '07:30:00', '08:00:00', '08:30:00', '09:00:00', '09:30:00', '10:00:00', '10:30:00', '11:00:00', '11:30:00', '12:00:00', '12:30:00', '13:00:00', '13:30:00', '14:00:00');
        $tickets = Ticket::where('date', 'like', $date)->pluck('time');
        foreach ($tickets as $time) {
            if (in_array(strval($time), $times)) {
                $foundIndex = array_search(strval($time), $times);
                unset($times[$foundIndex]);
                $times = array_values($times);
            }
        }
        return response()->json((array) $times);
    }

    /**
     * Store a newly created resource in storage.
     */


    // public function store(Request $request)
    // {
    //     $folio = Ticket::getFolio($request->all());
    //     $ticket = Ticket::create($request->all() + ['folio' => $folio]);
    //     return response()->json($ticket);
    // }


    public function store(Request $request)
    {
        // Validar la CURP
        $validator = Validator::make($request->all(), [
            'curp' => 'required|string|size:18',
          
        ]);

        // Si la validación falla, devuelve un mensaje de error
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        // Si la validación pasa, procede a crear el ticket
        $folio = Ticket::getFolio($request->all());
        $ticket = Ticket::create($request->all() + ['folio' => $folio]);
        return response()->json($ticket);
    }


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ticket)
    {
        $ticket = Ticket::find($ticket);
        $cities = City::whereNull('deleted_at')->get();
        $subjects = Subject::all();
        $statuses = Status::all(); 
        $responsables = Responsable::all();
        $educationLevels = EducationLevel::whereNull('deleted_at')->get();
        return view('tickets.edit', compact('ticket', 'cities', 'subjects', 'responsables', 'educationLevels', 'statuses'));
    }


    public function editTicket($ticket)
    {
        $ticket = Ticket::find($ticket);
        $cities = City::whereNull('deleted_at')->get();
        $subjects = Subject::all();
        $statuses = Status::all(); 
        $responsables = Responsable::all();
        $educationLevels = EducationLevel::whereNull('deleted_at')->get();
        return view('tickets.editTicket', compact('ticket', 'cities', 'subjects', 'responsables', 'educationLevels', 'statuses'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $ticket)
    {
        $ticket = Ticket::find($ticket);
        $ticket->update($request->all());
        return response()->json($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ticket)
    {
        Ticket::find($ticket)->delete();
        return response()->json('Ok');
    }

    public function getPDF($id)
    {
        $ticket = Ticket::with(['city', 'educationLevel', 'status', 'responsable'])
            ->find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('tickets.pdf', compact('ticket'));
        return $pdf->stream();
    }

    public function ticketIndexGraficas()
    {
        // Obtener el recuento de tickets por estado con nombres de estado
        $ticketStatusCount = Ticket::select('statuses.status')
            ->selectRaw('COUNT(*) as total')
            ->leftJoin('statuses', 'tickets.status_id', '=', 'statuses.id')
            ->groupBy('statuses.status')
            ->pluck('total', 'statuses.status')
            ->toArray();
    
        // Obtener el recuento de tickets por municipio con nombres de municipio
        $ticketCityCount = Ticket::select('cities.city')
            ->selectRaw('COUNT(*) as total')
            ->leftJoin('cities', 'tickets.city_id', '=', 'cities.id')
            ->groupBy('cities.city')
            ->pluck('total', 'cities.city')
            ->toArray();
    
        return view('index', compact('ticketStatusCount', 'ticketCityCount'));
    }
    


}
