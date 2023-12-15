<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userRepository->index();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->userRepository->store($request);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $this->userRepository->show($id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->userRepository->update($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->userRepository->destroy($request);
    }
}