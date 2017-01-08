<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EmployeeAssignedRank
{
    use InteractsWithSockets, SerializesModels;
    
    public $employeeRankInfo;
    public $employee;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($employeeRankInfo, $employeeId)
    {
        $this->employeeRankInfo = $employeeRankInfo;
        $this->employee = $employeeId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
