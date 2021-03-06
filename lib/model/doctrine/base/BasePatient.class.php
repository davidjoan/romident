<?php

/**
 * BasePatient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $holder_id
 * @property integer $dentist_id
 * @property string $firstname
 * @property string $lastname
 * @property string $gender
 * @property timestamp $date_of_birth
 * @property string $description
 * @property string $treatments
 * @property string $brush_teeth
 * @property string $different_brush
 * @property string $consultation
 * @property string $type
 * @property string $active
 * @property Holder $Holder
 * @property Dentist $Dentist
 * @property Doctrine_Collection $MedicalHistories
 * @property Doctrine_Collection $DentalHistories
 * @property Doctrine_Collection $Diagnosis
 * @property Doctrine_Collection $PatientMedicalHistory
 * @property Doctrine_Collection $PatientDentalHistory
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method integer             getHolderId()              Returns the current record's "holder_id" value
 * @method integer             getDentistId()             Returns the current record's "dentist_id" value
 * @method string              getFirstname()             Returns the current record's "firstname" value
 * @method string              getLastname()              Returns the current record's "lastname" value
 * @method string              getGender()                Returns the current record's "gender" value
 * @method timestamp           getDateOfBirth()           Returns the current record's "date_of_birth" value
 * @method string              getDescription()           Returns the current record's "description" value
 * @method string              getTreatments()            Returns the current record's "treatments" value
 * @method string              getBrushTeeth()            Returns the current record's "brush_teeth" value
 * @method string              getDifferentBrush()        Returns the current record's "different_brush" value
 * @method string              getConsultation()          Returns the current record's "consultation" value
 * @method string              getType()                  Returns the current record's "type" value
 * @method string              getActive()                Returns the current record's "active" value
 * @method Holder              getHolder()                Returns the current record's "Holder" value
 * @method Dentist             getDentist()               Returns the current record's "Dentist" value
 * @method Doctrine_Collection getMedicalHistories()      Returns the current record's "MedicalHistories" collection
 * @method Doctrine_Collection getDentalHistories()       Returns the current record's "DentalHistories" collection
 * @method Doctrine_Collection getDiagnosis()             Returns the current record's "Diagnosis" collection
 * @method Doctrine_Collection getPatientMedicalHistory() Returns the current record's "PatientMedicalHistory" collection
 * @method Doctrine_Collection getPatientDentalHistory()  Returns the current record's "PatientDentalHistory" collection
 * @method Patient             setId()                    Sets the current record's "id" value
 * @method Patient             setHolderId()              Sets the current record's "holder_id" value
 * @method Patient             setDentistId()             Sets the current record's "dentist_id" value
 * @method Patient             setFirstname()             Sets the current record's "firstname" value
 * @method Patient             setLastname()              Sets the current record's "lastname" value
 * @method Patient             setGender()                Sets the current record's "gender" value
 * @method Patient             setDateOfBirth()           Sets the current record's "date_of_birth" value
 * @method Patient             setDescription()           Sets the current record's "description" value
 * @method Patient             setTreatments()            Sets the current record's "treatments" value
 * @method Patient             setBrushTeeth()            Sets the current record's "brush_teeth" value
 * @method Patient             setDifferentBrush()        Sets the current record's "different_brush" value
 * @method Patient             setConsultation()          Sets the current record's "consultation" value
 * @method Patient             setType()                  Sets the current record's "type" value
 * @method Patient             setActive()                Sets the current record's "active" value
 * @method Patient             setHolder()                Sets the current record's "Holder" value
 * @method Patient             setDentist()               Sets the current record's "Dentist" value
 * @method Patient             setMedicalHistories()      Sets the current record's "MedicalHistories" collection
 * @method Patient             setDentalHistories()       Sets the current record's "DentalHistories" collection
 * @method Patient             setDiagnosis()             Sets the current record's "Diagnosis" collection
 * @method Patient             setPatientMedicalHistory() Sets the current record's "PatientMedicalHistory" collection
 * @method Patient             setPatientDentalHistory()  Sets the current record's "PatientDentalHistory" collection
 * 
 * @package    romident
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatient extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_patient');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('holder_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => false,
             ));
        $this->hasColumn('dentist_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => false,
             ));
        $this->hasColumn('firstname', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => true,
             ));
        $this->hasColumn('lastname', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => true,
             ));
        $this->hasColumn('gender', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('date_of_birth', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('description', 'string', 5000, array(
             'type' => 'string',
             'length' => 5000,
             'notnull' => false,
             'default' => '',
             ));
        $this->hasColumn('treatments', 'string', 5000, array(
             'type' => 'string',
             'length' => 5000,
             'notnull' => false,
             ));
        $this->hasColumn('brush_teeth', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => false,
             ));
        $this->hasColumn('different_brush', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => false,
             ));
        $this->hasColumn('consultation', 'string', 5000, array(
             'type' => 'string',
             'length' => 5000,
             'notnull' => false,
             ));
        $this->hasColumn('type', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('active', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 1,
             ));


        $this->index('i_firstname', array(
             'fields' => 
             array(
              0 => 'firstname',
             ),
             ));
        $this->index('i_lastname', array(
             'fields' => 
             array(
              0 => 'lastname',
             ),
             ));
        $this->index('i_active', array(
             'fields' => 
             array(
              0 => 'active',
             ),
             ));
        $this->index('i_type', array(
             'fields' => 
             array(
              0 => 'type',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('boolean_columns', array(
             0 => 'active',
             1 => 'gender',
             2 => 'type',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Holder', array(
             'local' => 'holder_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Dentist', array(
             'local' => 'dentist_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('MedicalHistory as MedicalHistories', array(
             'refClass' => 'PatientMedicalHistory',
             'local' => 'patient_id',
             'foreign' => 'medical_history_id'));

        $this->hasMany('DentalHistory as DentalHistories', array(
             'refClass' => 'PatientDentalHistory',
             'local' => 'patient_id',
             'foreign' => 'dental_history_id'));

        $this->hasMany('Diagnosis', array(
             'local' => 'id',
             'foreign' => 'patient_id'));

        $this->hasMany('PatientMedicalHistory', array(
             'local' => 'id',
             'foreign' => 'patient_id'));

        $this->hasMany('PatientDentalHistory', array(
             'local' => 'id',
             'foreign' => 'patient_id'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'firstname',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
    }
}