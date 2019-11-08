<?php
namespace TaskMgr;


class Utils
{
    public static function GenPassHash($password): string{
        return password_hash($password, PASSWORD_DEFAULT, ['salt' => md5($password)]);
    }

    public static function GenAuthCookie($user_id): string{
        return md5($user_id . time());
    }
}