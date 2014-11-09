<?php
class Office extends COffice {

    public function getWorkDays() {
        $days = array('Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье');
        $result = array();
        foreach ($days as $day => $title) {
            if ($day >=$this->work_day_start && $day <=$this->work_day_end ) {
                $result[$title] = array(
                    $this->work_time_start,
                    $this->work_time_end
                );
            } else {
                $result[$title] = false;
            }
        }
        return $result;
    }
}