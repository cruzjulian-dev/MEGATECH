<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets'      => 'No rule sets specified in Validation configuration.',
    'ruleNotFound'    => '"{0}" is not a valid rule.',
    'groupNotFound'   => '"{0}" is not a validation rules group.',
    'groupNotArray'   => '"{0}" rule group must be an array.',
    'invalidTemplate' => '"{0}" is not a valid Validation template.',

    // Rule Messages
    'alpha'                 => 'El campo {field} solo puede contener caracteres alfabéticos.',
    'alpha_dash'            => 'El campo {field} solo puede contener caracteres alfanuméricos, guiones bajos y guiones.',
    'alpha_numeric'         => 'El campo {field} solo puede contener caracteres alfanuméricos.',
    'alpha_numeric_punct'   => 'El campo {field} solo puede contener caracteres alfanuméricos, espacios y los siguientes caracteres: ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'The {field} field may only contain alphanumeric and space characters.',
    'alpha_space'           => 'The {field} field may only contain alphabetical characters and spaces.',
    'decimal'               => 'El campo {field} debe contener un número decimal.',
    'differs'               => 'El campo {field} debe contener un número decimal.',
    'equals'                => 'El campo {field} debe ser exactamente: {param}.',
    'exact_length'          => 'The {field} field must be exactly {param} characters in length.',
    'greater_than'          => 'El campo {field} debe contener un numero mayor que {param}.',
    'greater_than_equal_to' => 'The {field} field must contain a number greater than or equal to {param}.',
    'hex'                   => 'The {field} field may only contain hexadecimal characters.',
    'in_list'               => 'The {field} field must be one of: {param}.',
    'integer'               => 'El campo {field} debe contener un número entero.',
    'is_natural'            => 'El campo {field} solo puede contener numeros sin símbolos',
    'is_natural_no_zero'    => 'El campo {field} solo puede contener numeros enteros mayores que cero.',
    'is_not_unique'         => 'El campo {field} debe contener un valor que ya existe en la base de datos.',
    'is_unique'             => 'El campo {field} ya está registrado.',
    'less_than'             => 'The {field} field must contain a number less than {param}.',
    'less_than_equal_to'    => 'The {field} field must contain a number less than or equal to {param}.',
    'matches'               => 'El campo {field} no coincide con el campo {param}.',
    'max_length'            => 'El campo {field} no puede superar los {param} caracteres de longitud.',
    'min_length'            => 'El campo {field} debe tener al menos {param} caracteres de longitud.',
    'not_equals'            => 'The {field} field cannot be: {param}.',
    'not_in_list'           => 'The {field} field must not be one of: {param}.',
    'numeric'               => 'El campo {field} solo puede contener números.',
    'regex_match'           => 'The {field} field is not in the correct format.',
    'required'              => 'El campo {field} es obligatorio.',
    'required_with'         => 'The {field} field is required when {param} is present.',
    'required_without'      => 'The {field} field is required when {param} is not present.',
    'string'                => 'The {field} field must be a valid string.',
    'timezone'              => 'The {field} field must be a valid timezone.',
    'valid_base64'          => 'The {field} field must be a valid base64 string.',
    'valid_email'           => 'Debe ingresar una dirección de correo electrónico válida.',
    'valid_emails'          => 'The {field} field must contain all valid email addresses.',
    'valid_ip'              => 'The {field} field must contain a valid IP.',
    'valid_url'             => 'The {field} field must contain a valid URL.',
    'valid_url_strict'      => 'The {field} field must contain a valid URL.',
    'valid_date'            => 'The {field} field must contain a valid date.',
    'valid_json'            => 'The {field} field must contain a valid json.',

    // Credit Cards
    'valid_cc_num' => '{field} does not appear to be a valid credit card number.',

    // Files
    'uploaded' => 'Debe subir una imagen.',
    'max_size' => '{field} es un archivo demasiado grande.',
    'is_image' => 'El archivo no es una imagen válida.',
    'mime_in'  => '{field} no tiene un tipo MIME válido.',
    'ext_in'   => '{field} no tiene una extensión de archivo válida.',
    'max_dims' => '{field} no es una imagen válida, o es demasiado ancha o alta.',
];
