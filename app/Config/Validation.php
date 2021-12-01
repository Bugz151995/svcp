<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use App\Validation\SignInRules;
use App\Validation\AdminSignInRules;

class Validation {
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
		    SignInRules::class,
				AdminSignInRules::class
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
				'my_list' => 'error_template\_errors_list',
				'my_single' => 'error_template\_errors_single'
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    
	public $signup = [
		'fname' => [
			'label' => 'Firstname',
			'rules' => 'required',
		],
		'lname' => [
			'label' => 'Lastname',
			'rules' => 'required',
		],
		'class' => [
			'label' => 'Class',
			'rules' => 'required',
		],
		'sex' => [
			'label' => 'Sex',
			'rules' => 'required',
		],
		'uname' => [
			'rules'  => 'required|is_unique[accounts.uname]|min_length[5]|max_length[16]',
			'errors' => [
				'required'   => 'Please enter your username.',
				'is_unique'  => 'The username is already taken.',
				'min_length' => '5 to 16 letters and numbers only.',
				'max_length' => '5 to 16 letters and numbers only.',
			]
		],
		'email' => [
			'rules'  => 'required|is_unique[students.email]|valid_email',
			'errors' => [
				'required'   => 'Please enter your email.',
				'is_unique'  => 'The email has already been used.',
				'valid_email' => 'Please enter a valid email.',
			]
		],
		'pass' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Please enter your password.'
			]
		],
		'passconf' => [
			'rules' => 'required|matches[pass]',
			'errors' => [
				'required' => 'Please confirm your password.',
				'matches' => 'The passwords don\'t match.'
			]
		]
	];

	public $signin = [
		'uname' => [
			'rules'  => 'required',
			'errors' => ['required' => '']
		],
		'pass' => [
			'rules'  => 'required|signin_attempt|verify_user[uname, pass]',
			'errors' => [
				'required'       => 'Please enter your username or password.',
				'signin_attempt' => 'Max sign-in attempt, Please try again in a minute.',
				'verify_user'    => 'The username or password is invalid.'
			]
		]
	];

	public $a_signin = [
		'uname' => [
			'rules'  => 'required',
			'errors' => ['required' => '']
		],
		'pass' => [
			'rules'  => 'required|signin_attempt|verify_admin[uname, pass]',
			'errors' => [
				'required'       => 'Please enter your username or password.',
				'signin_attempt' => 'Max sign-in attempt, Please try again in a minute.',
				'verify_admin'    => 'The username or password is invalid.'
			]
		]
	];
}
