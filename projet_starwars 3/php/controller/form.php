<?php
    require_once "functions.php";

    if (isset($_POST['send'])) {
        $page = new Page();
        $page->setUrl(sanitizeText("url"));
        $page->setTitre(sanitizeText("titre"));
        $page->setContenu(sanitizeText("contenu"));
        $page->saveNew();
    }

    $template = "vue/form_page.html";
    require "vue/layout.php";
?>