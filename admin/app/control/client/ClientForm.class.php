<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 12/11/17
 * Time: 21:22
 */

class ClientForm extends TPage
{
  protected $form; // form

  function __construct()
  {
    parent::__construct();
    TPage::include_js('app/lib/jquery/jquery.mask.min.js');

    $this->form = new BootstrapFormBuilder('form_client');
    $this->form->setFormTitle( _t('Client') );

    // create the form fields
    $name = new TEntry('name');
    $cpf   = new TEntry('cpf');
    $rg   = new TEntry('rg');
    $email   = new TEntry('email');
    $state   = new TCombo('state');
    $city   = new TEntry('city');
    $district   = new TEntry('district');
    $street   = new TEntry('street');
    $number   = new TEntry('number');
    $complement   = new TEntry('complement');
    //Set state array list
    $stateList = array(
      'AC'=>'Acre',
      'AL'=>'Alagoas',
      'AP'=>'Amapá',
      'AM'=>'Amazonas',
      'BA'=>'Bahia',
      'CE'=>'Ceará',
      'DF'=>'Distrito Federal',
      'ES'=>'Espírito Santo',
      'GO'=>'Goiás',
      'MA'=>'Maranhão',
      'MT'=>'Mato Grosso',
      'MS'=>'Mato Grosso do Sul',
      'MG'=>'Minas Gerais',
      'PA'=>'Pará',
      'PB'=>'Paraíba',
      'PR'=>'Paraná',
      'PE'=>'Pernambuco',
      'PI'=>'Piauí',
      'RJ'=>'Rio de Janeiro',
      'RN'=>'Rio Grande do Norte',
      'RS'=>'Rio Grande do Sul',
      'RO'=>'Rondônia',
      'RR'=>'Roraima',
      'SC'=>'Santa Catarina',
      'SP'=>'São Paulo',
      'SE'=>'Sergipe',
      'TO'=>'Tocantins'
    );
    $state->addItems($stateList);

    //add mask script
    $cpf->id='cpf';
    $script =new TElement('script');
    $script->type = 'text/javascript';
    $script->add('$(\'#cpf\').mask(\'000.000.000-00\', {placeholder: "___.___.___-__"});');

    //Add form fields
    $this->form->addFields( [new TLabel(_t('Name'))], [$name]);
    $this->form->addFields( [new TLabel('CPF')], [$cpf]);
    $this->form->addFields( [new TLabel('RG')], [$rg]);
    $this->form->addFields( [new TLabel('E-mail')], [$email]);
    $this->form->addFields( [new TLabel(_t('State'))], [$state]);
    $this->form->addFields( [new TLabel(_t('City'))], [$city]);
    $this->form->addFields( [new TLabel(_t('District'))], [$district]);
    $this->form->addFields( [new TLabel(_t('Street'))], [$street]);
    $this->form->addFields( [new TLabel(_t('Number'))], [$number]);
    $this->form->addFields( [new TLabel(_t('Complement'))], [$complement]);
    //Add form validation
    $cpf->addValidation('cpf', new TCPFValidator);

    $btn = $this->form->addAction( _t('Save'), new TAction(array($this, 'onSave')), 'fa:floppy-o' );
    $btn->class = 'btn btn-sm btn-primary';
    $this->form->addAction( _t('Clear'), new TAction(array($this, 'onEdit')),  'fa:eraser red' );

    // wrap the page content using vertical box
    $vbox = new TVBox;
    $vbox->style='width:100%';
    $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
    $vbox->add($this->form);
    $vbox->add($script);
    parent::add($vbox);
  }
  function onSave()
  {
    try
    {
      // open a transaction with database 'sample'
      TTransaction::open('sample');

      $this->form->validate(); // run form validation
      $object = $this->form->getData('Client');    // get the form data into an City Active Record
      $object->store();                          // stores the object

      // fill the form with the active record data
      $this->form->setData($object);

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

  /**
   * Clear form
   */
  public function onClear()
  {
    $this->form->clear();
  }

  /**
   * method onEdit()
   * Executed whenever the user clicks at the edit button da datagrid
   */
  function onEdit($param)
  {
    try
    {
      if (isset($param['id']))
      {
        // get the parameter $key
        $key = $param['id'];

        TTransaction::open('sample');   // open a transaction with database 'samples'
        $object = new Client($key);        // instantiates object City
        $this->form->setData($object);   // fill the form with the active record data
        TTransaction::close();           // close the transaction
      }
      else
      {
        $this->form->clear();
      }
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