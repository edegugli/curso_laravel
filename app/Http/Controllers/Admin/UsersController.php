<?php namespace Course\Http\Controllers\Admin;

use Course\Http\Requests;
use Course\Http\Controllers\Controller;

use Course\Http\Requests\CreateUserRequest;
use Course\Http\Requests\UpdateUserRequest;
use Course\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('@findUser', ['only'=>['show','edit','update', 'destroy']]);
    }

    public function findUser(Route $route)
    {
        $this->user = User::findOrFail($route->getParameter('users'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users=User::paginate();

        return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{

        $user= User::create($request->all());
        return \Redirect::route('admin.users.index');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return view('admin.users.edit')->with('user',$this->user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UpdateUserRequest $request)
	{
		$this->user->fill($request->all());
        $this->user->save();

        return \Redirect::route('admin.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,Request $request)
	{
        $message='El usuario '.$this->user->fullName.' fué eliminado';

        $this->user->delete();

        if($request->ajax()){
            return response()->json([
                'id'      => $this->user->id,
                'message' => $message
            ]);
        }
        else{
            Session::flash('message',$message);
            return \Redirect::route('admin.users.index');
        }

	}

}
