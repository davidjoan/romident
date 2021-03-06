<?php

/**
 * BaseMedicalHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $active
 * @property Doctrine_Collection $Patients
 * @property Doctrine_Collection $PatientMedicalHistory
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method string              getName()                  Returns the current record's "name" value
 * @method string              getDescription()           Returns the current record's "description" value
 * @method string              getActive()                Returns the current record's "active" value
 * @method Doctrine_Collection getPatients()              Returns the current record's "Patients" collection
 * @method Doctrine_Collection getPatientMedicalHistory() Returns the current record's "PatientMedicalHistory" collection
 * @method MedicalHistory      setId()                    Sets the current record's "id" value
 * @method MedicalHistory      setName()                  Sets the current record's "name" value
 * @method MedicalHistory      setDescription()           Sets the current record's "description" value
 * @method MedicalHistory      setActive()                Sets the current record's "active" value
 * @method MedicalHistory      setPatients()              Sets the current record's "Patients" collection
 * @method MedicalHistory      setPatientMedicalHistory() Sets the current record's "PatientMedicalHistory" collection
 * 
 * @package    romident
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMedicalHistory extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_medical_history');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => true,
             ));
        $this->hasColumn('description', 'string', 5000, array(
             'type' => 'string',
             'length' => 5000,
             'notnull' => false,
             'default' => '',
             ));
        $this->hasColumn('active', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 1,
             ));


        $this->index('i_name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->index('i_active', array(
             'fields' => 
             array(
              0 => 'active',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('boolean_columns', array(
             0 => 'active',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Patient as Patients', array(
             'refClass' => 'PatientMedicalHistory',
             'local' => 'medical_history_id',
             'foreign' => 'patient_id'));

        $this->hasMany('PatientMedicalHistory', array(
             'local' => 'id',
             'foreign' => 'medical_history_id'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
    }
}