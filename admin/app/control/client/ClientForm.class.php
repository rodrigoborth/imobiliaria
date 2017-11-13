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
    $state   = new TCombo('state');
    $city   = new TEntry('city');
    $district   = new TEntry('district');
    $street   = new TEntry('street');
    $number   = new TEntry('number');
    $complement   = new TEntry('complement');

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
}