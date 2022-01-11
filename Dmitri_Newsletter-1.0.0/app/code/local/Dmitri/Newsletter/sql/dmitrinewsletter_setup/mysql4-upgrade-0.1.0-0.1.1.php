<?php
  ini_set('display_errors', '1');

  $installer = $this;
  $installer->startSetup();
  $installer->getConnection()
           ->addColumn(
            $installer->getTable('newsletter/subscriber'), //Get the newsletter Table
            'subscriber_name', //New Field Name
       array(
         'type'      => Varien_Db_Ddl_Table::TYPE_TEXT, //Field Type ...
         'nullable'  => true,
         'length'    => 50,
         'comment'   => 'Subscriber Name'
      )
  );             
  $installer->endSetup();
?>