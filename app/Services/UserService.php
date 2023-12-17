<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserRequest $userRequest
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
        $validation = Validator::make($request->all(), $this->userRequest->storeRules(), $this->userRequest->messages());
        if ($validation->fails()) {
            return response([
                'errors' => $validation->errors(),
                'bizResult' => config('constants.common.bizResult.fail')
            ]);
        }

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
        $validation = Validator::make($request->all(), $this->userRequest->updateRules(), $this->userRequest->messages());
        if ($validation->fails()) {
            return response([
                'errors' => $validation->errors(),
                'bizResult' => config('constants.common.bizResult.fail')
            ]);
        }

        return $this->userRepository->update($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validation = Validator::make($request->all(), $this->userRequest->deleteRules(), $this->userRequest->messages());
        if ($validation->fails()) {
            return response([
                'errors' => $validation->errors(),
                'bizResult' => config('constants.common.bizResult.fail')
            ]);
        }

        return $this->userRepository->destroy($request);
    }
}