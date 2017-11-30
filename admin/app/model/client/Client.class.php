<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 11/11/17
 * Time: 14:56
 */

class Client extends TRecord
{
  const TABLENAME = 'client';
  const PRIMARYKEY= 'id';
  const IDPOLICY =  ''; // {max, serial}

  public function __construct($id = NULL)
  {
    parent::__construct($id);
    parent::addAttribute('name');
    parent::addAttribute('cpf');
    parent::addAttribute('rg');
    parent::addAttribute('contact');
    parent::addAttribute('email');
    parent::addAttribute('state');
    parent::addAttribute('city');
    parent::addAttribute('district');
    parent::addAttribute('street');
    parent::addAttribute('number');
    parent::addAttribute('complement');
  }
}