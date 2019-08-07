<?php

namespace App\Mail;

use function array_merge;
use function config;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GenericMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $view, $to, $from, $subject;

    /**
     * Create a new message instance. Generic use.
     *
     * @param      $config
     * @param null $data
     */
    public function __construct($config, $data = null)
    {
        $config = array_merge([
            'to' => config('mail.from.address'),
            'from' => config('mail.from.address'),
            'subject' => 'Mensaje desde ' . config('app.name'),
            'view' => '',  // Vista que procesará el email
        ], $config);

        if (isset($data['attached'])) {
            $this->attach($data['attached']);
        }
        
        $this->data = $config['data'];
        $this->subject = $config['subject'];
        $this->view = $config['view'];
        $this->to = $config['to'];
        $this->from = $config['from'];
    }

    /**
     * Email Genérico para complementar o uso rápido/general al enviar email.
     *
     * @return \App\Mail\GenericMail
     */
    public function build()
    {
        return $this->view($this->view, $this->data)
            ->to($this->to, $this->from)
            ->subject($this->subject)
            ->from(config('mail.from.address'), config('mail.from.name'));
    }
}
