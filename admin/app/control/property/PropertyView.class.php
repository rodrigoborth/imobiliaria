<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 25/11/17
 * Time: 16:51
 */
class PropertyView extends TPage
{
  private $data;
  protected $step; // step

  /**
   * Class constructor
   * Creates the page
   */
  function __construct()
  {
    parent::__construct();

    $table = new TTable;
    // add the table inside the page
    $this->data = $table;

    $panel = new TPanelGroup;
    $panel->add($this->data);
    //link
    $link = new TElement('a');
    $link->generator = 'adianti';
    $link->href = 'index.php?class=ClientList';
    $link->class = 'btn btn-default';
    //Glyphicon
    $glyph = new TElement('i');
    $glyph->class = 'fa fa-arrow-circle-o-left blue';
    $link->add($glyph);
    $link->add(_t('Back'));

    $panel->addFooter($link);
    //Add breadcrumb
    $this->step = new TBreadCrumb;
    $this->step->addItem('<a class="bread" generator="adianti" href="engine.php" title="" data-original-title="Home"><span>h</span></a>', FALSE);
    $this->step->addItem(_t('Client'), FALSE);
    $this->step->addItem(_t('View'), TRUE);

    $vbox = new TVBox;
    $vbox->add($this->step);
    $vbox->add($panel);
    parent::add($vbox);
  }

  /**
   * Simulates an save button
   * Show the form content
   */
  public function onView($param)
  {
    $id = $param['id'];
    try
    {
      TTransaction::open('sample');

      // load customer, throw exception if not found
      $customer = new Client($id);

      TTransaction::close();
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
      //get table
      $table = $this->data;
      //Add content
      if($customer->name)
        $table->addRowSet(_t('Name').':', $customer->name);
      if($customer->cpf)
        $table->addRowSet('CPF'.':', $customer->cpf);
      if($customer->rg)
      $table->addRowSet('RG'.':', $customer->rg);
      if($customer->contact)
        $table->addRowSet(_t('Contact').':', $customer->contact);
      if($customer->email)
        $table->addRowSet('E-mail'.':', $customer->email);
      if($customer->state)
        $table->addRowSet(_t('State').':', $stateList[$customer->state]);
      if($customer->city)
        $table->addRowSet(_t('City').':', $customer->city);
      if($customer->district)
        $table->addRowSet(_t('District').':', $customer->district);
      if($customer->street)
        $table->addRowSet(_t('Street').':', $customer->street);
      if($customer->number)
        $table->addRowSet(_t('Number').':', $customer->number);
      if($customer->complement)
        $table->addRowSet(_t('Complement').':', $customer->complement);
    }
    catch (Exception $e)
    {
      new TMessage('error', $e->getMessage());
    }
  }
}