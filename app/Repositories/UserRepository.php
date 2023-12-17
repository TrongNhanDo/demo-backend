<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function __construct(
        private User $userModel
    ) {
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userModel->get();
        return response([
            'returnCnt' => count($users),
            'users' => $users,
            'bizResult' => '0'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $isDuplicate = $this->userModel->where("email", $request->email)->exists();
        if ($isDuplicate) {
            return response([
                'errors' => [[
                    'message' => 'User has existed'
                ]],
                'bizResult' => '8'
            ]);

        }

        $rs = $this->userModel->create($request->all());
        if ($rs) {
            return response([
                'errors' => [],
                'bizResult' => '0'
            ]);
        }

        return response([
            'errors' => [[
                'message' => 'Update user fail'
            ]],
            'bizResult' => '8'
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = $this->userModel->find($id);
        if ($user) {
            return response([
                'user' => $user
            ]);
        }

        return response([
            'errors' => [[
                'message' => 'User not found'
            ]],
            'bizResult' => '8'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = $this->userModel->where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        if ($result) {
            return response([
                'errors' => [],
                'bizResult' => '0'
            ]);
        }

        return response([
            'errors' => [[
                'message' => 'User not found'
            ]],
            'bizResult' => '8'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rs = $this->userModel->where('id', $request->id)->delete();
        if ($rs) {
            return response([
                'errors' => [],
                'bizResult' => '0'
            ]);
        }

        return response([
            'errors' => [[
                'message' => 'User not found'
            ]],
            'bizResult' => '8'
        ]);
    }
}