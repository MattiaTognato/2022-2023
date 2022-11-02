<?php
    const CONSONANTI = ['B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'Y', 'Z'];
    const MESI = ['A', 'B', 'C', 'D', 'E', 'H', 'L', 'M', 'P', 'R', 'S', 'T'];
    const ALFANUMERICIPARI = ["0" => 1,"1" => 0,"2" => 5,"3" => 7,"4" => 9,"5" => 13,"6" => 15,"7" => 17,"8" => 19,"9" => 21,"A" => 1,"B" => 0,"C" => 5,"D" => 7,"E" => 9,"F" => 13,"G" => 15,"H" => 17,"I" => 19,"J" => 21,"K" => 2,"L" => 4,"M" => 18,"N" => 20,"O" => 11,"P" => 3,"Q" => 6,"R" => 8,"S" => 12,"T" => 14,"U" => 16,"V" => 10,"W" => 22,"X" => 25,"Y" => 24,"Z" => 23];
    const ALFANUMERICIDISPARI = ["0" => 0,"1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5,"6" => 6,"7" => 7,"8" => 8,"9" => 9,"A" => 0,"B" => 1,"C" => 2,"D" => 3,"E" => 4,"F" => 5,"G" => 6,"H" => 7,"I" => 8,"J" => 9,"K" => 10,"L" => 11,"M" => 12,"N" => 13,"O" => 14,"P" => 15,"Q" => 16,"R" => 17,"S" => 18,"T" => 19,"U" => 20,"V" => 21,"W" => 22,"X" => 23,"Y" => 24,"Z" => 25];
    
    function get3Consonants($s){
        $s = strtoupper($s);
        $consonants = "";
        for($i = 0; $i < strlen($s); $i++){
            // controllo per ogni carattere se e' una consonante
            if(in_array($s[$i], CONSONANTI)){
                //consonante
                $consonants .= $s[$i];
            }
            // se raggiungo le 3 break
            if(strlen($consonants) > 2) return $consonants;
        }
        for($i = 0 ; $i < strlen($s); $i++){
            // controllo per ogni carattere se e' una vocale
            if(!in_array($s[$i], CONSONANTI)){
                //vocale
                $consonants .= $s[$i];
            }
            // se raggiungo le 3 break
            if(strlen($consonants) > 2) return $consonants;
        }
        //se non ho raggiungo le 3 aggiungi x
        while(strlen($consonants) < 3){
            $consonants .= 'X';
        }

        return $consonants;
    }
    function getMese($mese){        
        return MESI[$mese-1];
    }
    function getAnno($anno){
        $anno = trim($anno);
        //ultime due cifre dell'anno
        return substr($anno, -2);
    }
    function getGiorno($giorno, $sesso){
        return $giorno + (40*$sesso);
    }
    function getChecksum($codice){
        $somma = 0;

        for($i = 0; $i < strlen($codice); $i++){
            if ($i%2 == 0){
                //indici pari dell'array
                $somma += ALFANUMERICIPARI[$codice[$i]];
            }
            else if ($i%2 == 1){
                //indici dispari dell'array
                $somma += ALFANUMERICIDISPARI[$codice[$i]];
            }
        }
        $resto = range('A', 'Z');
        return $resto[$somma%26];
    }

    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $mese = $_POST["mese"];
    $anno = $_POST["anno"];
    $giorno = $_POST["giorno"];
    $sesso = $_POST["sesso"];
    $comune = $_POST["comune"];

    $codiceFiscale = "";

    $codiceFiscale .= get3Consonants($cognome);
    $codiceFiscale .= get3Consonants($nome);
    $codiceFiscale .= getAnno($anno);
    $codiceFiscale .= getMese($mese);
    $codiceFiscale .= getgiorno($giorno, $sesso);
    $codiceFiscale .= $comune;
    $codiceFiscale .= getChecksum($codiceFiscale);

    echo $codiceFiscale;
?>