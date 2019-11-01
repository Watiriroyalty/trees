<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;
class BaseController extends Controller
{
  //add flashmessages trait
    use FlashMessages;
    /**
     * @var null
     */
     //define a new property and set it to null
    protected $data = null;

/**
 * @param $title
 * @param $subTitle
 */
 //protected method to set the page tittle and subtitle
protected function setPageTitle($title, $subTitle)
{
  //using the view() helper function to attach the two parameters using the share method
    view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
}

/**
 * @param int $errorCode
 * @param null $message
 * @return \Illuminate\Http\Response
 */
 //function to show error page with custom message and type of error page we want to load
protected function showErrorPage($errorCode = 404, $message = null)
{
    $data['message'] = $message;
    //loading error view from errors folder based on error type, default=404 and passing custom message to it using the data property
    return response()->view('errors.'.$errorCode, $data, $errorCode);
}
/**
 * @param bool $error
 * @param int $responseCode
 * @param array $message
 * @param null $data
 * @return \Illuminate\Http\JsonResponse
 */
 //sending json response
protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
{
    return response()->json([
        'error'         =>  $error,
        'response_code' => $responseCode,
        'message'       => $message,
        'data'          =>  $data
    ]);
}

 /**
 * @param $route
 * @param $message
 * @param string $type
 * @param bool $error
 * @param bool $withOldInputWhenError
 * @return \Illuminate\Http\RedirectResponse
 */
 // redirect to a page/route if the request is HTTP
protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
{
  //Set flash message using the setFlashMessage function provided by the flash messages trait
    $this->setFlashMessage($message, $type);
    //show messages
    $this->showFlashMessages();
    //return back if there is error with input
    if ($error && $withOldInputWhenError) {
        return redirect()->back()->withInput();
    }
      //if no error, then return to the route
    return redirect()->route($route);
}

/**
 * @param $message
 * @param string $type
 * @param bool $error
 * @param bool $withOldInputWhenError
 * @return \Illuminate\Http\RedirectResponse
 */
 //in cases where we might want to redirect the user to the previous page
protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
{
  //setting flashmessages then returning back
    $this->setFlashMessage($message, $type);
    $this->showFlashMessages();

    return redirect()->back();
}
}
