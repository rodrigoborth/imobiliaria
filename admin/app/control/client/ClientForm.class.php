<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 12/11/17
 * Time: 21:22
 */

class ClientForm extends TStandardForm
{
  protected $form; // form

  function __construct()
  {
    parent::__construct();

    $this->form = new BootstrapFormBuilder('form_client');
    $this->form->setFormTitle( _t('Client') );

    // create the form fields
    $name = new TEntry('name');
    $cpf   = new TEntry('cpf');
    $rg   = new TEntry('rg');
    $state   = new TEntry('state');
    $city   = new TEntry('city');
    $district   = new TEntry('district');
    $street   = new TEntry('street');
    $number   = new TEntry('number');
    $complement   = new TEntry('complement');

    $this->form->addFields( [new TLabel(_t('Name'))], [$name]);
    $this->form->addFields( [new TLabel('CPF')], [$cpf]);
    $this->form->addFields( [new TLabel('RG')], [$rg]);
    $this->form->addFields( [new TLabel(_t('State'))], [$state]);
    $this->form->addFields( [new TLabel(_t('City'))], [$city]);
    $this->form->addFields( [new TLabel(_t('District'))], [$district]);
    $this->form->addFields( [new TLabel(_t('Street'))], [$street]);
    $this->form->addFields( [new TLabel(_t('Number'))], [$number]);
    $this->form->addFields( [new TLabel(_t('Complement'))], [$complement]);

    $btn = $this->form->addAction( _t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o' );
    $btn->class = 'btn btn-sm btn-primary';

    // wrap the page content using vertical box
    $vbox = new TVBox;
    $vbox->style='width:100%';
    $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
    $vbox->add($this->form);
    parent::add($vbox);
  }
  function onSave()
  {
    try
    {
      // open a transaction with database 'samples'
      TTransaction::open('sample');

      $this->form->validate(); // run form validation

      TTransaction::close();  // close the transaction

      // shows the success message
      new TMessage('info', 'Record saved');
      // reload the listing
    }
    catch (Exception $e) // in case of exception
    {
      // shows the exception error message
      new TMessage('error', $e->getMessage());
      // undo all pending operations
      TTransaction::rollback();
    }
  }
}