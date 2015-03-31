<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;
use Illuminate\Routing\Route;

class UpdateUserRequest extends Request {

    /**
     * @var userId
     */

    private $userId;

    public function __construct(Route $route)
    {
        $this->userId=$route->getParameter('users');
    }

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->userId,
            'password' => '',
            'type' => 'required|in:user,admin'
		];
	}

}
