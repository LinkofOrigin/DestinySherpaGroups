<?php


class Event {
    
    private $sherpa;
    private $console;
    private $activity;
    private $start;
    private $other;
    
    public function __construct($sherpa, $console, $activity, $start, $other="") {
        $this->sherpa = $sherpa;
        $this->console = $console;
        $this->activity = $activity;
        $this->start = $start;
        $this->other = $other;
    }
    
    public function getSherpa() {
        return $this->sherpa;
    }
    
    public function getConsole() {
        return $this->console;
    }
    
    public function getActivity() {
        return $this->activity;
    }
    
    public function getStart() {
        return $this->start;
    }
    
    public function getOther() {
        return $this->other;
    }
    
}
