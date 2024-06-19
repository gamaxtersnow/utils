<?php
namespace Utils;


class Snowflake
{
    private int $epoch;
    private string $workerId;
    private string $dataCenterId;
    private string $sequence;
    private int $sequenceMask = 4095;

    public function __construct($epoch = 1420041600000)
    {
        $this->epoch = $epoch;
        $this->setWorkerId();
        $this->setDataCenterId();
        $this->sequence = 0;
    }
    public function getWorkId():int {
        return $this->workerId;
    }
    public function getDataCenterId():int {
        return $this->dataCenterId;
    }
    public function setWorkerId(int $workerId = -1):void
    {
        if($workerId == -1){
            $workerId = env('ZONE.WORK_ID');
        }
        $this->workerId = $workerId;
    }
    public function setDataCenterId(int $dataCenterId = -1):void {
        if($dataCenterId == -1) {
            $dataCenterId = env('ZONE.DATA_CENTER_ID');
        }
        $this->dataCenterId = $dataCenterId;
    }
    public function nextId(): int
    {
        $time = round(microtime(true) * 1000);
        $timestamp = $time - $this->epoch;
        $timestampShift = $timestamp << 22;

        $workerIdShift = $this->workerId << 12;
        $dataCenterIdShift = $this->dataCenterId << 17;

        $sequenceMask = $this->sequenceMask;
        $this->sequence = ($this->sequence + 1) & $sequenceMask;

        if ($this->sequence == 0) {
            $time = round(microtime(true) * 1000);
            while ($time <= $this->epoch) {
                $time = round(microtime(true) * 1000);
            }
        }
        return $timestampShift | $workerIdShift | $dataCenterIdShift | $this->sequence;
    }
}
