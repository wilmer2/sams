<?php

namespace Sams\Manager;

class EmployeeManager extends BaseManager {

  public function getRules() {
    $rules = [
      'identity_card' => 'required|numeric|unique:employees,identity_card',
      'address' => 'required',
      'full_name' => 'required|regex:/^[\pL\s]+$/u',
      'date_birth' => 'required|date',
      'phone' => 'numeric',
      'gender' => 'required',
      'degree_instruction' => 'required|in:none,primary,secondary,university',
      'civil_status' => 'required|in:married,single',
      'office' => 'required',
    ];
    
    return $rules;
  }

  public function getMessages() {
    $messages = [
      'identity_card.required' => 'Ingrese cedula',
      'identity_card.numeric' => 'Cedula debe ser un numero',
      'identity_card.unique' => 'Ya hay empleado registrado con esta cedula',
      'address.required' => 'Ingrese direccion',
      'full_name.required' => 'Ingrese nombre',
      'full_name.regex' => 'Ingrese formato de nombre valido',
      'date_birth.required' => 'Ingrese fecha de nacimiento',
      'date_birth.date' => 'Ingrese formato valido para fecha de nacimiento',
      'phone.numeric' => 'Telefono debe ser un numero',
      'gender.required'  => 'Ingrese genero',
      'degree_instruction.required' => 'Ingrese grado de instruccion',
      'degree_instruction.in' => 'Grado de instruccion ingresado es inválido',
      'civil_status.required' => 'Ingrese estado civil',
      'civil_status.in' => 'Estado civil ingresado es inválido',
      'office.required' => 'Ingrese cargo'
    ];

    return $messages;
  }

	public function prepareData($data) {
    if (!isset($data['break_out'])) {
      $data['break_out'] = 0;
    } else {
      $data['break_out'] = 1;
    }
    
    $data['activiti'] = 1;
    $data['image_url'] = 'http://localhost/image/geriatric/default/profile_default_man.png';
    $data['mime'] = 'jpg';

    return $data;
  }

	
			
	
	

}