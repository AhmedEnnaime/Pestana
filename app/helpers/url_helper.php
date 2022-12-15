<?php

// Redirection
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}
