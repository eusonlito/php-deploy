<?php
use Eusonlito\LaravelMeta\Meta;
use Eusonlito\LaravelPacker\Packer;
use WebDeploy\Config\Config;
use WebDeploy\Input\Input;
use WebDeploy\Log\Dump;
use WebDeploy\Router\Route;
use WebDeploy\Template\Html;
use WebDeploy\Template\Template;

function d($title, $message = null, $trace = null)
{
    Dump::debug($title, $message, $trace);
}

function dd($title, $message = null, $trace = null)
{
    die(d($title, $message, $trace));
}

function camelCase($string)
{
    return preg_replace_callback('/\-(.)/', function ($matches) {
        return strtoupper($matches[1]);
    }, strtolower($string));
}

function template()
{
    return Template::getInstance();
}

function asset($file)
{
    return Route::getPublicUrl('/assets'.$file);
}

function route($path)
{
    return Route::getPublicUrl($path);
}

function input($name = null, $value = null)
{
    return (func_num_args() === 2) ? Input::set($name, $value) : Input::get($name);
}

function shellResponse($response)
{
    return Html::shellResponse($response);
}

function meta()
{
    return Meta::getInstance();
}

function packer()
{
    return Packer::getInstance(config('packer'));
}

function config($name = null, $value = null)
{
    return (func_num_args() === 2) ? Config::set($name, $value) : Config::get($name);
}

function redirect($url)
{
    die(header('Location: '.$url));
}