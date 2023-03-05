<?php
Class TimeToWordConverter implements TimeToWordConvertingInterface
{
    public function convert($hours, $minutes): string
    {
        $words = [
            'fullHour'=>[
                '1'=>'Один час',
                '2'=>'Два часа',
                '3'=>'Три часа',
                '4'=>'Четыре часа',
                '5'=>'Пять часов',
                '6'=>'Шесть часов',
                '7'=>'Семь часов',
                '8'=>'Восемь часов',
                '9'=>'Девять часов',
                '10'=>'Десять часов',
                '11'=>'Одинадцать часов',
                '12'=>'Двенадцать часов'
            ],
            'afterBeforeHour'=>[
                '1'=>'часа',
                '2'=>'двух',
                '3'=>'трех',
                '4'=>'четырех',
                '5'=>'пяти',
                '6'=>'шести',
                '7'=>'семи',
                '8'=>'восьми',
                '9'=>'девяти',
                '10'=>'десяти',
                '11'=>'одинадцати',
                '12'=>'двенадцати',
                '13'=>'тринадцати'
            ],
            'afterBeforeMinutes'=>[
                '1'=>'Одна минута',
                '2'=>'Две минуты',
                '3'=>'Три минуты',
                '4'=>'Четыре минуты',
                '5'=>'Пять минут',
                '6'=>'Шесть минут',
                '7'=>'Семь минут',
                '8'=>'Восемь минут',
                '9'=>'Девять минут',
                '10'=>'Десять минут',
                '11'=>'Одинадцать минут',
                '12'=>'Двенадцать минут',
                '13'=>'Тринадцать минут',
                '14'=>'Четырнадцать минут',
                '15'=>'Пятнадцать минут',
                '16'=>'Шеснадцать минут',
                '17'=>'Семнадцать минут',
                '18'=>'Восемнадцать минут',
                '19'=>'Девятнадцать минут',
                '20'=>'Двадцать минут',
                '21'=>'Двадцать одна минута',
                '22'=>'Двадцать две минуты',
                '23'=>'Двадцать три минуты',
                '24'=>'Двадцать четыре минуты',
                '25'=>'Двадцать пять минут',
                '26'=>'Двадцать шесть минут',
                '27'=>'Двадцать семь минут',
                '28'=>'Двадцать восемь минут',
                '29'=>'Двадцать девять минут',
            ],
            'halfQuarterHour'=>[
                '1'=>'часа',
                '2'=>'второго',
                '3'=>'третьего',
                '4'=>'четвертого',
                '5'=>'пятого',
                '6'=>'шестого',
                '7'=>'седьмого',
                '8'=>'восьмого',
                '9'=>'девятого',
                '10'=>'десятого',
                '11'=>'одиннадцатого',
                '12'=>'двенадцатого'
            ],
        ];

        if (($minutes > 59 || $minutes < 0) || ($hours < 1 || $hours > 12)) {
            return 'Ошибка веденных данных';
        }
        $result = NULL;
        $minute = $minutes > 30 ? 60 - $minutes : $minutes;
        $hours === 12 ? $checkToTwelve = -11 : $checkToTwelve = 1;
        if($minutes === 0) { $result = $words['fullHour'][$hours];}
        if($minutes === 15) { $result = 'Четверть '.$words['halfQuarterHour'][$hours + $checkToTwelve];}
        if($minutes === 30) { $result = 'Половина '.$words['halfQuarterHour'][$hours + $checkToTwelve];}
        if(($minutes >=1 && $minutes <=14) || ($minutes >=16 && $minutes <=29)) { $result = $words['afterBeforeMinutes'][$minute]." после ".$words['afterBeforeHour'][$hours];}
        if($minutes >=31 && $minutes <=59) { $result = $words['afterBeforeMinutes'][$minute]." до ".$words['afterBeforeHour'][$hours + $checkToTwelve];}
        return $result;
    }
}
interface TimeToWordConvertingInterface{
    public function convert(int $hours, int $minutes): string;
}

$result = new TimeToWordConverter();
$result->convert(2, 21);
