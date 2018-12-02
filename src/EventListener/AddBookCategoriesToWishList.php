<?php

namespace App\EventListener;


use App\Entity\WishList\WishList;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AddBookCategoriesToWishList implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmitData',

        ];
    }

    /**
     * @param FormEvent $event
     */
    public function onPostSubmitData(FormEvent $event)
    {
        $em =
        $form = $event->getForm();
        $category = $form->get('categories')->getData();
        $wishList = new WishList();
//        $contest = $event->getData();
//        dump($category);die;
//        $category->setData($contest->setWishLists());
//
       $wishList->setCategory($category[0]);
       $em->persist($wishList);
       $em->flush;
//        dump($contest);die;
//        $wishList = new WishList();
//         $wishList->setCategory($category);
//        $book = $form->get('id');
//        $contest = $event->getData();

//        $contest->setDividePoints(
//            in_array(
//                $type->getData(),
//                [
//
//                ]
//            )
//        );
    }
}