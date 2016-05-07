<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;

class BaseController extends Controller {
	private $statusCode = 200;

    // Set the status code
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

    // Return the response status code
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    // Construct the entire response and return it
    public function makeResponse($message, $data = null)
    {
        return Response::json([
            'status_code' => $this->getStatusCode(),
            'message' => $message,
            'data' => $data
        ], $this->getStatusCode());
    }

    // Setup the layout used by the controller.
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
