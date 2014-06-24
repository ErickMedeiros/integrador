<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Fig. 19.15: database.php -->
<!-- Querying a database and displaying the results. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
        <meta charset="UTF-8"></meta>
      <title>Resultado da consulta</title>
   <style type = "text/css">
         body  { font-family: arial, sans-serif;
                 background-color: #F0E68C } 
         table { background-color: #ADD8E6 }
         td    { padding-top: 2px;
                 padding-bottom: 2px;
                 padding-left: 4px;
                 padding-right: 4px;
                 border-width: 1px;
                 border-style: inset }
      </style>
   </head>
   <body>
      <?php
         extract( $_POST );

         // build SELECT query
         $query = "SELECT " . $select . " FROM usuario";

         // Conectando ao MySQL
         if ( !( $database = mysql_connect( "localhost",
            "root", "" ) ) )                      
            die( "Não foi possível conectar ao banco de dados </body></html>" );
   
         // abrindo o banco de dados farmacia
         if ( !mysql_select_db( "farmacia", $database ) )
            die( "Could not open products database </body></html>" );

         // consultando o banco de dados farmacia
         if ( !( $result = mysql_query( $query, $database ) ) ) 
         {
            print( "Não foi possível executar a consulta! <br />" );
            die( mysql_error() . "</body></html>" );
         } // end if

         mysql_close( $database );
      ?><!-- end PHP script -->
      <h3>Resultado da consulta</h3>
      <table>
         <?php
            // fetch each record in result set
            for ( $counter = 0; $row = mysql_fetch_row( $result );
               $counter++ )
            {
               // build table to display results
               print( "<tr>" );

               foreach ( $row as $key => $value ) 
                  print( "<td>$value</td>" );

               print( "</tr>" );
            } // end for
         ?><!-- end PHP script -->
      </table>
      <br />Sua busca resultou em <strong>
      <?php print( "$counter" ) ?> results.<br /><br /></strong>
      <h5>Por favor enviar seus comentários para o email
         <a href = "mailto:ebmedeiros@sescpe.com.br">
            Erick Medeiros.</a>
      </h5>
   </body>
</html>

