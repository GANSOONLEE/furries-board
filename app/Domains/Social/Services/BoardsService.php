<?php

namespace App\Domains\Social\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Domains\Social\Models\Board;
use App\Services\BaseService;

/**
 * Class BoardsService.
 *
 * @extends BaseService
 */
class BoardsService extends BaseService
{

    /**
     * BoardsService constructor.
     *
     * @param Board $boards
     */
    public function __construct(Board $boards)
    {
        $this->model = $boards;
    }

    /**
     * @param array $data
     * 
     * @return Board
     * @throws Exception
     * @throws \Throwable
     */
    public function storeBoard(array $data = []): Board
    {
        DB::beginTransaction();

        try {
            $board = $this->model::create([
                'author_id' => $data['author_id'],
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('');
        }

        DB::commit();
        return $board;
    }

    /**
     * @param array $data
     * 
     * @return Board
     * @throws Exception
     * @throws \Throwable
     */
    public function updateBoard(array $data = []): Board
    {
        DB::beginTransaction();

        $board = $this->model::find($data['id']);

        try {
            $board->update([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('');
        }

        DB::commit();
        return $board;
    }

    /**
     * @param array $data
     * 
     * @throws Exception
     * @throws \Throwable
     */
    public function deleteBoard(array $data = [])
    {
        DB::beginTransaction();

        try {
            $this->model::find($data['id'])->delete();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('');
        }

        DB::commit();
    }

}