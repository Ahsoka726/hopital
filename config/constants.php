<?php

//Connection base de données
    define('DATABASE_NAME','mysql:host=localhost;dbname=hospitale2n;');
    define('DATABASE_USER' , 'admin_user');
    define('DATABASE_PASSWORD' , ']r*yniut3f1EBnlx');

 // Déclaration de REGEXP
 define('REGEXP_LASTNAME', '^[a-zA-Z]*$');
 define('REGEXP_FIRSTNAME', '^[a-zA-Z]*$');
 define('REGEXP_DATE',"^\d{4}-\d{2}-\d{1,2}$");
 define('REGEXP_PHONE', '^(\+33|0|0033)[1-9]((\-|\/|\.)?\d{2}){4}$');
 define('REGEXP_DATE_HOUR',"^\d{4}-\d{2}-\d{1,2}$");