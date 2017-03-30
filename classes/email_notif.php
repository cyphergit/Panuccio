<?php

class EmailNotif{
    
    public $admin;
    public $customers;
    
    public $emailTo;
    public $emailFrom;
    public $emailSubject;
    public $emailBody;
    
    private function mailHeader() {
        $header = "MIME-Version: 1.0\r\n"
                . "From: Panuccio Autos<$this->emailFrom>\r\n"
                //. "Cc: $ccTo" . "\r\n"
                . "Content-type: text/html; charset=iso-8859-1\r\n";
        
        return $header;
    }
    
    public function sendNotif() {
        $sent = mail($this->emailTo, $this->emailSubject, $this->emailBody, $this->mailHeader());
        
        if (!$sent) {
            return false;
            
        } else {
            return true;
        }
    }
}

