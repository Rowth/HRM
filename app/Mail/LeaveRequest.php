<?php

namespace App\Mail;

use App\Traits\Settings;

class LeaveRequest extends BaseMail
{
    use Settings;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // parent::__construct();
        $this->data = $data;
        // $this->setMailConfigs();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->replyTo($this->data['replyTo'])
        //     ->subject(__('email.leaveRequest', ['company' => $this->data['active_company']->company_name]))
        //     ->view('emails.front.leave_request')
        //     ->with($this->data);

        // pass name to view
        return $this->view('emails.front.leave_request')
            ->subject(__('email.leaveRequest', ['company' => $this->data['active_company']->company_name]))
            ->with($this->data);
    }
}
