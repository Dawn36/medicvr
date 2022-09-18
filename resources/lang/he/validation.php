<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'יש לקבל את התכונה :.',
    'active_url' => 'התכונה : אינה כתובת אתר חוקית.',
    'after' => 'התכונה : חייבת להיות תאריך אחרי :date.',
    'after_or_equal' => 'התכונה : חייבת להיות תאריך לאחר או שווה ל-:date.',
    'alpha' => 'התכונה : יכולה להכיל רק אותיות.',
    'alpha_dash' => 'התכונה : יכולה להכיל רק אותיות, מספרים, מקפים וקווים תחתונים.',
    'alpha_num' => 'התכונה : יכולה להכיל רק אותיות ומספרים.',
    'array' => 'התכונה : חייבת להיות מערך.',
    'before' => 'התכונה : חייבת להיות תאריך לפני :date.',
    'before_or_equal' => 'התכונה : חייבת להיות תאריך לפני או שווה ל :date.',
    'between' => [
        'numeric' => 'התכונה : חייבת להיות בין :min ל-:max.',
        'file' => 'התכונה : חייבת להיות בין :min ל-:max קילובייט.',
        'string' => 'התכונה : חייבת להיות בין התווים :min ל-:max.',
        'array' => 'התכונה : חייבת לכלול פריטים בין :min ל-:max.',
    ],
    'boolean' => 'השדה :attribute חייב להיות נכון או לא נכון.',
    'confirmed' => 'אישור ה-:attribute אינו תואם.',
    'date' => 'התכונה :איננה תאריך חוקי.',
    'date_equals' => 'התכונה : חייבת להיות תאריך השווה לתאריך :date.',
    'date_format' => 'התכונה :לא תואמת את הפורמט :format.',
    'different' => 'התכונה :תכונה ו-:other חייבות להיות שונות.',
    'digits' => 'התכונה : חייבת להיות ספרות :digits.',
    'digits_between' => 'התכונה : חייבת להיות בין ספרות :min ל-:max.',
    'dimensions' => 'למאפיין : יש ממדי תמונה לא חוקיים.',
    'distinct' => 'לשדה :attribute יש ערך כפול.',
    'email' => 'התכונה : חייבת להיות כתובת דוא"ל חוקית.',
    'ends_with' => 'התכונה : חייבת להסתיים באחד מהבאים: :values.',
    'exists' => 'התכונה :נבחרה אינה חוקית.',
    'file' => 'התכונה : חייבת להיות קובץ.',
    'filled' => 'השדה :attribute חייב להיות בעל ערך.',
    'gt' => [
        'numeric' => 'התכונה : חייבת להיות גדולה מ- :value.',
        'file' => 'התכונה : חייבת להיות גדולה מ- :value קילובייט.',
        'string' => 'התכונה : חייבת להיות גדולה מתווים :value.',
        'array' => 'התכונה : חייבת לכלול יותר מפריטי :value.',
    ],
    'gte' => [
        'numeric' => 'התכונה : חייבת להיות גדולה או שווה ל- :value.',
        'file' => 'התכונה : חייבת להיות גדולה או שווה ל- :value קילובייט.',
        'string' => 'התכונה : חייבת להיות גדולה או שווה לתווים :value.',
        'array' => 'התכונה : חייבת לכלול פריטי :value או יותר.',
    ],
    'image' => 'התכונה : חייבת להיות תמונה.',
    'in' => 'התכונה :נבחרה אינה חוקית.',
    'in_array' => 'השדה :attribute אינו קיים ב-:other.',
    'integer' => 'התכונה : חייבת להיות מספר שלם.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
