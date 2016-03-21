@echo off

rem -------------------------------------------------------------
rem  system library management command line bootstrap script for Windows.
rem
rem  @author majeed mohammadian <majeedmohammadian@gmail.com>
rem  @link http://www.systemli.ir/
rem -------------------------------------------------------------

@setlocal

set SYSTEM_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%SYSTEM_PATH%system" %*

@endlocal
