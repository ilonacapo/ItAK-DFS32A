<?php

class fileTranscriptorVisitor {
    private array $strategies = [];
    public function transcript(string $path) {
        foreach($this->strategies as $strategy) {
            if ($strategy->checkTranscript($path)) {
                return $strategy->transcript($path);
            }
        }
    }

    public function addStrategy(fileTranscriptStrategy $strategy) {
        $this->strategies[] = $strategy;
    }
}