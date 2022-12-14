<?php
namespace App;

class View {
    public function __construct($template) {
        $this->template = $template;
    }

    public function render(Array $data) {
        //prendo la stringa della pagina dall'outputbuffer
        //extract permette di associare variabili a valori dentro al file
        extract($data);
        ob_start();
        include(__DIR__ . '/Views/' . $this->template);
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}