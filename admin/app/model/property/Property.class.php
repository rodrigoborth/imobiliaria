<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 11/11/17
 * Time: 14:39
 */
class Property extends TRecord
{
  const TABLENAME = 'property';
  const PRIMARYKEY= 'id';
  const IDPOLICY =  ''; // {max, serial}

  public function __construct($id = NULL)
  {
    parent::__construct($id);
    parent::addAttribute('internal_code');
    parent::addAttribute('state');
    parent::addAttribute('city');
    parent::addAttribute('district');
    parent::addAttribute('street');
    parent::addAttribute('number');
    parent::addAttribute('complement');
    parent::addAttribute('price');
    parent::addAttribute('bedroom');
    parent::addAttribute('suite');
    parent::addAttribute('bathroom');
    parent::addAttribute('parking_space');
    parent::addAttribute('goal');
    parent::addAttribute('type');
    parent::addAttribute('client_id');
  }
}