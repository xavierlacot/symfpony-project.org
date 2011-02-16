<?php

/**
 * pony actions.
 * Provide a REST not-ful way of dealing with ponies.
 * 
 * @package    symfpony
 * @subpackage pony
 * @author     Paellas
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ponyActions extends sfActions
{
  public $model = 'Pony';
  
  /**
   * Retrieves a  collection of Layout objects
   * @param   sfWebRequest   $request a request object
   * @return  string
   */
  public function executeIndex(sfWebRequest $request)
  {
    try
    {
      $params = $this->validate($request->getGetParameters(), $this->getIndexValidators());
    }
    catch (Exception $e)
    {
      $this->getResponse()->setStatusCode(406);
      $this->getResponse()->setContent('todo');
      return sfView::NONE;
    }

    
    var_dump( $this->query($params)->execute() );
  }

  /**
   * Returns the list of validators for a get request.
   * @return  array  an array of validators
   */
  public function getIndexValidators()
  {
  	$validators = array();
    $validators['id'] = new sfValidatorInteger(array('required' => false));
    $validators['name'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    
    return $validators;
  }

  /**
   * Applies a set of validators to an array of parameters
   *
   * @param array   $params      An array of parameters
   * @param array   $validators  An array of validators
   * @throw sfException
   */
  public function validate($params, $validators, $prefix = '')
  {
    $clean_params = array();

    foreach ($params as $name => $value)
    {
      if (!isset($validators[$name]))
      {
        throw new sfException(sprintf('Could not validate extra field "%s"', $prefix.$name));
      }
      else
      {
        $clean_params[$name] = $validators[$name]->clean($value);
      }
    }
    return $clean_params;
  }

  /**
   * Build the Doctrine_Query with the params from the request
   * @param array $params
   * @return Doctrine_Query
   */
  public function query($params)
  {
    $q = Doctrine_Query::create()->from($this->model.' '.$this->model);

    foreach ($params as $name => $value)
    {
      $q->andWhere($this->model.'.'.$name.' = ?', $value);
    }
    
    return $q;
  }
}
