<?php


namespace App\Repositories;


use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\User;
use Illuminate\Http\Request;

class UserRepository implements BaseRepositoryInterface
{
    /**
     * @param $request
     */
    public function store($request)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = new User();
        $user->fill($inputs);
        $user->save();
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update($request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->update($request->all());
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
    }
}
