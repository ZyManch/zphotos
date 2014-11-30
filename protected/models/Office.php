<?php
class Office extends COffice {

    protected $_days = array('Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье');

    public function getWorkDays() {
        $result = array();
        foreach ($this->_days as $day => $title) {
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

    /**
     * @return string[]
     */
    public function getShortWorkDays() {
        $result = array(
            $this->_days[$this->work_day_start].'-'.$this->_days[$this->work_day_end],
            'С '.$this->getWorkTimeStart().' до '.$this->getWorkTimeEnd(),
            'Обед в '.$this->lunch
        );
        return $result;
    }

    public function getWorkTimeStart() {
        return substr($this->work_time_start,0,5);
    }

    public function getWorkTimeEnd() {
        return substr($this->work_time_end,0,5);
    }
}