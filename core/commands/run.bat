@echo off
@REM %1 %2 %3 arguments

if %1  == make:controller (
    if not exist App\Http\Controllers\%2.php type nul > App\Http\Controllers\%2.php
)
if %1  == make:resource (
    if not exist App\Http\Resources\%2.php type nul > App\Http\Resources\%2.php
)
if %1  == make:request (
    if not exist App\Http\Requests\%2.php type nul > App\Http\Requests\%2.php
)

if %1  == make:view (
    if not exist views\%2.php type nul > views\%2.php 
) 
if %1  == serve php -S 127.0.0.1:8000 
