<?php
/*
 * This file is part of the SocialNetworkBundle package.
 *
 * (c) Fulgurio <http://fulgurio.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fulgurio\SocialNetworkBundle\Mailer;

use FOS\UserBundle\Model\UserInterface;

/**
 * Admin mailer
 *
 * @author Vincent Guerard <v.guerard@fulgurio.net>
 */
class ContactMailer extends AbstractMailer
{
    /**
     * Contact email sender
     *
     * @param UserInterface $user
     * @param string $subject
     * @param string $message
     */
    public function sendAdminMessage(UserInterface $user, $subject, $message)
    {
        $data = array(
            'user' => $user,
            'subject' => $subject,
            'content' => $message
        );
        $bodyText = $this->templating->render(
                $this->parameters['admin.template.text'], $data
        );
        $bodyHTML = $this->templating->render(
                $this->parameters['admin.template.html'], $data
        );
        $bodyMsn = $this->templating->render(
                $this->parameters['admin.template.msn'], $data
        );
        $this->sendEmailMessage(
                $this->parameters['admin.from'],
                $user->getEmail(),
                $subject,
                $bodyHTML,
                $bodyText,
                $this->parameters['admin.from_name']
        );
        $this->messenger->sendMessage($user, $subject, $bodyMsn, TRUE, 'admin-contact');
    }
}