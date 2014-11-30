<?php
class City extends CCity {

    /**
     * @return Delivery[]
     */
    public function getDeliveries() {
        $result = array();
        foreach ($this->offices as $office) {
            foreach ($office->officeDeliveries as $link) {
                $result[$link->delivery_id] = $link->delivery;
            }
        }
        return $result;
    }

    /**
     * @return Payment[]
     */
    public function getPayments() {
        $result = array();
        foreach ($this->offices as $office) {
            foreach ($office->officePayments as $link) {
                $result[$link->payment_id] = $link->payment;
            }
        }
        return $result;
    }
}