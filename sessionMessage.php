<?php
session_start();

function setErrorMessage(string $message): void
{
    $_SESSION['error'] = $message;
}

function getErrorMessage(): ?string
{
    if (isset($_SESSION['error'])) 
        return $_SESSION['error'];
    return null;      
}

function setSuccessMessage(string $message):void{
    $_SESSION['success'] - $message;
}
function getSuccessMessage(): ?string
{
    if (isset($_SESSION['success'])) 
        return $_SESSION['success'];
    return null;
}
function deleteErrorMessage():void{
    if (isset($_SESSION['error']))
        unset($_SESSION['error']);
}
function deleteSuccessMessage():void{
    if (isset($_SESSION['success']))
        unset($_SESSION['success']);
}
?>