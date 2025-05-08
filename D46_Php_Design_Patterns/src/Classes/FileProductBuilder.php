<?php

class FileProductBuilder {
    private array $data = [];
    private ProductFactory $factory;
    private array $filters = [];
    private fileTranscriptorVisitor $fileTranscriptorVisitor;

        public function __construct(fileTranscriptorVisitor $fileTranscriptorVisitor) {
            $this->factory = new ProductFactory();
            $this->data = [];
            $this->fileTranscriptorVisitor = $fileTranscriptorVisitor;
        } 

        public function createFrom(string $path){
            $data = $this->fileTranscriptorVisitor->transcript($path);
            if ($data === null) {
                throw new Exception("Erreur de lecture du fichier");
            }
            $this->data = $data;
            return $this;
        }
private function checkData() {
    if (empty($this->data['designation']) || empty($this->data['type'] || empty($this->data['ean']))) {
        throw new Exception("L'un des arguments est manquant");
    }
} 

public function build(){
    $filtered = $this->data;
    foreach($this->filters as $filter) {
        $filtered = array_filter($filtered, $filter);
    }

    foreach ($filtered as $data) {
        yield $this->factory->createProduct($data);
    }
}

public function getCollection() {
    $filtered = $this->data;
    foreach($this->filters as $filter) {
        $filtered = array_filter($filtered, $filter);
    }
    foreach($filtered as $data) {
        yield $this->factory->createProduct($data);
    }
    return $this;
}

public function filter( callable $filtreFn) {
    $this->filters[] = $filtreFn;
    return $this;
}
   
 }

