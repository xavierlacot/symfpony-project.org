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
   * Create a pony from a POST request
   *
   * @param sfWebRequest $request 
   */
  public function executeCreate(sfWebRequest $request)
  {
    $data     = $this->getPayload($request);
    $format   = $request->getRequestFormat();
    $response = $this->getResponse();

    if (!empty($data))
    {
      $form = new PonyForm();

      // Disable this protection
      $form->disableLocalCSRFProtection();
      unset($form[$form->getCSRFFieldName()]);

      $form->bind($data);

      if ($form->isValid())
      {
        $form->save(); // Persist a new Pony
        $response->setStatusCode(201); // 201 = Created
        // It's a good practice that to add the new ressource location in headers
        $response->addHttpMeta('Location', $this->generateUrl('pony_show', array('slug' => $form->getObject()->slug, 'sf_format' => $format), true));
      }
      else
      {
        //var_dump($form->getErrorSchema()->getErrors());
        $response->setStatusCode(406); // Invalid. We should provide debug info in the response body here.
      }
    }
    else
    {
      $response->setStatusCode(400); // No payload, bad request
    }

    return sfView::NONE;
  }

  /**
   * Retrieve a single Pony from the collection
   *
   * @param sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $pony = $this->getRoute()->getObject();
    $format = $request->getRequestFormat();
    $this->getResponse()->setContentType( $request->getMimeType($format) );

    if ($pony->delete())
    {
      $this->getResponse()->setContent(
        Doctrine_Parser::dump(array('message' => 'Goodbye my little pony, hope you are in a better place now :('), $format)
      );
    }
    else
    {
      $this->getResponse()->setStatusCode(500);
      $this->getResponse()->setContent(
        Doctrine_Parser::dump(array('message' => 'You CANT kill mister PONY HAHAHAHAHA!'), $format)
      );
    }

    return sfView::NONE;
  }

  /**
   * Retrieves a  collection of Pony
   *
   * @param   sfWebRequest   $request a request object
   * @return  string
   */
  public function executeIndex(sfWebRequest $request)
  {
    $format = $request->getRequestFormat();
    $this->getResponse()->setContentType( $request->getMimeType($format) );

    try
    {
      $params = $this->validate($request->getGetParameters(), $this->getIndexValidators());
    }
    catch (Exception $e)
    {
      $this->getResponse()->setStatusCode(406);
      $this->getResponse()->setContent(
        Doctrine_Parser::dump(array('message' => $e->getMessage()), $format)
      );
      return sfView::NONE;
    }

    $this->getResponse()->setContent(
      $this->query($params)->execute()->exportTo($format)
    );

    return sfView::NONE;
  }

  /**
   * Retrieve a single Pony from the collection
   *
   * @param sfWebRequest $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $pony = $this->getRoute()->getObject();
    $format = $request->getRequestFormat();

    $this->getResponse()->setContentType( $request->getMimeType($format) );

    $this->getResponse()->setContent(
     Doctrine_Parser::dump($pony->toArray(true, true), $format)
    );

    return sfView::NONE;
  }

  /**
   * Returns the list of validators for a get request.
   *
   * @return  array  an array of validators
   */
  protected function getIndexValidators()
  {
  	$validators = array();
    $validators['id'] = new sfValidatorInteger(array('required' => false));
    $validators['name'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    return $validators;
  }

  /**
   * Build the Doctrine_Query with the params from the request
   *
   * @param array $params
   * @return Doctrine_Query
   */
  protected function query($params)
  {
    $q = Doctrine_Query::create()->from($this->model.' '.$this->model);

    foreach ($params as $name => $value)
    {
      $q->andWhere($this->model.'.'.$name.' = ?', $value);
    }

    return $q;
  }

  /**
   * Applies a set of validators to an array of parameters
   *
   * @param array   $params      An array of parameters
   * @param array   $validators  An array of validators
   * @throw sfException
   */
  protected function validate($params, $validators, $prefix = '')
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

  protected function getPayload($request)
  {
    $payload = $request->getContent();
    $format  = $request->getRequestFormat();
    $data    = '';
    
    if (!empty($payload))
    {
      if ($format == 'json')
      {
        $data = (array) json_decode($payload);
      }
      elseif ($format == 'xml')
      {
        $parser = Doctrine_Parser::getParser($format);
        $data = $parser->prepareData( simplexml_load_string($payload) );
      }
      elseif ($format == 'yml')
      {
        $data = sfYaml::load($payload);
      }
      else
      {
        throw new sfException("This format of pony isn't supported yet.");
      }
    }

    return $data;
  }
}
