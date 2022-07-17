<?php

namespace App\Http\Controllers\Lk;

use App\Actions\Lk\Ticket\CreateTicketAction;
use App\Actions\Lk\Ticket\UpdateTicketAction;
use App\Exceptions\ApiErrorException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lk\Tickets\CreateTicketRequest;
use App\Http\Requests\Lk\Tickets\UpdateTicketRequest;
use App\Http\Resources\Lk\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Exception;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $tickets = Ticket::all();
        return TicketResource::collection($tickets);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTicketRequest  $request
     * @return TicketResource
     */
    public function store(CreateTicketRequest $request): TicketResource
    {
        $requestData = $request->validated();

        $ticket = app(CreateTicketAction::class)->handle($requestData);

        return new TicketResource($ticket);

    }

    /**
     * Display the specified resource.
     *
     * @param  Ticket $ticket
     * @return TicketResource
     */
    public function show(Ticket $ticket): TicketResource
    {
        return new TicketResource($ticket);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTicketRequest $request
     * @param Ticket $ticket
     * @return TicketResource
     * @throws ApiErrorException|Exception
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket): TicketResource
    {

        $requestData = $request->validated();
        $ticket = app(UpdateTicketAction::class)->handle($requestData, $ticket);

        return new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {

        $ticket->delete();
        return response()->noContent();

    }
}
