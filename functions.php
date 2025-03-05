<?php 

function urlIs($valse) {
    return $_SERVER['REQUEST_URI'] === $valse;
}