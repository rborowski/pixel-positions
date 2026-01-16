@php
    $title = ($code ?? 'Error') . ' - Error';
    $heading = 'Something went wrong';
    $description = 'An error occurred while processing your request.';
    $color = 'text-blue-600';
@endphp

@extends('errors.error')
