<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 23/11/17
 * Time: 20:54
 */
class PropertyList extends TPage
{
  private $datagrid;
  private $step;

  public function __construct()
  {
    parent::__construct();

    $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
    // create the datagrid columns
    $id         = new TDataGridColumn('id',      'ID',               'center', '10%');
    $name       = new TDataGridColumn('name',    _t('Name'),    'left',   '20%');
    $city       = new TDataGridColumn('city',    _t('City'),    'left',   '20%');
    $email      = new TDataGridColumn('email',   'E-mail',           'left',   '30%');
    $contact    = new TDataGridColumn('contact', _t('Contact'), 'left',   '20%');

    // add the columns to the datagrid
    $this->datagrid->addColumn($id);
    $this->datagrid->addColumn($name);
    $this->datagrid->addColumn($city);
    $this->datagrid->addColumn($email);
    $this->datagrid->addColumn($contact);

    $id->title = 'Here is the id';
    $name->title = 'Here is the name';
    $city->title = 'Here is the city';
    $email->title = 'Here is the e-mail';
    $contact->title = 'Here is the contact';

    // creates two datagrid actions
    $action1 = new TDataGridAction(array('ClientView', 'onView'));
    $action1->setLabel('View');
    $action1->setImage('fa:search blue');
    $action1->setField('id');

    $action2 = new TDataGridAction(array($this, 'onDelete'));
    $action2->setLabel('Delete');
    $action2->setImage('fa:trash red');
    $action2->setField('id');

    $action3 = new TDataGridAction(array('ClientForm', 'onEdit'));
    $action3->setLabel('Edit');
    $action3->setImage('fa:edit blue');
    $action3->setField('id');

    // add the actions to the datagrid
    $this->datagrid->addAction($action1);
    $this->datagrid->addAction($action3);
    $this->datagrid->addAction($action2);

    // creates the datagrid model
    $this->datagrid->createModel();

    // create the page navigation
    $this->pageNavigation = new TPageNavigation;
    $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
    $this->pageNavigation->setWidth($this->datagrid->getWidth());

    $panel = new TPanelGroup;
    $panel->add($this->datagrid);
    $panel->addFooter($this->pageNavigation);

    //Glyphicon
    $glyph = new TElement('i');
    $glyph->class = 'glyphicon glyphicon-plus-sign green';

    //link
    $link = new TElement('a');
    $link->generator = 'adianti';
    $link->href = 'index.php?class=ClientForm';
    $link->class = 'btn btn-default btn-sm';
    $link->add($glyph);
    $link->add(_t('New'));
    //add link to panel
    $panel->add($link);

    //Add breadcrumb
    $this->step = new TBreadCrumb;
    $this->step->addItem('<a class="bread" generator="adianti" href="engine.php" title="" data-original-title="Home"><span>h</span></a>', FALSE);
    $this->step->addItem(_t('Properties'), FALSE);
    $this->step->addItem(_t('List'), TRUE);

    // wrap the page content using vertical box
    $vbox = new TVBox;
    $vbox->style='width:100%';
    $vbox->add($this->step);
    $vbox->add($panel);
    parent::add($vbox);
  }

  /**
   * Load the data into the datagrid
   */
  public function onReload($param = NULL)
  {
    try
    {
      // open a transaction with database 'communication'
      TTransaction::open('sample');

      // creates a repository for SystemDocument
      $repository = new TRepository('Client');
      $limit = 10;
      // creates a criteria
      $criteria = new TCriteria;

      // default order
      if (empty($param['order']))
      {
        $param['order'] = 'id';
        $param['direction'] = 'asc';
      }
      $criteria->setProperties($param); // order, offset
      $criteria->setProperty('limit', $limit);

      // load the objects according to criteria
      $objects = $repository->load($criteria, FALSE);

      if (is_callable($this->transformCallback))
      {
        call_user_func($this->transformCallback, $objects, $param);
      }

      $this->datagrid->clear();
      if ($objects)
      {
        // iterate the collection of active records
        foreach ($objects as $object)
        {
          // add the object inside the datagrid
          $this->datagrid->addItem($object);
        }
      }

      // reset the criteria for record count
      $criteria->resetProperties();
      $count= $repository->count($criteria);

      $this->pageNavigation->setCount($count); // count of records
      $this->pageNavigation->setProperties($param); // order, page
      $this->pageNavigation->setLimit($limit); // limit

      // close the transaction
      TTransaction::close();
      $this->loaded = true;
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
   * Ask before deletion
   */
  public function onDelete($param)
  {
    // define the delete action
    $action = new TAction(array($this, 'Delete'));
    $action->setParameters($param); // pass the key parameter ahead

    // shows a dialog to the user
    new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
  }
  /**
   * Delete a record
   */
  public function Delete($param)
  {
    try
    {
      $key=$param['key']; // get the parameter $key
      TTransaction::open('sample'); // open a transaction with database
      $object = new Client($key, FALSE); // instantiates the Active Record
      if ($object->system_user_id == TSession::getValue('userid') OR TSession::getValue('login') === 'admin')
      {
        $object->delete(); // deletes the object from the database
      }
      else
      {
        throw new Exception(_t('Permission denied'));
      }
      TTransaction::close(); // close the transaction
      $this->onReload( $param ); // reload the listing
      new TMessage('info', AdiantiCoreTranslator::translate('Record deleted')); // success message
    }
    catch (Exception $e) // in case of exception
    {
      new TMessage('error', $e->getMessage()); // shows the exception error message
      TTransaction::rollback(); // undo all pending operations
    }
  }
  /**
   * shows the page
   */
  function show()
  {
    $this->onReload();
    parent::show();
  }
}