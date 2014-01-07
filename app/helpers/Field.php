<?php

class Field
{
    private $name;

    private $type;

    private $options;

    private $rendered;

    public function __construct($name, $type, $options = array())
    {

        $this->name = $name;
        $this->type = $type;
        $this->options = $options;
        $this->rendered = false;

    }

    /**
     * Gets the value of rendered.
     *
     * @return mixed
     */
    public function getRendered()
    {
        return $this->rendered;
    }

    /**
     * Sets the value of rendered.
     *
     * @param mixed $rendered the rendered
     *
     * @return self
     */
    public function setRendered($rendered)
    {
        $this->rendered = $rendered;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param mixed $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the value of options.
     *
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets the value of options.
     *
     * @param mixed $options the options
     *
     * @return self
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

}
