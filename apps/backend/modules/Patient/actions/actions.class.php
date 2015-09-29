<?php

/**
 * Patient actions.
 *
 * @package    romident
 * @subpackage Patient
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PatientActions extends ActionsCrud
{

  protected function complementList(sfWebRequest $request, DoctrineQuery $q)
  {
    sfDynamicFormEmbedder::resetParams('diagnosis');

  }
    
  public function executeLoadHolders(sfWebRequest $request)
  {
    $holders = Doctrine::getTable('Holder')->findByNameLike($request->getParameter('term'), $request->getParameter('limit'));
    $holder = $holders->toCustomArray(array('id' => 'getId', 'title' => 'getFullName'));
    return $this->renderJson($holder);
  }

  public function executeLoadDentists(sfWebRequest $request)
  {
    $dentist = Doctrine::getTable('Dentist')->findByNameLike($request->getParameter('term'), $request->getParameter('limit'));
    $dentist = $dentist ->toCustomArray(array('id' => 'getId', 'title' => 'getFullName'));
    return $this->renderJson($dentist );
  }

  public function executePrint(sfWebRequest $request)
  {
  	$slug    = $request->getParameter('slug');
  	$paciente = Doctrine::getTable('Patient')->findOneBySlug($slug);
  	$this->forward404Unless($paciente);
  	
  	$titular    = $paciente->getHolder();
  	$odontologo = $paciente->getDentist();
  	$nombres_titular    = explode(" ", $titular->getLastName());
  	$nombres_paciente   = explode(" ", $paciente->getLastName());
  	$nombres_odontologo = explode(" ", $odontologo->getLastName());
  	
    $pdf = new HistoriaClinicaPDF('P', 'mm', 'A4', $titular->getCode().'-'.$paciente->getId());
    $pdf->AddPage(); 
    $pdf->Ln(10);
    
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,'Datos del Titular',0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);

    $pdf->Cell(63,5,'Apellido Paterno',1,0,'C');
    $pdf->Cell(63,5,'Apellido Materno',1,0,'C');
    $pdf->Cell(63,5,'Nombre(s)',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(63,5,utf8_decode($nombres_titular[0]),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($nombres_titular[1]),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($titular->getFirstname()),1,0,'C');
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(63,5,'Sexo',1,0,'C');
    $pdf->Cell(63,5,'Email',1,0,'C');
    $pdf->Cell(63,5,'Empresa',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(63,5,utf8_decode($titular->getGenderStr()),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($titular->getEmail()),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($titular->getCompany()),1,0,'C');

    
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(47.25,5,'Tel. Casa',1,0,'C');
    $pdf->Cell(47.25,5,'Tel. Oficina',1,0,'C');
    $pdf->Cell(47.25,5,'Celular',1,0,'C');
    $pdf->Cell(47.25,5,'Fax',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(47.25,5,$titular->getHomePhones(),1,0,'C');
    $pdf->Cell(47.25,5,$titular->getOfficePhones(),1,0,'C');
    $pdf->Cell(47.25,5,$titular->getMobilePhone(),1,0,'C');    
    $pdf->Cell(47.25,5,$titular->getFax(),1,0,'C');    
    
    $pdf->Ln(8); 
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,10,'Datos del Paciente',0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);

    //paciente
    $identificacion = 'Identificación';
    $pdf->Cell(63,5,'Apellido Paterno',1,0,'C');
    $pdf->Cell(63,5,'Apellido Materno',1,0,'C');
    $pdf->Cell(63,5,'Nombre(s)',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(63,5,utf8_decode($nombres_paciente[0]),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($nombres_paciente[1]),1,0,'C');
    $pdf->Cell(63,5,$paciente->getFirstname(),1,0,'C');
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(63,5,'Sexo',1,0,'C');
    $pdf->Cell(63,5,'Fecha de Nacimiento',1,0,'C');
    $pdf->Cell(63,5,utf8_decode($identificacion),1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(63,5,utf8_decode($paciente->getGenderStr()),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($paciente->getFormattedDateOfBirth()),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($paciente->getTypeStr()),1,0,'C');
    
    $titulo_odontologo = 'Datos del Odontólogo';
    $pdf->Ln(8); 
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,utf8_decode($titulo_odontologo),0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);
    
    
    $pdf->Cell(63,5,'Apellido Paterno',1,0,'C');
    $pdf->Cell(63,5,'Apellido Materno',1,0,'C');
    $pdf->Cell(63,5,'Nombre(s)',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(63,5,utf8_decode($nombres_odontologo[0]),1,0,'C');
    $pdf->Cell(63,5,utf8_decode($nombres_odontologo[1]),1,0,'C');
    $pdf->Cell(63,5,$odontologo->getFirstname(),1,0,'C');
    $pdf->Ln(8);  

    $telefono = 'Teléfono Consultorio';
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(63,5,'Email',1,0,'C');
    $pdf->Cell(63,5,utf8_decode($telefono),1,0,'C');
    $pdf->Cell(63,5,'Celular',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','I',12);
    $pdf->Cell(63,5,utf8_decode($odontologo->getEmail()),1,0,'C');
    $pdf->Cell(63,5,$odontologo->getHomePhones(),1,0,'C');
    $pdf->Cell(63,5,$odontologo->getMobilePhone(),1,0,'C');

    $historia = 'Historia Clínica';
    $pdf->Ln(8); 
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,utf8_decode($historia),0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);    

    $header = array('Sintomas', 'Si', 'No');
    $data = $paciente->getReportMedicalHistory();
    $pdf->FancyTable($header,$data);

    $pdf->AddPage(); 
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,'Historia Bucal y Dental',0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);    

    $data2 = $paciente->getReportMedicalHistory('Dental');
    $pdf->FancyTable($header,$data2);
    
    
    $pdf->Ln(3);
    $pdf->SetTextColor(0);
    
    $observacion1 = '¿Qué tratamiento ha adquirido?';
    $observacion2 = '¿Cuantas veces al día cepilla sus dientes?';
    $observacion3 = '¿Aparte del cepillo utiliza otro aditamento para limpiar sus dientes?';
    $observacion4 = '¿Motivo de la consulta?';
    
    $pdf->Cell(94.5,5,utf8_decode($observacion1),1,0,'L');
    $pdf->Cell(94.5,5,utf8_decode($paciente->getTreatments()),1,0,'L');
    $pdf->Ln();
    $pdf->Cell(94.5,5,utf8_decode($observacion2),1,0,'L');
    $pdf->Cell(94.5,5,utf8_decode($paciente->getBrushTeeth()),1,0,'L');
    $pdf->Ln();
    $pdf->Cell(130,5,utf8_decode($observacion3),1,0,'L');
    $pdf->Cell(59,5,utf8_decode($paciente->getDifferentBrush()),1,0,'L');
    $pdf->Ln();
    $pdf->Cell(94.5,5,utf8_decode($observacion4),1,0,'L');
    $pdf->Cell(94.5,5,utf8_decode($paciente->getConsultation()),1,0,'L');
    $pdf->Ln(10);
    $diagnostico = 'Odontograma';
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,utf8_decode($diagnostico),0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);       
    
	$pdf->Image(sfConfig::get('sf_web_dir') .'/images/general/odontograma.png');
    $pdf->Ln(10);
    $diagnostico = 'Diagnóstico';
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,utf8_decode($diagnostico),0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);        
    
    $header_diagnostico = array('Fecha','Diente',utf8_decode($diagnostico),'Tratamiento','Firma');
    $data_diagnostico = $paciente->getReporteDiagnostio();
    $pdf->DiagnosticoTable($header_diagnostico,$data_diagnostico);
    
    
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(222,184,135);
    $pdf->Cell(0,5,'Observaciones',0,1);
    $pdf->Ln(3);
    $pdf->SetTextColor(0);      
    $pdf->WriteHTML($paciente->getDescription());
    
    
    $pdf->Ln(50);
    $firma = 'Firma del Médico Tratante';
    $pdf->Cell(60);
    $pdf->Cell(58,5,utf8_decode($firma),'T',0,'C');
    
    $pdf->Output(sprintf('historia-%s.pdf',Doctrine_Inflector::urlize($paciente->getFullName())),'D');
    //$pdf->Output();
    
    throw new sfStopException();
  }
    
}
