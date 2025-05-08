<?php

class jsonFileTranscriptor implements fileTranscriptStrategy {
    public function transcript(string $path) : array {
        if(!file_exists($path)) {
            throw new Exception("Fichier introuvable");
        } 
        $jsonData = json_decode(file_get_contents($path), true);
        return $jsonData;
    }

    public function checkTranscript(string $path): bool
    {
        $info = new SplFileInfo($path);
        if ($info->getExtension() === "json") {
            return true;
        }
        return false;
    }
}