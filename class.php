<?php

class bookmarkly {

    var $host;
    var $username;
    var $password;
    var $db;

    function connect() {
        $con = mysql_connect($this->host, $this->username, $this->password) or die('neće da uđe - krivi podatci za pristup');
        mysql_select_db($this->db, $con) or die('neće da uđe - kao da ne postoji baza');
    }

    function get_sites($id = '') {

        if($id != ''):
        $id = mysql_real_escape_string($id);
        $sql = "SELECT * FROM stranice WHERE id = '$id'";

        else:
        $sql = "SELECT * FROM stranice";
        endif;



        $res = mysql_query($sql) or die(mysql_error('nešto ne valja'));

        if(mysql_num_rows($res) !=0):
        while($row = mysql_fetch_assoc($res)) {
                                 echo ' <a href="' . $row['url'] .'" class="lts">' . $row['sitename'] . '</a>';
                                                      
                               
        }
        else:
        echo "nema dodanih stranica";
        endif;


    }

    function add_content($p) {
        $url = mysql_real_escape_string($p['url']);
        $sitename = mysql_real_escape_string($p['sitename']);


        if(!$url || !$sitename):
        echo 'GREŠKA: nešto fali' ;


        else:

        $sql = "INSERT INTO stranice VALUES (null, '$url', '$sitename')";
        $res = mysql_query($sql) or die(mysql_error('GREŠKA: neće da doda'));
        echo 'dodano';

        endif;

    }

} // završava class
