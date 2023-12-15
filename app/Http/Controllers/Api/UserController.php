<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->userService->index();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return $this->userService->store($request);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try {
            return $this->userService->show($id);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            return $this->userService->update($request);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            return $this->userService->destroy($request);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
