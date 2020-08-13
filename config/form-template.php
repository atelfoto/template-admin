<?php
return [
    'button' => '<button class="btn btn-{{1}}" {{attrs}}>{{text}}</button>',
    // Used for checkboxes in checkbox() and multiCheckbox().
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    // Input group wrapper for checkboxes created via control().
    'checkboxFormGroup' => '{{label}}',
    // Wrapper container for checkboxes.
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
    // Widget ordering for date/time/datetime pickers.
    'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
    // Error message wrapper elements.
    'error' => '<div class="text-danger">{{content}}</div>',
    // File input used by file().
    'file' => '<div class="form-group input file">
                    <input class="form-control" id="{{name}}" type="file" name="{{name}}"{{attrs}}>
                </div>',
    // Generic input element.
    'input' => '<input class="form-control {{class}}" type="{{type}}"  name="{{name}}"{{attrs}} />',
    // Container element used by control().
    'inputContainer' => '<div class="form-group {{class}} input {{type}}{{required}}">{{content}}</div>',
    // Container element used by control() when a field has an error.
    // 'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
    // Submit input element.
    'inputSubmit' => '<input class="btn btn-{{1}}" type="{{type}}"{{attrs}}/>',
    // Label element when inputs are not nested inside the label.
    'label' => '<label{{attrs}}>{{text}}</label>',
    // Option element used in select pickers.
    'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
    // Select element,
    'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
    // Multi-select element,
    'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
    // Textarea input element,
    'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
    // Container for submit buttons.
    'submitContainer' => '<div class="box-footer">{{content}}</div>',
   // 'radioWrapper' => '<div class="radio radio-primary">{{input}}{{label}}</div>',
];
