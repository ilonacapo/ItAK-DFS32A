<?php

class csvFileTranscriptor implements fileTranscriptStrategy {
    private function associateHeader(array $headers, array $lines) {
        $finalArray = [];
        foreach($headers as $line => $header) {
            if(isset($lines[$line])){
                $finalArray[$header] = $lines[$line]; 
            }
        }
        return $finalArray;
    } 

    public function transcript(string $path) : array {
        if(!file_exists($path)) {
            throw new Exception("Fichier introuvable");
        }
   
        $handle = fopen($path, "r");
        if (!$handle){
            throw new Exception("Le fichier n'a pas pu être ouvert.\nA-t-il les droits de lecture?");
        }
        $headers = fgetcsv($handle);
        if (!$headers) {
            fclose($handle);
            throw new Exception("Fichier vide");
        }
        $datasLine = [];
        while (($row = fgetcsv($handle))) {
            $datasLine[] = $this->associateHeader($headers, $row);
        }
        fclose($handle);
        return $datasLine;
    }

    public function checkTranscript(string $path): bool
    {
        $info = new SplFileInfo($path);
        if ($info->getExtension() === "csv") {
            return true;
        }
        return false;
    }
}