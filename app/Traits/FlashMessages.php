<?php

namespace App\Traits;


/**
 * Trait FlashMessages
 * @package App\Traits
 */

trait FlashMessages
{
  //define private properties and set them in arrays
    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $infoMessages = [];

    /**
     * @var array
     */
    protected $successMessages = [];

    /**
     * @var array
     */
    protected $warningMessages = [];

/**
 * @param $message
 * @param $type
 */
 //add setter and getter functions for flash messages
protected function setFlashMessage($message, $type)
{
    $model = 'infoMessages';
//running switch statement on type and setting the right property based on type
    switch ($type) {
        case 'info': {
            $model = 'infoMessages';
        }
            break;
        case 'error': {
            $model = 'errorMessages';
        }
            break;
        case 'success': {
            $model = 'successMessages';
        }
            break;
        case 'warning': {
            $model = 'warningMessages';
        }
            break;
    }
    //checking if $message is in array format and if yes,pushing all values from the array to our array property
    if (is_array($message)) {
        foreach ($message as $key => $value)
        {
            array_push($this->$model, $value);
        }
        //if it is a single message,pushing the message to our property
    } else {
        array_push($this->$model, $message);
    }
}
/**
 * @return array
 */
protected function getFlashMessage()
{
  //return an array of all flash messages
    return [
        'error'     =>  $this->errorMessages,
        'info'      =>  $this->infoMessages,
        'success'   =>  $this->successMessages,
        'warning'   =>  $this->warningMessages,
    ];
}
/**
 * Flushing flash messages to Laravel's session
 */
protected function showFlashMessages()
{
  //set the flash messages to all types of laravel session
    session()->flash('error', $this->errorMessages);
    session()->flash('info', $this->infoMessages);
    session()->flash('success', $this->successMessages);
    session()->flash('warning', $this->warningMessages);
}
}
