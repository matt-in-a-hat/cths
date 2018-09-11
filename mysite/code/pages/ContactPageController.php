<?php

// use \DrewM\MailChimp\MailChimp;
use SilverStripe\Core\Environment;
use SilverStripe\Forms;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\Director;

class ContactPageController extends PageController
{
    private static $allowed_actions = [
        'contact',
        'Form',
    ];

    public function Form() {
        $fields = Forms\FieldList::create([
            Forms\LiteralField::create('Title', '<h2 class="mb-4">Contact us</h2>'),
            Forms\TextField::create('Name', 'Your name')->addExtraClass('main-field'),
            Forms\EmailField::create('Email', 'Your email address')->addExtraClass('main-field'),
            Forms\TextareaField::create('Message', 'Message')->addExtraClass('main-field'),
        ]);
        $actions = Forms\FieldList::create([
            Forms\FormAction::create('contact', 'Send')->addExtraClass('cths-button'),
        ]);
        $required = new Forms\RequiredFields(['Email', 'Message']);
        $form = Forms\Form::create($this, 'contact', $fields, $actions);
        $form->addExtraClass('cths-highlight-row p-5 my-5');
        return $form;
    }

    public function contact($req) {
        // Example of adding to mailchimp mailing list
        // Note you'll need to composer require drewm/mailchimp-api
        // $MailChimp = new MailChimp(Environment::getEnv('MAILCHIMP_API_KEY'));
        // $list_id = Environment::getEnv('MAILCHIMP_MAIN_LIST_ID');

        // $result = $MailChimp->post("lists/$list_id/members", [
        //     'email_address' => $req->postVar('Email'),
        //     'status' => 'subscribed',
        //     'merge_fields' => [
        //         'FNAME' => $req->postVar('FirstName') ?: '',
        //         'LNAME' => $req->postVar('LastName') ?: '',
        //     ],
        // ]);

        $contact = new ContactEvent();
        $contact->Name = $req->postVar('Name');
        $contact->Email = $req->postVar('Email');
        $contact->Message = $req->postVar('Message');
        $contact->write();

        $contactEmail = SiteConfig::current_site_config()->SendContactEmailsTo;
        if ($contactEmail && $req->postVar('Email') && $req->postVar('Message')) {
            $email = new Email();

            $email->setTo($contactEmail);
            $email->setFrom($req->postVar('Email'));
            $name = $req->postVar('Name') ?: '(not set)';
            $email->setSubject("Contact Message from {$name}");

            $message = $req->postVar('Message') ?: '(no message?)';
            $currentLink = $_SERVER['REQUEST_URI'];
            $link = Director::baseURL() . "admin/messages/ContactEvent/EditForm/field/ContactEvent/item/$contact->ID/edit";
            $messageBody = "
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Message:</strong> {$message}</p>
                <p><a href=\"{$link}\">View in CMS</a></p>
                <p>Sent from cths.nz ({$currentLink})</p>
            ";
            $email->setBody($messageBody);
            $email->send();
        }

        return [
            'Content' => '<h2>Thanks!</h2><p>We will aim to follow up on your message soon.</p><p>Meanwhile, <a href="https://www.facebook.com/groups/christchurchtinyhousecommunity">check out some of the latest communication on the Facebook group.</a></p>',
            'Form' => '',
        ];
    }
}
