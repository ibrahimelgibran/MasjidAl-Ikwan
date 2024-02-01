<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan
{
    public function convertToWIB($timeJakarta)
    {
        $dateTimeJakarta = new DateTime($timeJakarta, new DateTimeZone('Asia/Jakarta'));
        $dateTimeJakarta->setTimezone(new DateTimeZone('Asia/Jakarta'));
        return $dateTimeJakarta->format('H:i');
    }
    
}

/* End of file Kunjungan.php */
/* Location: ./application/libraries/Kunjungan.php */
