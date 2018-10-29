<?php

// use \DrewM\MailChimp\MailChimp;
use SilverStripe\Core\Environment;
use SilverStripe\Forms;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\Director;
use SilverStripe\ORM\FieldType\DBHTMLText;

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
            Forms\LiteralField::create('GRecaptcha', '<div class="g-recaptcha" data-sitekey="6LdUXHcUAAAAADkMWQpc_IV8PiPSB1B2pUkazyAs"></div>'),
        ]);
        $actions = Forms\FieldList::create([
            Forms\FormAction::create('contact', 'Send')->addExtraClass('cths-button'),
        ]);
        $required = new Forms\RequiredFields(['Email', 'Message']);
        $form = Forms\Form::create($this, 'contact', $fields, $actions);
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
        $recaptcha = new \ReCaptcha\ReCaptcha(Environment::getEnv('GOOGLE_RECAPTCHA_SECRET'));
        $resp = $recaptcha->setExpectedHostname(Environment::getEnv('CURRENT_DOMAIN'))
                          ->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if (!$resp->isSuccess()) {
            // $errors = $resp->getErrorCodes();
            $content = new DBHTMLText('Content');
            $content->setValue('<h2>Sorry!</h2><p>Something went wrong with your request, please refresh and try again. If all else fails, try get in touch via the <a href="https://www.facebook.com/groups/christchurchtinyhousecommunity">Facebook group</a>.</p>');
            return [
                'Content' => $content,
                'Form' => '',
            ];
        }

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

        $content = new DBHTMLText('Content');
        $content->setValue('<h2>Thanks!</h2><p>We will aim to follow up on your message soon.</p><p>Meanwhile, <a href="https://www.facebook.com/groups/christchurchtinyhousecommunity">check out some of the latest communication on the Facebook group.</a></p>');
        return [
            'Content' => $content,
            'Form' => '',
        ];
    }
}
