<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendPayslipsByMails
{
    use InteractsWithSockets, SerializesModels;
    
    public $payroll_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($payroll_id)
    {
        $this->payroll_id = $payroll_id;
        
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
