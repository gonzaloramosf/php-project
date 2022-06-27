<?php

class ItemValidation
{
    protected $data  = [];
    protected $errors = [];

    public function __construct(array $data) {
        $this->data = $data;
        $this->validate();
    }

    public function errorsExist(): bool {
        return !empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function validate() {
        if(empty($this->data['item'])) {
            $this->errors['item'] = "Debes escribir un nombre para el producto.";
        }

        if(empty($this->data['resume'])) {
            $this->errors['resume'] = "Debes escribir un resumen para el producto.";
        }

        if(empty($this->data['price'])) {
            $this->errors['price'] = "Debes definir el precio del producto.";
        }

        if(empty($this->data['description'])) {
            $this->errors['description'] = "Debes escribir una descripción del producto.";
        }

        if(empty($this->data['image'])) {
            $this->errors['image'] = "Debes agregar una imagen para el producto.";
        }

        if(empty($this->data['image_title'])) {
            $this->errors['image_title'] = "Debes definir un titulo para la imagen.";
        }

        if(empty($this->data['stock'])) {
            $this->errors['stock'] = "Debes definir la cantidad disponible del producto.";
        }
    }
}