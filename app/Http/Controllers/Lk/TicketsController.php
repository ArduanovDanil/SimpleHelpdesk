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
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Exception;
use Spatie\QueryBuilder\QueryBuilder;

class TicketsController extends Controller
{
    private const DEFAULT_PER_PAGE_COUNT = 15;

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $per_page = request()->input('per_page', self::DEFAULT_PER_PAGE_COUNT);

        $tickets = QueryBuilder::for(Ticket::class)
            ->allowedFilters(['title', 'message'])
            ->allowedSorts(['title', 'message'])
            ->paginate($per_page);

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
