<?php

class DetailPerson extends CFormModel
{
	public $personid;
	public $personname;
	public $retireddates;
	// public $email;
	// public $subject;
	// public $body;
	// public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('personid,personname,retireddates', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'personid'=>'ID of Person',
		);
	}
}