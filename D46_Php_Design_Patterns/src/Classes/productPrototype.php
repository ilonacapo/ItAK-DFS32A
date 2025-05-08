<?php

interface productPrototype {
    public function clonePrototype() : self;
    public function setAttributes(array $attributes);
}