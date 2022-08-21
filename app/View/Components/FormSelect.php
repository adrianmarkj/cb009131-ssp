<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public $id;
    public $name;
    public $label;
    public $value;
    public $placeholder;
    public $options;
    public $help;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label, $value, $placeholder = '', $options = [], $help = '', $required = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->help = $help;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-select', [
            'id' => $this->id,
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value,
            'placeholder' => $this->placeholder,
            'options' => $this->options,
            'help' => $this->help,
            'required' => $this->required,
        ]);
    }
}
