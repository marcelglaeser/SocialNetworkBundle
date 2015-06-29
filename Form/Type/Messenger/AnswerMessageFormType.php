<?php
/*
 * This file is part of the SocialNetworkBundle package.
 *
 * (c) Fulgurio <http://fulgurio.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fulgurio\SocialNetworkBundle\Form\Type\Messenger;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AnswerMessageFormType extends AbstractType
{
    /**
     * @see Symfony\Component\Form.AbstractType::buildForm()
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('content', 'text')
        ;
    }

    /**
     * @see Symfony\Component\Form.FormTypeInterface::getName()
     */
    public function getName()
    {
        return 'answer';
    }
}