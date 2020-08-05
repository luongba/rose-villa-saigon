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
    'accepted'             => 'Thuộc tính :attribute phải được chấp thuận.',
    'active_url'           => 'Thuộc tính :attribute không phải URL hợp lệ.',
    'after'                => 'Thuộc tính :attribute phải là một ngày sau ngày :date.',
    'after_or_equal'       => 'Thuộc tính :attribute phải là một ngày sau hoặc là ngày :date.',
    'alpha'                => 'Thuộc tính :attribute chỉ được chứa chữ cái.',
    'alpha_dash'           => 'Thuộc tính :attribute chỉ được chứa chữ cái, số và dấu gạch ngang.',
    'alpha_num'            => 'Thuộc tính :attribute chỉ được chứa chữ cái và số.',
    'array'                => 'Thuộc tính :attribute phải là một mảng.',
    'before'               => 'Thuộc tính :attribute phải là một ngày trước ngày :date.',
    'before_or_equal'      => 'Thuộc tính :attribute phải là một ngày trước hoặc là ngày :date.',
    'between'              => [
        'numeric' => 'Thuộc tính :attribute phải nằm trong khoảng :min và :max.',
        'file'    => 'Thuộc tính :attribute phải nằm trong khoảng :min và :max kilobytes.',
        'string'  => 'Thuộc tính :attribute phải nằm trong khoảng :min và :max ký tự.',
        'array'   => 'Thuộc tính :attribute phải nằm trong khoảng :min và :max phần tử.',
    ],
    'boolean'              => 'Thuộc tính :attribute phải là true hoặc false.',
    'confirmed'            => 'Thuộc tính :attribute nhận định không phù hợp.',
    'date'                 => 'Thuộc tính :attribute không phải là ngày.',
    'date_format'          => 'Thuộc tính :attribute không đúng định dạng :format.',
    'different'            => 'Thuộc tính :attribute và :other phải khác nhau.',
    'digits'               => 'Thuộc tính :attribute phải là :digits chữ số.',
    'digits_between'       => 'Thuộc tính :attribute phải nằm trong khoảng :min và :max chữ số.',
    'dimensions'           => 'Thuộc tính :attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => 'Thuộc tính :attribute có giá trị trùng lặp.',
    'email'                => 'Thuộc tính :attribute phải là một địa chỉ email hợp lệ.',
    'exists'               => 'Thuộc tính lựa chọn :attribute không hợp lệ.',
    'file'                 => 'Thuộc tính :attribute phải là một file.',
    'filled'               => 'Thuộc tính :attribute phải có giá trị.',
    'image'                => 'Thuộc tính :attribute phải là một hình ảnh.',
    'in'                   => 'Thuộc tính lựa chọn :attribute không hợp lệ.',
    'in_array'             => 'Thuộc tính :attribute không tồn tại trong :other.',
    'integer'              => 'Thuộc tính :attribute phải là một số nguyên.',
    'ip'                   => 'Thuộc tính :attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4'                 => 'Thuộc tính :attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6'                 => 'Thuộc tính :attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json'                 => 'Thuộc tính :attribute phải là một địa chỉ JSON chuỗi.',
    'max'                  => [
        'numeric' => 'Thuộc tính :attribute không được lớn hơn :max.',
        'file'    => 'Thuộc tính :attribute không được lớn hơn :max kilobytes.',
        'string'  => 'Thuộc tính :attribute không được lớn hơn :max ký tự.',
        'array'   => 'Thuộc tính :attribute không được có nhiều hơn :max phần tử.',
    ],
    'mimes'                => 'Thuộc tính :attribute phải là một file loại: :values.',
    'mimetypes'            => 'Thuộc tính :attribute phải là một file loại: :values.',
    'min'                  => [
        'numeric' => 'Thuộc tính :attribute tối thiểu phải :min.',
        'file'    => 'Thuộc tính :attribute tối thiểu phải :min kilobytes.',
        'string'  => 'Thuộc tính :attribute tối thiểu phải :min ký tự.',
        'array'   => 'Thuộc tính :attribute tối thiểu phải :min phần tử.',
    ],
    'not_in'               => 'Thuộc tính lựa chọn :attribute không hợp lệ.',
    'not_regex'            => 'Thuộc tính :attribute không đúng định dạng.',
    'numeric'              => 'Thuộc tính :attribute không phải là một số.',
    'present'              => 'Thuộc tính :attribute phải có mặt.',
    'regex'                => 'Thuộc tính :attribute không đúng định dạng.',
    'required'             => 'Thuộc tính :attribute là bắt buộc.',
    'required_if'          => 'Thuộc tính :attribute là bắt buộc khi :other là :value.',
    'required_unless'      => 'Thuộc tính :attribute là bắt buộc ngoại trừ :other là thuộc :values.',
    'required_with'        => 'Thuộc tính :attribute là bắt buộc khi :values có mặt.',
    'required_with_all'    => 'Thuộc tính :attribute là bắt buộc khi :values có mặt.',
    'required_without'     => 'Thuộc tính :attribute là bắt buộc khi :values không có mặt.',
    'required_without_all' => 'Thuộc tính :attribute là bắt buộc khi :values không có mặt.',
    'same'                 => 'Thuộc tính :attribute và :other không khớp.',
    'size'                 => [
        'numeric' => 'Thuộc tính :attribute phải là :size.',
        'file'    => 'Thuộc tính :attribute phải là :size kilobytes.',
        'string'  => 'Thuộc tính :attribute phải là :size ký tự.',
        'array'   => 'Thuộc tính :attribute phải chứa :size phần tử.',
    ],
    'string'               => 'Thuộc tính :attribute phải là một chuỗi.',
    'timezone'             => 'Thuộc tính :attribute phải là một khu vực hợp lệ.',
    'unique'               => 'Thuộc tính :attribute là duy nhất.',
    'uploaded'             => 'Thuộc tính :attribute không tải lên được.',
    'url'                  => 'Thuộc tính :attribute không đúng định dạng.',
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [],
];
