<?php

/**
 * php/ACMS/User/Corrector.php
 * majosystems
 */
class ACMS_User_Corrector
{
    /**
     * age_sns
     * SNSの投稿時間風のage表示
     * 引数ひとつ目で秒表示するかどうか（'true'で秒表示）
     */
    public static function age_sns($txt, $args = array())
    {
        $secmode = isset($args[0]) ? $args[0] == 'true' : FALSE;
        $dt  = false !== ($dt = strtotime($txt)) ? $dt : $txt;
        $time_span = time() - $dt;

        $mm = floor($time_span / 60);
        $hh = floor($time_span / (60 * 60));
        $dd = floor($time_span / (60 * 60 * 24));

        if($time_span < 60)
            return $secmode ? "約".$time_span."秒前" : "たった今";
        if($mm < 60)
            return "約".$mm."分前";
        if($hh < 24)
            return "約".$hh."時間前";
        if($dd > 10)
            return date("Y/m/d h:i:s",$dt);
        if($dd > 0)
            return $day."日前";
        return $txt; // いずれの処理も通らない場合そのまま
    }
}

