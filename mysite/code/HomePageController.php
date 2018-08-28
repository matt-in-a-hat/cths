<?php

use \DrewM\MailChimp\MailChimp;
use SilverStripe\Core\Environment;
use SilverStripe\Forms;

class HomePageController extends PageController
{
    private static $allowed_actions = [
        'index',
        'subscribe',
    ];

    protected function init()
    {
        parent::init();
    }

    public function SubscribeForm() {
        $fields = Forms\FieldList::create([
            Forms\EmailField::create('Email', 'Email'),
            Forms\CheckboxField::create('Agrees', 'I agree to the T\'s&C\'s'),
        ]);
        $actions = Forms\FieldList::create([
            Forms\FormAction::create('subscribe', 'Subscribe'),
        ]);
        $required = new Forms\RequiredFields(['Agrees']);
        $form = Forms\Form::create($this, 'subscribe', $fields, $actions, $required);
        $form->setAttribute('autocomplete', 'off');
        return $form;
    }

    public function subscribe($req) {
        echo '<pre>'; var_dump($req->postVar('Email'), $req->postVar('Agrees')); exit();
        // TODO
        // $MailChimp = new MailChimp(Environment::getEnv('MAILCHIMP_API_KEY'));
        // $list_id = Environment::getEnv('MAILCHIMP_MAIN_LIST_ID');

        // $result = $MailChimp->post("lists/$list_id/members", [
        //     'email_address' => $email,
        //     'status' => 'subscribed',
        // ]);
    }
}
