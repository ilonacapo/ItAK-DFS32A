<?php

interface fileTranscriptStrategy {
    public function transcript(string $path) : array;
    public function checkTranscript(string $path) : bool;
}