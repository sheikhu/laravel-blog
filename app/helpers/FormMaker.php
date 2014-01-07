<?php



class FormMaker
{
    private $fields;

    public function __construct()
    {
        $this->fields = array();
    }

    public function add($name, $type, $options = array())
    {
        $this->fields[$name] = new Field($name, $type, $options);

    }

    public function render($name = null)
    {
        if(!is_null($name) && array_key_exists($name, $this->fields))
        {

            $field = $this->fields[$name];
            $options = $field->getOptions();
            $defaultsOptions = [
                'label' => isset($options['label']) ? $options['label'] : $name
                ];

            $options = array_merge($field->getOptions(), $defaultsOptions);

            $field->setOptions($options);

            return View::make('form.fields',
                ['field' => $field]
                )->renderSections()[$field->getType()];
        } else {
            throw new Exception("Field type not found !");

        }
    }



}
