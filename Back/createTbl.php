<?php

function createHtmlTblByPdoResult( $result ) 
{
    //$result = $dbconn->query('SELECT * from accounts');
    $colcount = $result->columnCount();

    // Get coluumn headers
    echo ('<table><tr>');
    for ($i = 0; $i < $colcount; $i++){
        $meta = $result->getColumnMeta($i)["name"];
        echo('<th>' . $meta . '</th>');
    }
    echo('</tr>');

    // Get row data
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo('<tr>');
        for ($i = 0; $i < $colcount; $i++){
            $meta = $result->getColumnMeta($i)["name"];
            echo('<td>' . $row[$meta] . '</td>');
        }
        echo('</tr>');
    }

    echo ('</table>');
}
