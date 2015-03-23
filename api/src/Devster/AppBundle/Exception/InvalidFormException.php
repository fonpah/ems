<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 22.03.2015
 * Time: 13:48
 */

namespace Devster\AppBundle\Exception;

/**
 * Class InvalidFormException
 * @package Devster\AppBundle\Exception
 */
class InvalidFormException extends \RuntimeException
{
    /**
     * @var object
     */
    protected $form;

    /**
     * @param string $msg
     * @param null $form
     */
    public function __construct($msg, $form = null)
    {
        parent::__construct($msg);
        $this->form = $form;
    }

    /**
     * @return null
     */
    public function getForm()
    {
        return $this->form;
    }
}