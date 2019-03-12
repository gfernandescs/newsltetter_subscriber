<?php
// Add subscriber_firstname code column to newsletter subscriber table

if ($this->getConnection()->tableColumnExists('newsletter_subscriber', 'subscriber_firstname') === false) {
    $this->getConnection()->addColumn($this->getTable('newsletter/subscriber'), 'subscriber_firstname', 'varchar(100) null'); 
}

// Add subscriber_phone code column to newsletter subscriber table

if ($this->getConnection()->tableColumnExists('newsletter_subscriber', 'subscriber_phone') === false) {
    $this->getConnection()->addColumn($this->getTable('newsletter/subscriber'), 'subscriber_phone', 'varchar(15) null'); 
}