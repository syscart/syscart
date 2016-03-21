<?php
/**
 * @package    system cart
 *             webservice/function.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

function outputJson($data = [])
{
    $header = new platformHeader();
    $header->set('X-Autor', 'majeed mohammadian');
    $header->set('X-Autor-Email', 'majeedmohammadian@gmail.com');
    $header->set('Content-Type', 'application/json');
    $header->output();

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

function outputError($errorCode)
{
    $data['success'] = false;
    $data['code'] = $errorCode;
    $data['text'] = getError($errorCode);

    outputJson($data);
    exit;
}

function getError($errorCode)
{
    switch($errorCode)
    {
        case '0': return 'آدرس مورد نظر ناقص وارد شده است';
        case '1': return 'آدرس مورد نظر وجود ندارد';
        case '2': return 'پارامتر کلید وبسرویس وجود ندارد';
        case '3': return 'کلید وبسرویس باید دو بخشی باشد';
        case '4': return 'کلید وبسرویس اشتباه است';
        case '5': return 'ابتدا باید به حساب کاربری خود وارد شوید';
        case '6': return 'شما قبلا به حساب کاربری خود وارد شده اید';
        case '7': return 'درخواست شما باید بصورت POST ارسال شود';
        case '8': return 'درخواست شما باید بصورت GET ارسال شود';
        case '9': return 'درخواست شما باید بصورت PUT ارسال شود';
        case '10': return 'درخواست شما باید بصورت DELETE ارسال شود';
        case '11': return '';
        case '12': return '';
        case '13': return '';
    }
}