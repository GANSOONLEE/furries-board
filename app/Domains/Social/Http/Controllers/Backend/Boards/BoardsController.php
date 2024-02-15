<?php

namespace App\Domains\Social\Http\Controllers\Backend\Boards;

use App\Domains\Social\Models\Boards;
use App\Domains\Social\Services\BoardsService;
use App\Http\Controllers\Controller;

use Inertia\Inertia;

// Request
use App\Domains\Social\Requests\Boards\StoreBoardsRequest;
use App\Domains\Social\Requests\Boards\UpdateBoardsRequest;
use App\Domains\Social\Requests\Boards\DeleteBoardsRequest;

/**
 * Class BoardsController.
 */
class BoardsController extends Controller
{

    /**
     * @var BoardsService
     */
    protected $boardsService;

    /**
     * BoardsController constructor.
     *
     * @param BoardsService $boardsService
     */
    public function __construct(BoardsService $boardsService)
    {
        $this->boardsService = $boardsService;
    }

    /**
     * the view create board
     */
    public function create()
    {
        return Inertia::render('');
    }

    /**
     * post the create board request
     * @param StoreBoardsRequest $request
     */
    public function store(StoreBoardsRequest $request)
    {
        $this->boardsService->storeBoard($request->validated());
    }

    /**
     * the view edit board
     */
    public function edit()
    {
        return Inertia::render('');
    }

    /**
     * patch the edit board request
     * @param UpdateBoardsRequest $request
     */
    public function update(UpdateBoardsRequest $request)
    {
        $this->boardsService->updateBoard($request->validated());
    }

    /**
     * delete board request
     * @param DeleteBoardsRequest $request
     */
    public function delete(DeleteBoardsRequest $request)
    {
        $this->boardsService->deleteBoard($request->validated());
    }

}