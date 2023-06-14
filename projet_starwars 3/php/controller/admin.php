<?php

$commentaires = Commentaires::getCommentaires();

$template = "vue/adminpages.php";
require "vue/layout.php";