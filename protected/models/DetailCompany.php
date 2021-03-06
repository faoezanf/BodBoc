<?php

class DetailCompany extends CFormModel
{
	public $companyid;
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
			array('companyid', 'required'),
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
			'companyid'=>'ID of Company',
		);
	}
}